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
            'is_auction' => false,
            'starting_bid' => null,
            'auction_end_time' => null,
            'image_path' => 'images/product1.png',
        ],
        [
            'name' => 'Coaster',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'price' => 25000,
            'is_auction' => false,
            'starting_bid' => null,
            'auction_end_time' => null,
            'image_path' => 'images/coaster.png',
        ],
        [
                'name' => 'Tumbler',
                'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'price' => 23000,
                'is_auction' => false,
                'starting_bid' => null,
                'auction_end_time' => null,
                'image_path' => 'images/tumblr.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Plantpot',
                'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'price' => 35000,
                'is_auction' => false,
                'starting_bid' => null,
                'auction_end_time' => null,
                'image_path' => 'images/plankpot.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laptop Stand',
                'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'price' => 55000,
                'is_auction' => false,
                'starting_bid' => null,
                'auction_end_time' => null,
                'image_path' => 'images/laptopStand.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Table Lamp',
                'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'price' => 15000,
                'is_auction' => false,
                'starting_bid' => null,
                'auction_end_time' => null,
                'image_path' => 'images/lamp.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
    ];

    foreach ($products as $product) {
        Product::create($product);
    }
}
}
