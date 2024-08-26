<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\SocialLoginController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Guest Routes
Route::middleware('guest')->group(function () {
    Volt::route('register', 'auth.register')
        ->name('register');

    Volt::route('login', 'auth.login')
        ->name('login');

    Volt::route('forgot-password', 'auth.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'auth.reset-password')
        ->name('password.reset');
});

// Auth Routes
Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirm-password', 'auth.confirm-password')
        ->name('password.confirm');

    Volt::route('user-image', 'auth.user-image')
        ->name('user-image');
});

// Social Login Routes
Route::get('/socialite/{driver}', [SocialLoginController::class, 'toProvider']);
Route::get('/auth/{driver}/login/', [SocialLoginController::class, 'handleCallback']);
