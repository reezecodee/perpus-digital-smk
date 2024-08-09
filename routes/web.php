<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Peminjam\BookController;
use App\Http\Controllers\Peminjam\ChatController;
use App\Http\Controllers\Peminjam\DashboardController;
use App\Http\Controllers\Peminjam\NotificationContrroller;
use App\Http\Controllers\Peminjam\PaymentOfFineController;
use App\Http\Controllers\Profile\LogicProfileController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Pustakawan\ChatMasukController;
use App\Http\Controllers\Pustakawan\Information\ViewInformationController;
use App\Http\Controllers\Pustakawan\MasterDataBuku\ViewBukuController;
use App\Http\Controllers\Pustakawan\MasterDataPeminjaman\ViewPeminjamanController;
use App\Http\Controllers\Pustakawan\MasterDataPengguna\ViewPenggunaController;
use App\Http\Controllers\Pustakawan\MasterDataPerpustakaan\ViewPerpustakaanController;
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
    return view('welcome', [
        'title' => 'Selamat datang di E-perpustakaan SITIKA',
        'chat_bubble' => false,
    ]);
});
Route::get('/test', function () {
    return view('test', ['title' => 'Test only']);
});

Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'show_login'])->name('show_login');
    Route::post('/login', [AuthController::class, 'logic_login'])->name('logic_login');
    Route::get('/register', [AuthController::class, 'show_register'])->name('show_register');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/hasil-pencarian', [BookController::class, 'show_search_result'])->name('peminjam.search');
Route::get('/buku/{id}', [BookController::class, 'show_book'])->name('peminjam.book');


Route::middleware(['auth', 'role:Peminjam'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'show_dashboard'])->name('peminjam.dashboard');
    Route::get('/notifikasi', [NotificationContrroller::class, 'show_notification'])->name('peminjam.notif');
    Route::get('/notifikasi/baca/{id}', [NotificationContrroller::class, 'show_read_notif'])->name('peminjam.read_notif');
    Route::get('/overview-profile', [ProfileController::class, 'show_overview'])->name('peminjam.overview');
    Route::get('/riwayat-peminjaman', [ProfileController::class, 'show_history'])->name('peminjam.history');
    Route::get('/ganti-password', [ProfileController::class, 'show_ch_password'])->name('peminjam.ch_password');
    Route::get('/konfirmasi-peminjaman/{id}', [BookController::class, 'show_confirm'])->name('peminjam.confirm');
    Route::get('/peminjaman-sukses', [BookController::class, 'show_success'])->name('peminjam.success');
    Route::get('/rak-buku-saya', [BookController::class, 'show_my_shelf'])->name('peminjam.shelf');
    Route::get('/baca-e-book/{id}', [BookController::class, 'show_read_e_book'])->name('peminjam.read_e_book');
    Route::get('/detail-peminjaman/{id}', [BookController::class, 'show_detail_rent'])->name('peminjam.detail');
    Route::get('/buku-disukai', [BookController::class, 'show_liked_book'])->name('peminjam.liked');
    Route::get('/semua-buku', [BookController::class, 'show_all_books'])->name('peminjam.all_books');
    Route::get('/chat', [ChatController::class, 'show_chat'])->name('peminjam.chat');
    Route::get('/pembayaran-denda/{id}', [PaymentOfFineController::class, 'show_payment'])->name('peminjam.payment');

    Route::post('/overview-profile', [LogicProfileController::class, 'upload_profile_image']);
    Route::post('/ganti-password', [LogicProfileController::class, 'update_password'])->name('peminjam.update_password');

    Route::put('/update-profile', [LogicProfileController::class, 'update_profile'])->name('peminjam.update_profile');
});


Route::middleware(['auth', 'role:Admin|Pustakawan'])->group(function () {
    Route::get('/dashboard-pustakawan', [PustakawanDashboardController::class, 'show_dashboard'])->name('pustakawan.dashboard');
    Route::get('/chat-masuk', [ChatMasukController::class, 'show_chat'])->name('chat_masuk');
    Route::get('/overview-profile-pustakawan', [ProfileController::class, 'show_overview_pustakawan'])->name('profile.overview');
});


