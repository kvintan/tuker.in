<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\CommunityPost;
use Livewire\Attributes\Title;

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

    public function render()
    {
        $posts = CommunityPost::with('user')->latest()->get();

        return view('livewire.community', compact('posts'));
    }
}
