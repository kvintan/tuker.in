<?php

use App\Livewire\Cart;
use App\Livewire\Home;
use App\Livewire\About;
use App\Livewire\Auction;
use App\Livewire\Product;
use App\Livewire\Profile;
use App\Livewire\Community;
use App\Livewire\Auth\Login;
use App\Livewire\CreatePost;
use App\Livewire\PickupPage;
use App\Livewire\HistoryPage;
use App\Livewire\SuccessPage;
use App\Livewire\CheckoutPage;
use App\Livewire\AuctionDetail;
use App\Livewire\Auth\Register;
use App\Livewire\HistoryDetail;
use App\Livewire\ProductDetail;
use App\Livewire\Auth\ResetPassword;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Auth\ForgotPassword;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityPostController;

Route::get('/', Home::class);
Route::get('/about', About::class);

// Auth pages (public)
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class);
Route::get('/forgot-password', ForgotPassword::class);
Route::get('/reset-password', ResetPassword::class);
Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');

// Pages that require login
Route::middleware(['auth'])->group(function () {
  Route::get('/profile', Profile::class);
  Route::get('/pickup', PickupPage::class);
  Route::get('/cart', Cart::class);
  Route::get('/checkout', CheckoutPage::class);
  Route::get('/community', Community::class)->name('community');
  Route::get('/product', Product::class);
  Route::get('/product/{slug}', ProductDetail::class);
  Route::get('/auction', Auction::class);
  Route::get('/create-post', CreatePost::class)->name('post.create');
  Route::get('/success', SuccessPage::class)->name('success');
  Route::get('/history', HistoryPage::class);
  Route::get('/history/{order_id}', HistoryDetail::class)->name('history.show');
  Route::get('/auction/{product}', AuctionDetail::class)->name('auction.detail');
  Route::get('/profile', Profile::class)->name('profile');


  Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login')->with('success', 'You have been logged out successfully.');
  })->name('logout');
});
