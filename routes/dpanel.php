<?php

use Illuminate\Support\Facades\Route;


Route::namespace('App\Http\Controllers\Dpanel')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('category', CategoryController::class)->names('category')->only('index', 'store', 'update');
    Route::resource('brand', BrandController::class)->names('brand')->only('index', 'store', 'update');
    Route::resource('color', ColorController::class)->names('color')->only('index', 'store', 'update');
    Route::resource('size', SizeController::class)->names('size')->only('index', 'store', 'update');
    Route::resource('product', ProductController::class)->names('product')->except('show', 'destroy');
});
Route::get('/logout', [\DD4You\Dpanel\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::resource('global-settings', \DD4You\Dpanel\Http\Controllers\GlobalSettingController::class)->only('index', 'store');


