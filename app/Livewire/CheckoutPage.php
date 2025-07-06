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
    
    public function placeOrder()
    {
        $this->validate([
            'payment_method' => 'required',
        ]);

        $cart_items = CartManagement::getCartItemsFromCookie();
        $user = Auth::user();
        $grand_total = CartManagement::calculateGrandTotal($cart_items);

        if (count($cart_items) === 0) {
            return redirect('/menu');
        }

        // Cek jika menggunakan Tuker.in Balance
        if ($this->payment_method === 'Tuker.in Balance') {
            if ($user->balance < $grand_total) {
                session()->flash('error', 'Saldo Anda tidak mencukupi untuk melakukan pembayaran.');
                return;
            }

            // Kurangi saldo user
            $user->balance -= $grand_total;
            $user->save();

            $redirect_url = route('success');
        } else {
            // Pembayaran via kartu -> proses Stripe
            $line_items = [];
            foreach ($cart_items as $item) {
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

            Stripe::setApiKey(env('STRIPE_SECRET'));
            $sessionCheckout = Session::create([
                'payment_method_types' => ['card'],
                'customer_email' => $user->email,
                'line_items' => $line_items,
                'mode' => 'payment',
                'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
            ]);

            $redirect_url = $sessionCheckout->url;
        }

    // Buat dan simpan order
    $order = new Order();
    $order->user_id = $user->id;
    $order->grand_total = $grand_total;
    $order->payment_method = $this->payment_method;
    $order->currency = 'idr';
    $order->notes = 'Order placed by ' . $user->name;
    $order->save();

    // Simpan item ke relasi order_items (pastikan relasi exists)
    $order->items()->createMany($cart_items);

    // Kirim notifikasi email
    Mail::to($user)->send(new OrderPlaced($order));

    // Kosongkan keranjang
    CartManagement::clearCartItems();

    return redirect($redirect_url);
}

    
    public function render()
    {
        $cart_items = CartManagement::getCartItemsFromCookie();
        $grand_total = CartManagement::calculateGrandTotal($cart_items);
        $user_balance = Auth::user()->balance ?? 0;
        return view('livewire.checkout-page', [
            'cart_items' => $cart_items,
            'grand_total' => $grand_total,
            'user_balance' => $user_balance,
        ]);
    }
}