<?php

use App\Http\Controllers\ProducDetailsController;
use App\Http\Controllers\productsByCategoryController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::view('/', 'home')->name('home');
Route::view('/wishlist', 'wishlist')->name('wishlist');
Route::view('/pageNotFound', 'pageNotFound')->name('pageNotFound');
Route::get('/productDetails/{productId}', [ProducDetailsController::class, 'index'])->name('product-details');
Route::get('/productsByCategory/{category}', [productsByCategoryController::class, 'index'])->name('products-by-category');


// Authenticated User Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'userDashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::view('/admin/dashboard', 'adminDashboard')->name('adminDashboard');
    Route::view('/admin/users', 'livewire.admin.users')->name('admin.users');
});


// Include authentication-related routes
require __DIR__ . '/auth.php';
