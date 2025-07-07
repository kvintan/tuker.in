<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone_number = $user->phone_number;
        $this->address = $user->address;
        $this->profile_image = $user->profile_image;
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
            'new_profile_image' => 'nullable|image|max:2048', // 2MB
        ]);

        $user = Auth::user();

        if ($this->new_profile_image) {
            // Hapus gambar lama jika ada
            if ($user->profile_image && Storage::disk('public')->exists($user->profile_image)) {
                Storage::disk('public')->delete($user->profile_image);
            }

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

    public function render()
    {
        return view('livewire.profile');
    }
}
