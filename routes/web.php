<?php

use App\Http\Controllers\SocialLoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::view('/', 'home')->name('home');

Route::view('/wishlist', 'wishlist')->name('wishlist');

Route::view('dashboard', 'userDashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth', 'verified'])
    ->name('profile');


Route::get('/socialite/{driver}', [SocialLoginController::class, 'toProvider']);
Route::get('/auth/{driver}/login/', [SocialLoginController::class, 'handleCallback']);

require __DIR__ . '/auth.php';


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('adminDashboard');
    })->name('adminDashboard');

    Route::get('/admin/users', function () {
        return view('livewire.admin.users');
    })->name('admin.users');

});


