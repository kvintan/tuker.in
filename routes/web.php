<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\PickupPage;
use App\Livewire\Profile;
use App\Livewire\Product;
use App\Livewire\ProductDetail;
use App\Livewire\Cart;
use App\Livewire\Home;
use App\Livewire\About;
use App\Livewire\Auction;

Route::get('/', Home::class);
Route::get('/about', About::class);

// Auth pages (public)
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class);
Route::get('/forgot-password', ForgotPassword::class);
Route::get('/reset-password', ResetPassword::class);
Route::get('/product', Product::class);
Route::get('/product/{slug}', ProductDetail::class);
Route::get('/auction', Auction::class);

// Pages that require login
Route::middleware(['auth'])->group(function () {
  Route::get('/profile', Profile::class);
  Route::get('/pickup', PickupPage::class);
  Route::get('/cart', Cart::class);
});
