<?php

use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| SiteController Group
|--------------------------------------------------------------------------
| SiteController class group memuat route yang dapat diakses tanpa melakukan proses Auth,
| Ini merupakan bagian yang memuat informasi mengenai website E-Perpustakaan ini.
|
*/

Route::controller(SiteController::class)->group(function () {
    Route::get('/syarat-dan-ketentuan', 'showTermsConditionsPage')->name('show.termsConditions');
    Route::get('/kebijakan-privasi', 'showPrivacyPolicyPage')->name('show.privacyPolicy');
    Route::get('/tentang-kami', 'showAboutUsPage')->name('show.aboutUs');
    Route::get('/kontak-kami', 'showContactUsPage')->name('show.contactUs');
    Route::get('/crop-picture', 'showCropPicturePage')->name('show.cropPicture');
});
