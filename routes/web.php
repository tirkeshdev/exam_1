<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)
    ->group(function () {
        Route::get('login', 'create')->middleware('guest')->name('login');
        Route::post('login', 'store')->middleware('guest');
        Route::post('logout', 'destroy')->middleware('auth')->name('logout');
    });

Route::middleware('guest')
    ->group(function () {
        Route::get('register', [RegisterController::class, 'create'])->name('register');
        Route::post('register', [RegisterController::class, 'store']);
    });

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/category/{id}', [ProductController::class, 'index'])->name('index');
Route::get('/seller/{id}', [SellerController::class, 'show'])->name('seller_show');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('show');
Route::get('/discounts', [ProductController::class, 'discounts'])->name('discounts');
Route::get('/builts', [ProductController::class, 'builts'])->name('builts');
Route::get('/locale/{locale}', [HomeController::class, 'locale'])->name('locale')->whereIn('locale', ['ru', 'en']);
