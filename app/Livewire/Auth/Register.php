<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{

    public $name, $phoneNumber, $email, $address, $password;

    protected $rules = [
        'name' => 'required|string|max:255',
        'phoneNumber' => 'required|min:10',
        'email' => 'required|email|unique:users,email',
        'address' => 'required|string',
        'password' => 'required|min:8',
    ];

    public function register()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'phone_number' => $this->phoneNumber,
            'email' => $this->email,
            'address' => $this->address,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'Registration successful. You can now log in.');
        
        // Optionally clear the form
        $this->reset(['name', 'phoneNumber', 'email', 'address', 'password']);

        return redirect()->to('/login');
    }
    
    public function render()
    {
        return view('livewire.auth.register');
    }
}
