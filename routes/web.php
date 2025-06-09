<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Livewire\About;
use App\Livewire\Auction;
use App\Livewire\Home;

Route::get('/product', [ProductController::class, 'index']);

Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

Route::get('/', Home::class);
Route::get('/about', About::class);
Route::get('/auction', Auction::class);

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/pickup', function () {
    return view('pickup');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/profile', function () {
    return view('profile');
});