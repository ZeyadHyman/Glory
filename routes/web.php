<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ProductsByCategoryController;
use App\Livewire\Admin\SizeGuideUpload;
use App\Livewire\Admin\AddCategory;
use App\Livewire\Admin\AddProduct;
use App\Livewire\Admin\EditCategory;
use App\Livewire\Admin\EditProduct;
use App\Livewire\Admin\FrameColor;
use App\Livewire\Admin\FrameSize;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home'); // Home page
Route::view('/wishlist', 'wishlist')->name('wishlist'); // User wishlist
Route::view('/cart', 'cart')->name('cart'); // Shopping cart
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories'); // Categories page
Route::get('/productDetails/{productId}', [ProductDetailsController::class, 'index'])->name('product-details'); // Product details page
Route::get('/category/{category}', [ProductsByCategoryController::class, 'index'])->name('products-by-category'); // Products by category
Route::post('/payment', [PayController::class, 'pay'])->name('pay'); // Payment processing

// Authenticated User Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/dashboard', 'userDashboard')->name('dashboard'); // User dashboard
    Route::view('/profile', 'profile')->name('profile'); // User profile
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::view('/dashboard', 'adminDashboard')->name('adminDashboard'); // Admin dashboard

    Route::get('/add-product', AddProduct::class)->name('addProduct'); // Add new product
    Route::get('/edit-product/{productId}', EditProduct::class)->name('editProduct'); // Edit product

    Route::get('/add-category', AddCategory::class)->name('addCategory'); // Add new category
    Route::get('/edit-category/{categoryId}', EditCategory::class)->name('editCategory'); // Edit category

    Route::get('/size-guide', SizeGuideUpload::class)->name('EditSizeGuideImage');

    Route::get('/frame-sizes', FrameSize::class)->name('EditFrameSizes');
    Route::get('/frame-colors', FrameColor::class)->name('EditFrameColors');
});

// Include authentication routes
require __DIR__ . '/auth.php';
