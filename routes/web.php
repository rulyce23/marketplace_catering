<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\HomeController;

// Route untuk halaman utama setelah login
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});



Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');      
// Routes untuk merchant
Route::middleware(['auth'])->group(function () {
    // routes/web.php


// Pastikan ini sudah ada di dalam group middleware 'auth'

    Route::get('/merchant/profile', [MerchantController::class, 'showProfile'])->name('merchant.profile');
    Route::post('/merchant/updateProfile', [MerchantController::class, 'updateProfile'])->name('merchant.updateProfile');
    Route::get('/merchant/menu', [MerchantController::class, 'showMenu'])->name('merchant.menu');
    Route::post('/merchant/menu', [MerchantController::class, 'createMenu'])->name('merchant.createMenu');
    Route::delete('/merchant/menu/{id}', [MerchantController::class, 'deleteMenu'])->name('merchant.deleteMenu');
    Route::get('/merchant/orders', [MerchantController::class, 'showOrders'])->name('merchant.orders');

});

// Routes untuk customer
Route::get('/customer/search', [CustomerController::class, 'search'])->name('customer.search');
Route::post('/customer/order', [OrderController::class, 'placeOrder'])->name('customer.placeOrder');
Route::get('/customer/orders', [OrderController::class, 'showCustomerOrders'])->name('customer.orders');

