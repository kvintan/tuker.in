<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/product/detail', function () {
    return view('productDetail');
});

Route::get('/auction', function () {
    return view('auction');
});