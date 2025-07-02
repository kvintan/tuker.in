<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email, $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('success', 'Login successful!');
            return redirect()->to('/');
        } else {
            $this->addError('auth', 'Invalid credentials. Please check your email and password.');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
