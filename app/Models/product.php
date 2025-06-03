<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class product extends Model
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
    ];

    protected static function booted()
    {
        static::created(function ($product) {
            $slug = Str::slug($product->name) . '-' . $product->id;
            $product->slug = $slug;
            $product->saveQuietly();
        });
    }
}
