<?php

namespace App\Livewire;

use Stripe\Stripe;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Stripe\Checkout\Session as StripeSession;

class Profile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone_number;
    public $address;
    public $profile_image;
    public $new_profile_image;

    public $isEditing = false;
    public $showTopUpModal = false;
    public $top_up_amount;
    public $stripeUrl = null;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone_number = $user->phone_number;
        $this->address = $user->address;
        $this->profile_image = $user->profile_image;

        // Handle Stripe top-up success callback
        if (request()->get('topup') === 'success') {
            $amount = request()->get('amount');
            if (is_numeric($amount)) {
                $user->balance += $amount;
                $user->save();
                session()->flash('success', 'Top up berhasil sebesar Rp' . number_format($amount, 0, ',', '.'));
            }
        }
    }

    public function toggleEdit()
    {
        $this->isEditing = !$this->isEditing;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'new_profile_image' => 'nullable|image|max:2048',
        ]);

        $user = Auth::user();

        if ($this->new_profile_image) {
            // Delete old image
            if ($user->profile_image && Storage::disk('public')->exists($user->profile_image)) {
                Storage::disk('public')->delete($user->profile_image);
            }

            // Store new image
            $path = $this->new_profile_image->store('profile_images', 'public');
            $user->profile_image = $path;
        }

        $user->name = $this->name;
        $user->phone_number = $this->phone_number;
        $user->address = $this->address;
        $user->save();

        $this->profile_image = $user->profile_image;
        $this->isEditing = false;

        session()->flash('success', 'Profile updated successfully!');
    }

    public function startTopup()
    {
        $this->validate([
            'top_up_amount' => 'required|numeric|min:1000',
        ]);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'idr',
                    'unit_amount' => $this->topup_amount * 100,
                    'product_data' => [
                        'name' => 'Top Up Saldo Tuker.in',
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'customer_email' => Auth::user()->email,
            'success_url' => url('/profile?topup=success&amount=' . $this->topup_amount),
            'cancel_url' => url('/profile?topup=cancel'),
        ]);

        return redirect()->away($session->url);
    }

    public function redirectToStripe()
    {
        $this->validate([
            'top_up_amount' => 'required|numeric|min:1000',
        ]);

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'idr',
                    'unit_amount' => $this->top_up_amount * 100,
                    'product_data' => [
                        'name' => 'Top Up Saldo Tuker.in',
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'customer_email' => Auth::user()->email,
            'success_url' => route('profile', ['topup' => 'success', 'amount' => $this->top_up_amount]),
            'cancel_url' => route('profile', ['topup' => 'cancel']),
        ]);

        // Kirim ke browser via event JS
        $this->dispatch('redirect-to-stripe', url: $session->url);
    }

    public function render()
    {
        return view('livewire.profile');
    }
}