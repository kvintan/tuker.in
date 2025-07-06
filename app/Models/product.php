<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'is_auction',
        'starting_bid',
        'auction_end_time',
        'image_path',
        'slug',
        'in_stock'
    ];

    protected $casts = [
    'image_path' => 'array',
    ];


    protected static function booted()
    {
        static::created(function ($product) {
            $slug = Str::slug($product->name) . '-' . $product->id;
            $product->slug = $slug;
            $product->saveQuietly();
        });

        // Set nilai default sebelum create
        static::creating(function ($product) {
            if (is_null($product->starting_bid)) {
                $product->starting_bid = 1000;
            }

            if (is_null($product->auction_end_time)) {
                $product->auction_end_time = Carbon::now()->addMinutes(5);
            }
        });
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }

    public function bids() {
        return $this->hasMany(Bids::class);
    }

    public function highestBid() {
        return $this->hasOne(Bids::class)->latestOfMany();
    }
}
