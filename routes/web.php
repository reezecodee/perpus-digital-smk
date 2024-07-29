<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Peminjam\BookController;
use App\Http\Controllers\Peminjam\ChatController;
use App\Http\Controllers\Peminjam\DashboardController;
use App\Http\Controllers\Peminjam\NotificationContrroller;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Pustakawan\PustakawanDashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome', ['title' => 'Selamat datang di E-perpustakaan SITIKA']);
});

Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'show_login_page'])->name('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'show_dashboard_page'])->name('peminjam.dashboard');
Route::get('/notifikasi', [NotificationContrroller::class, 'show_notification_page'])->name('peminjam.notification');
Route::get('/notifikasi/baca', [NotificationContrroller::class, 'show_read_notif_page'])->name('peminjam.read_notif');
Route::get('/overview-profile', [ProfileController::class, 'show_overview_page'])->name('peminjam.overview');
Route::get('/riwayat-peminjaman', [ProfileController::class, 'show_history_page'])->name('peminjam.history');
Route::get('/ganti-password', [ProfileController::class, 'show_ch_password_page'])->name('peminjam.ch_password');
Route::get('/buku', [BookController::class, 'show_book_page'])->name('peminjam.book');
Route::get('/konfirmasi-peminjaman', [BookController::class, 'show_confirm_page'])->name('peminjam.confirm');
Route::get('/peminjaman-sukses', [BookController::class, 'show_success_page'])->name('peminjam.success');
Route::get('/rak-buku-saya', [BookController::class, 'show_book_shelf_page'])->name('peminjam.book_shelf');
Route::get('/detail-peminjaman', [BookController::class, 'show_detail_rent_page'])->name('peminjam.detail_rent');
Route::get('/buku-disukai', [BookController::class, 'show_liked_book_page'])->name('peminjam.liked_book');
Route::get('/semua-buku', [BookController::class, 'show_all_books_page'])->name('peminjam.all_books');
Route::get('/hasil-pencarian', [BookController::class, 'show_search_result_page'])->name('peminjam.search_result');
Route::get('/chat', [ChatController::class, 'show_chat_page'])->name('peminjam.chat');




Route::get('/dashboard-pustakawan', [PustakawanDashboardController::class, 'show_dashboard_page'])->name('pustakawan.dashboard');
