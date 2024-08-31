<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ProductsByCategoryController;
use App\Livewire\Admin\AddCategory;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\AddProduct;
use App\Livewire\Admin\EditCategory;
use App\Livewire\Admin\EditProduct;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home'); // Home page
Route::view('/wishlist', 'wishlist')->name('wishlist'); // User wishlist
Route::view('/cart', 'cart')->name('cart'); // Shopping cart
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories'); // Categories page
Route::get('/productDetails/{productId}', [ProductDetailsController::class, 'index'])->name('product-details'); // Product details page
Route::get('/category/{category}', [ProductsByCategoryController::class, 'index'])->name('products-by-category'); // Products by category
Route::post('/payment', [PayController::class, 'pay'])->name('payment'); // Payment processing

// Authenticated User Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/dashboard', 'userDashboard')->name('dashboard'); // User dashboard
    Route::view('/profile', 'profile')->name('profile'); // User profile
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::view('/dashboard', 'adminDashboard')->name('adminDashboard'); // Admin dashboard
    Route::get('/add-product', AddProduct::class)->name('addProduct'); // Add new product
    Route::get('/edit-product/{productId}', EditProduct::class)->name('editProduct'); // Edit existing product
    Route::get('/add-category', AddCategory::class)->name('addCategory'); // Add new category
    Route::get('/edit-category/{categoryId}', EditCategory::class)->name('editCategory'); // Edit existing category
});

// Include authentication routes
require __DIR__ . '/auth.php';
