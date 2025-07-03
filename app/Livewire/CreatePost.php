<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CommunityPost;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class CreatePost extends Component
{
    use WithFileUploads;

    public $caption;
    public $image;

    public function submit()
{
    $this->validate([
        'caption' => 'nullable|string|max:1000',
        'image' => 'nullable|image|max:2048',
    ]);

    if (!$this->image) {
        dd('Image is null');
    }

    $imagePath = $this->image->store('posts', 'public');

    CommunityPost::create([
        'user_id' => Auth::id(),
        'caption' => $this->caption,
        'image' => $imagePath,
        'likes' => 0,
    ]);

    session()->flash('success', 'Post created successfully!');
    return redirect()->route('community');
}


    public function render()
    {
        return view('livewire.create-post');
    }
}
