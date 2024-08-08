<?php

use App\Http\Controllers\ProducDetails;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::view('/', 'home')->name('home');
Route::view('/wishlist', 'wishlist')->name('wishlist');
Route::view('/pageNotFound', 'pageNotFound')->name('pageNotFound');
Route::get('/productDetails/{productId}', [ProducDetails::class, 'index'])->name('product-details');


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
