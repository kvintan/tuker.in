<?php

namespace Database\Seeders;

use App\Models\CommunityPost;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommunityPostSeeder extends Seeder
{
    public function run()
    {
        $user = User::first(); // ambil user pertama

        CommunityPost::create([
            'user_id' => $user->id,
            'image' => '/images/post.jpg',
            'likes' => 12,
        ]);

        CommunityPost::create([
            'user_id' => $user->id,
            'image' => '/images/post.jpg',
            'likes' => 5,
        ]);
    }
}
