<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/login', [AuthController::class, 'getLoginPage'])->name('auth.getLoginPage');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('getRegisterPage');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');


// Forgot Password Form (GET)
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('auth.forgotPassword');

// Send Reset Link Email (POST)
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])
    ->name('password.email');

// Reset Password Form (GET)
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])
    ->name('password.reset');

// Reset Password (POST)
Route::post('/reset-password', [AuthController::class, 'resetPassword'])
    ->name('password.update');


Route::middleware(['auth'])->group(function () {
    Route::resource('customers', CustomerController::class);
    Route::resource('artisans', ArtisanController::class);    
 });
// Route::get('/home', [HomeController::class, 'index'])->name('home');
