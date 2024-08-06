<?php

use App\Http\Controllers\SocialLoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::view('/', 'home')->name('home');

Route::view('/wishlist', 'wishlist')->name('wishlist');

Route::view('dashboard', 'userDashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::get('/zz', function () {
    dd(Session::all());
});

Route::get('/socialite/{driver}', [SocialLoginController::class, 'toProvider']);
Route::get('/auth/{driver}/login/', [SocialLoginController::class, 'handleCallback']);

require __DIR__ . '/auth.php';





Route::view('test', 'adminDashboard')->middleware('admin');

Route::view('profile', 'profile')
    ->middleware(['auth', 'verified'])
    ->name('profile');

Route::get('/z', function () {
    Session::put('cart', [0]);
    Session::push('cart', 5);
    Session::put('wishlist', [0]);
    Session::push('wishlist', 5);
    Session::save();
    dd(Session::all());
});
