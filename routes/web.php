<?php

use App\Http\Controllers\SocialLoginController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth', 'verified'])
    ->name('profile');


Route::get('/socialite/{driver}', [SocialLoginController::class, 'toProvider']);
Route::get('/auth/{driver}/login/', [SocialLoginController::class, 'handleCallback']);

require __DIR__ . '/auth.php';