Route::prefix('master-data')->group(function () {
    Route::middleware(['auth', 'role:Admin|Pustakawan'])->group(function () {
        Route::get('/admin', [ViewPenggunaController::class, 'show_data_admin'])->name('data-admin.index');
        Route::get('/pustakawan', [ViewPenggunaController::class, 'show_data_pustakawan'])->name('data-pustakawan.index');
        Route::get('/peminjam', [ViewPenggunaController::class, 'show_data_peminjam'])->name('data-peminjam.index');

        Route::get('/rak-buku', [ViewBukuController::class, 'show_data_rak_buku'])->name('data-buku.shelf');
        Route::get('/kategori', [ViewBukuController::class, 'show_data_kategori'])->name('data-buku.category');
        Route::get('/buku', [ViewBukuController::class, 'show_data_buku'])->name('data-buku.book');
        Route::get('/e-book', [ViewBukuController::class, 'show_data_ebook'])->name('data-buku.ebook');

        Route::get('/perpinjaman', [ViewPeminjamanController::class, 'show_data_peminjam'])->name('data-perpinjaman.index');
        Route::get('/pengembalian', [ViewPeminjamanController::class, 'show_data_pengembali'])->name('data-pengembali.index');
        Route::get('/kunjungan', [ViewPeminjamanController::class, 'show_data_kunjungan'])->name('data-kunjungan.index');
        Route::get('/denda', [ViewPeminjamanController::class, 'show_data_denda'])->name('data-denda.index');
    });

    Route::middleware(['auth', 'role:Admin'])->group(function () {
        Route::get('/aplikasi', [ViewPerpustakaanController::class, 'show_data_aplikasi'])->name('data-aplikasi.index');
        Route::get('/perpustakaan', [ViewPerpustakaanController::class, 'show_data_perpustakaan'])->name('data-perpustakaan.index');
    });

    Route::middleware(['auth', 'role:Admin'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/tambah', [ViewPenggunaController::class, 'show_tambah_admin'])->name('admin.add');
            Route::get('/perbarui', [ViewPenggunaController::class, 'show_perbarui_admin'])->name('admin.update');
        });
        Route::prefix('pustakawan')->group(function () {
            Route::get('/tambah', [ViewPenggunaController::class, 'show_tambah_pustakawan'])->name('pustakawan.add');
            Route::get('/perbarui', [ViewPenggunaController::class, 'show_perbarui_pustakawan'])->name('pustakawan.update');
        });
    });

    Route::middleware(['auth', 'role:Admin|Pustakawan'])->group(function () {
        Route::get('/detail', [ViewPenggunaController::class, 'show_detail_admin'])->name('admin.detail');
        Route::get('/detail', [ViewPenggunaController::class, 'show_detail_pustakawan'])->name('pustakawan.detail');

        Route::prefix('peminjam')->group(function () {
            Route::get('/tambah', [ViewPenggunaController::class, 'show_tambah_peminjam'])->name('peminjam.add');
            Route::get('/perbarui', [ViewPenggunaController::class, 'show_perbarui_peminjam'])->name('peminjam.update');
            Route::get('/detail', [ViewPenggunaController::class, 'show_detail_peminjam'])->name('peminjam.detail');
        });
    });
});

Route::prefix('informasi')->middleware(['auth', 'role:Admin|Pustakawan'])->group(function () {
    Route::get('/buat-notifikasi', [ViewInformationController::class, 'show_create_notif'])->name('buat_notifikasi');
    Route::get('/kirim-email', [ViewInformationController::class, 'show_send_email'])->name('kirim_email');
    Route::get('/buat-artikel', [ViewInformationController::class, 'show_create_article'])->name('buat_artikel');
    Route::get('/atur-kalender', [ViewInformationController::class, 'show_set_calendar'])->name('atur_kalender');
});
