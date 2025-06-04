<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home');
});

Route::get('/product', [ProductController::class, 'index']);

Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

Route::get('/auction', function () {
    return view('auction');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/cart', function () {
    return view('cart');
});