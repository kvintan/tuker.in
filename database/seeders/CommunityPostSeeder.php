<?php

namespace Database\Seeders;

use App\Models\CommunityPost;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CommunityPostSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $user = User::first(); // ambil user pertama

        CommunityPost::create([
            'user_id' => $user->id,
            'image' => 'posts/post.jpg',
            'caption' => $faker->sentence(),
            'likes' => 12,
        ]);

        CommunityPost::create([
            'user_id' => $user->id,
            'image' => 'posts/post.jpg',
            'likes' => 5,
        ]);
    }
}
