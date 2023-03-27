<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::controller(HomeController::class)->group(function(){
Route::get('/', 'index')->name('landing-page');
Route::get('/pd/{slug}', 'productDetail')->name('product_detail');
});

//Route::view('/pd/slug', 'product_detail')->name('product_detail');
Route::view('/products', 'products')->name('products');
Route::view('/cart', 'cart')->name('cart');
Route::view('/wishlist', 'wishlist')->name('wishlist');
Route::view('/account', 'account')->name('account');