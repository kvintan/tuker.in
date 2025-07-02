<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
        [
            'name' => 'Liquid Soap Dispenser',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => 15000,
            'image_path' => 'images/product1.png',
        ],
        [
            'name' => 'Coaster',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => 25000,
            'image_path' => 'images/coaster.png',
        ],
        [
            'name' => 'Tumbler',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => 23000,
            'image_path' => 'images/tumblr.png',
        ],
        [
            'name' => 'Plantpot',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => 35000,
            'image_path' => 'images/plankpot.png',
        ],
        [
            'name' => 'Laptop Stand',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => 55000,
            'image_path' => 'images/laptopStand.png',
        ],
        [
            'name' => 'Table Lamp',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => 15000,
            'image_path' => 'images/lamp.png',
        ],
    ];

    foreach ($products as $product) {
        Product::create([
            ...$product,
            'is_auction' => true,
            'starting_bid' => 1000,
            'auction_end_time' => Carbon::now()->addHours(24), // ✅ 24 jam dari sekarang
            'slug' => Str::slug($product['name']),
            'in_stock' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
}
