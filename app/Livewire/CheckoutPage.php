<?php

namespace App\Livewire;

use Stripe\Stripe;
use App\Models\Order;
use Livewire\Component;
use App\Mail\OrderPlaced;
use Stripe\Checkout\Session;
use App\Helpers\CartManagement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutPage extends Component
{
    public $payment_method;

    public function mount() {
        $cart_items = CartManagement::getCartItemsFromCookie();
        if(count($cart_items) == 0) {
            return redirect('/menu');
        }
    }
    
    public function placeOrder() { 
        $this->validate([
            'payment_method' => 'required',
        ]);

        $cart_items = CartManagement::getCartItemsFromCookie();

        $line_items = [];

        foreach($cart_items as $item) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'idr',
                    'unit_amount' => $item['unit_amount'] * 100,
                    'product_data' => [
                        'name' => $item['name'],
                    ]
                    ],
                    'quantity' => $item['quantity'],
                ];
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->grand_total = CartManagement::calculateGrandTotal($cart_items);
        $order->payment_method = $this->payment_method;
        $order->currency = 'idr';
        $order->notes = 'Order placed by ' . Auth::user()->name;

        $redirect_url = '';
        
        if($this->payment_method == 'BCA Debit/Credit Card' || $this->payment_method == 'BRI Debit/Credit Card' || $this->payment_method == 'BNI Debit/Credit Card' || $this->payment_method == 'Mandiri Debit/Credit Card') {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $sessionCheckout = Session::create([
                'payment_method_types' => ['card'],
                'customer_email' => Auth::user()->email,
                'line_items' => $line_items,
                'mode' => 'payment',
                'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
            ]);

            $redirect_url = $sessionCheckout->url;
        } else {
        $redirect_url = route('success');
        }

        $order->save();
        $order->items()->createMany($cart_items);
        Mail::to(request()->user())->send(new OrderPlaced($order));
        CartManagement::clearCartItems();
        return redirect($redirect_url);
    }
    
    public function render()
    {
        $cart_items = CartManagement::getCartItemsFromCookie();
        $grand_total = CartManagement::calculateGrandTotal($cart_items);
        return view('livewire.checkout-page', [
            'cart_items' => $cart_items,
            'grand_total' => $grand_total,
        ]);
    }
}