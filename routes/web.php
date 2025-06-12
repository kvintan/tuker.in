<?php

use App\Livewire\Cart;
use App\Livewire\Home;
use App\Livewire\About;
use App\Livewire\Pickup;
use App\Livewire\Auction;
use App\Livewire\Product;
use App\Livewire\Profile;
use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/product', [ProductController::class, 'index']);

Route::get('/', Home::class);
Route::get('/about', About::class);
Route::get('/auction', Auction::class);
Route::get('/cart', Cart::class);
Route::get('/pickup', Pickup::class);
Route::get('/product', Product::class);
Route::get('/profile', Profile::class);
Route::get('/login', Login::class);