<?php

use App\Http\Controllers\EmailVerificationNotificationController;
use App\Http\Controllers\EmailVerificationPromptController;
use App\Http\Controllers\VerifyEmailController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordConfirmationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome')->name('welcome');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);

    Route::get('forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');

    Route::get('reset-password', [ResetPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'store'])->name('password.update');
});

Route::middleware('auth')->group(function () {

    Route::view('/dashboard', 'dashboard')->middleware('verified')->name('dashboard');

    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');

    Route::get('email/verify', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');

    Route::get('email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware('signed')->name('verification.verify');

    Route::post('email/verifycation-notification', [EmailVerificationNotificationController::class, '__invoke'])->name('verification.send');

    Route::view('profile', 'profile')->middleware(['verified', 'password.confirm'])->name('profile');
    Route::get('confirm-password', [PasswordConfirmationController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [PasswordConfirmationController::class, 'store']);
});
