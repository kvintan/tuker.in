<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CommunityPost;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Storage;


#[Title('Community - Tuker.in')]
class Community extends Component
{
    public $likedPosts = [];

    public function toggleLike($postId)
    {
        $post = CommunityPost::findOrFail($postId);

        if (in_array($postId, $this->likedPosts)) {
            // Unlike
            unset($this->likedPosts[array_search($postId, $this->likedPosts)]);
            $post->decrement('likes');
        } else {
            // Like
            $this->likedPosts[] = $postId;
            $post->increment('likes');
        }
    }

    public function deletePost($postId)
    {
        $post = CommunityPost::findOrFail($postId);

        if ($post->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        session()->flash('success', 'Post berhasil dihapus.');
    }

    public function render()
    {
        $posts = CommunityPost::with('user')->latest()->get();

        return view('livewire.community', compact('posts'));
    }
}
