<?php

use App\Http\Controllers\PaymentdController;
use App\Http\Controllers\ProducDetailsController;
use App\Http\Controllers\productsByCategoryController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\AddProduct;
use App\Livewire\Admin\EditProduct;

// Public Routes
Route::view('/', 'home')->name('home');
Route::view('/wishlist', 'wishlist')->name('wishlist');
Route::view('/cart', 'cart')->name('cart');
Route::view('/pageNotFound', 'pageNotFound')->name('pageNotFound');
Route::view('/categories', 'category')->name('categories');
Route::get('/productDetails/{productId}', [ProducDetailsController::class, 'index'])->name('product-details');
Route::get('/Category/{category}', [productsByCategoryController::class, 'index'])->name('products-by-category');


// Authenticated User Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'userDashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('adminDashboard');
    })->name('adminDashboard');
    Route::get('/admin/addProduct', AddProduct::class)->name('addProduct');
    Route::get('/admin/editProduct/{productId}', EditProduct::class)->name('editProduct');
});


require __DIR__ . '/auth.php';

Route::get('/payments/verify/{payment?}',[PaymentdController::class,'payment_verify'])->name('verify-payment');
Route::view('/test', 'test')->name('test');
