<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\HandlerLoginController;
use App\Http\Controllers\Auth\HandlerLogoutController;
use App\Http\Controllers\Auth\HandlerVerifEmailController;
use App\Http\Controllers\PasswordReset\HandlerPasswordResetController;
use App\Http\Controllers\PasswordReset\PasswordResetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
| memuat route yang berkaitan dengan proses Auth.
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::prefix('auth')->middleware('guest')->group(function () {
        Route::get('/login', 'showLoginPage')->name('show.login');
    });

    Route::get('/email/verify', 'showVerifyNoticePage')->middleware(['auth'])->name('verification.notice');
    Route::get('/not-activated', 'showNotActivatedPage')->name('show.notActivated');
});

Route::controller(HandlerLoginController::class)->group(function (){
    Route::post('/login', 'loginHandler')->name('login.process');
});

Route::controller(HandlerVerifEmailController::class)->group(function(){
    Route::post('/email/verification-notification', 'resendVerification')->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
    Route::get('/email/verify/{id}/{hash}', 'verifyUserEmail')->middleware(['auth', 'signed'])->name('verification.verify');
});

Route::post('/logout', HandlerLogoutController::class)->name('logout');


/*
|--------------------------------------------------------------------------
| Password Reset
|--------------------------------------------------------------------------
| memuat route yang berkaitan dengan reset password.
|
*/


Route::controller(PasswordResetController::class)->group(function () {
    Route::get('/lupa-password', 'showForgotPasswordPage')->name('show.forgotPassword');
    Route::get('/reset-password/{token}', 'showResetPasswordPage')->name('show.resetPassword');
});


Route::controller(HandlerPasswordResetController::class)->group(function () {
    Route::post('/lupa-password', 'sendResetLinkEmail')->name('verify.sendResetLink');
    Route::post('/reset-password', 'resetPassword')->name('password.reset');
});
