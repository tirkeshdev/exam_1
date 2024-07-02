<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/category/{id}', [ProductController::class, 'index'])->name('index');
Route::get('/seller/{id}', [SellerController::class, 'show'])->name('seller_show');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('show');
Route::get('/discounts', [ProductController::class, 'discounts'])->name('discounts');
Route::get('/builts', [ProductController::class, 'builts'])->name('builts');
Route::get('/locale/{locale}', [HomeController::class, 'locale'])->name('locale')->whereIn('locale', [ 'ru', 'en']);
