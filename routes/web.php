<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Peminjam\Book\BookController;
use App\Http\Controllers\Peminjam\Book\LogicBookController;
use App\Http\Controllers\Peminjam\Chat\ChatController;
use App\Http\Controllers\Peminjam\Dashboard\DashboardController;
use App\Http\Controllers\Peminjam\Notification\NotificationController;
use App\Http\Controllers\Peminjam\Payment\PaymentFineController;
use App\Http\Controllers\Peminjam\Profile\LogicPeminjamProfileController;
use App\Http\Controllers\Peminjam\Profile\PeminjamProfileController;
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

Route::controller(AuthController::class)->group(function () {
    Route::prefix('auth')->middleware('guest')->group(function () {
        Route::get('/login', 'show_login')->name('show_login');
        Route::get('/register', 'show_register')->name('show_register');

        Route::post('/login', 'logic_login')->name('logic_login');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::controller(BookController::class)->group(function () {
    Route::middleware(['auth', 'role:Peminjam'])->group(function () {
        Route::get('/peminjaman-sukses', 'show_success')->name('success');
        Route::get('/rak-buku-saya', 'show_my_shelf')->name('my_shelf');
        Route::get('/baca-e-book/{id}', 'show_read_e_book')->name('read_e_book');
        Route::get('/detail-peminjaman/{id}', 'show_detail_rent')->name('detail_rent');
        Route::get('/buku-disukai', 'show_liked_book')->name('liked');
        Route::get('/semua-buku', 'show_all_books')->name('all_books');
        Route::get('/konfirmasi-peminjaman/{id}', 'show_confirm')->name('confirm');
    });

    Route::get('/hasil-pencarian', 'show_search_result')->name('search_result');
    Route::get('/buku/{id}', 'show_book')->name('detail_buku');
});


Route::controller(DashboardController::class)->group(function () {
    Route::middleware(['auth', 'role:Peminjam'])->group(function () {
        Route::get('/dashboard', 'show_dashboard')->name('dashboard');
    });
});


Route::controller(NotificationController::class)->group(function () {
    Route::middleware(['auth', 'role:Peminjam'])->group(function () {
        Route::get('/notifikasi', 'show_notification')->name('notification');
        Route::get('/notifikasi/baca/{id}', 'show_read_notif')->name('read_notif');
    });
});


Route::controller(PeminjamProfileController::class)->group(function () {
    Route::middleware(['auth', 'role:Peminjam'])->group(function () {
        Route::get('/overview-profile', 'show_overview')->name('overview');
        Route::get('/riwayat-peminjaman', 'show_history')->name('history');
        Route::get('/ganti-password', 'show_ch_password')->name('ch_password');
    });
});


Route::controller(ChatController::class)->group(function () {
    Route::middleware(['auth', 'role:Peminjam'])->group(function () {
        Route::get('/chat', 'show_chat_index')->name('chat_index');
        Route::get('/chat{id}', 'show_chat')->name('chat');
    });
});


Route::controller(PaymentFineController::class)->group(function () {
    Route::middleware(['auth', 'role:Peminjam'])->group(function () {
        Route::get('/pembayaran-denda/{id}', 'show_payment')->name('payment');
    });
});


Route::controller(LogicPeminjamProfileController::class)->group(function(){
    Route::middleware(['auth', 'role:Peminjam'])->group(function () {
        Route::post('/overview-profile', 'upload_profile_image');
        Route::post('/ganti-password', 'update_password')->name('update_password');

        Route::put('/update-profile', 'update_profile_peminjam')->name('update_profile');
    });
});


Route::controller(LogicBookController::class)->group(function(){
    Route::middleware(['auth', 'role:Peminjam'])->group(function () {
        Route::post('/sukai-buku/{id}', 'update_like')->name('update_like');
        Route::delete('/hapus-e-book/{id}', 'delete_e_book')->name('delete_e_book');
    });
});




// 
Route::middleware(['auth', 'role:Admin|Pustakawan'])->group(function () {
    Route::get('/dashboard-pustakawan', [PustakawanDashboardController::class, 'show_dashboard'])->name('pustakawan.dashboard');
    Route::get('/chat-masuk', [ChatMasukController::class, 'show_chat'])->name('chat_masuk');
    // Route::get('/overview-profile-pustakawan', [ProfileController::class, 'show_overview_pustakawan'])->name('profile.overview');
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
