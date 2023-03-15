<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::view('/pd/slug', 'product_detail')->name('product_detail');
Route::view('/products', 'products')->name('products');
Route::view('/cart', 'cart')->name('cart');