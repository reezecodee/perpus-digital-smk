<?php

use App\Http\Controllers\Excel\ExcelController;
use App\Http\Controllers\Librarian\DashboardController;
use App\Http\Controllers\Librarian\Help\ManageHelp;
use App\Http\Controllers\Librarian\Image\ManageCarousel;
use App\Http\Controllers\Librarian\Information\ManageNotification;
use App\Http\Controllers\Librarian\Information\ManageSchedule;
use App\Http\Controllers\Librarian\Information\ManageSendEmail;
use App\Http\Controllers\Librarian\Log\ManageLogActivity;
use App\Http\Controllers\Librarian\MasterDataBook\ManageBook;
use App\Http\Controllers\Librarian\MasterDataBook\ManageCategory;
use App\Http\Controllers\Librarian\MasterDataBook\ManageFineBook;
use App\Http\Controllers\Librarian\MasterDataBook\ManagePlacement;
use App\Http\Controllers\Librarian\MasterDataBook\ManageShelf;
use App\Http\Controllers\Librarian\MasterDataLibrary\ManageAppWeb;
use App\Http\Controllers\Librarian\MasterDataLibrary\ManageLibrary;
use App\Http\Controllers\Librarian\MasterDataLoan\ManageLoan;
use App\Http\Controllers\Librarian\MasterDataLoan\ManageLoanFined;
use App\Http\Controllers\Librarian\MasterDataLoan\ManageLoanReturned;
use App\Http\Controllers\Librarian\MasterDataLoan\ManageVisitor;
use App\Http\Controllers\Librarian\MasterDataUsers\LogicUserController;
use App\Http\Controllers\Librarian\MasterDataUsers\UserController;
use App\Http\Controllers\Librarian\Profile\ManageProfile;
use App\Http\Controllers\Librarian\Setting\SettingController;
use App\Http\Controllers\PDF\PDFController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Route Middleware Admin & Pustakawan
|--------------------------------------------------------------------------
| Route ini mencakup halaman yang boleh diakses oleh user dengan role Admin dan Pustakawan
|
*/

Route::middleware(['auth', 'role:Admin|Pustakawan', 'status_active', 'verified'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'show_dashboard')->name('show.dashboard');
    });

    Route::controller(ManageCarousel::class)->group(function () {
        Route::get('/carousel', 'show_carousel')->name('carousel');
        Route::post('/carousel', 'upload_carousel')->name('upload_carousel');
        Route::delete('/hapus-carousel/{id}', 'delete_carousel')->name('delete_carousel');
    });

    Route::controller(ManageHelp::class)->group(function () {
        Route::get('/manajemen-bantuan', 'show_help')->name('help');
        Route::get('/manajemen-bantuan/detail-bantuan/{id}', 'show_detail_help')->name('detail_help');
        Route::delete('/hapus-bantuan/{id}', 'delete_help')->name('delete_help');
        Route::post('/print-bantuan/{id}', 'print_help_report')->name('print_help_report');
    });

    Route::controller(ManageLogActivity::class)->group(function () {
        Route::get('/log-aktivitas', 'show_log')->name('log_activity');
    });

    Route::controller(ManageProfile::class)->group(function () {
        Route::get('/profile-petugas', 'show_overview_profile')->name('profile.overview');
        Route::put('/update-profile-petugas', 'update_profile')->name('profile.update_profile');
        Route::put('/ganti-pw-petugas', 'update_password')->name('profile.update_pw_petugas');
    });


    // Master Data User Route

    Route::controller(UserController::class)->group(function () {
        Route::get('/data-pengguna/{role}', 'show_data_user')->name('data-user');

        Route::prefix('data-pengguna')->group(function () {
            Route::get('/{role}/tambah/', 'show_add_user')->name('add_user');
            Route::get('/{role}/edit/{id}', 'show_edit_user')->name('edit_user');
            Route::get('/{role}/detail/{id}', 'show_detail_user')->name('detail_user');

            Route::controller(LogicUserController::class)->group(function () {
                Route::post('/tambah/{role}', 'store_user')->name('store_user');
                Route::put('/perbarui/{id}', 'update_user')->name('update_user');
                Route::post('/import-user', 'import_user')->name('direct_import_user');
            });
        });
    });

    // Master Data Buku Route

    Route::prefix('data-buku')->group(function () {
        Route::controller(ManageBook::class)->group(function () {
            Route::get('/format/{format}', 'show_data_buku')->name('data-buku');
            Route::get('/format/{format}/tambah/', 'show_add_book')->name('add_book');
            Route::get('/format/{format}/edit/{id}', 'show_edit_book')->name('edit_book');
            Route::get('/format/{format}/detail/{id}', 'show_detail_book')->name('detail_book');

            Route::post('/tambah/{format}', 'store_book')->name('store_book');
            Route::put('/edit/{id}', 'update_book')->name('update_book');
            Route::delete('/hapus-buku/{id}', 'delete_book')->name('delete_book');
            Route::post('/import-buku', 'import_books')->name('direct_import_books');
        });

        Route::controller(ManageCategory::class)->group(function () {
            Route::get('/kategori', 'show_data_kategori')->name('data-kategori');
            Route::get('/edit-kategori/{id}', 'show_edit_category')->name('edit_category');
            Route::post('/tambah-kategori', 'add_category')->name('add_category');
            Route::put('/update-kategori/{id}', 'update_category')->name('update_category');
            Route::delete('/delete-kategori/{id}', 'delete_category')->name('delete_category');
        });

        Route::controller(ManageShelf::class)->group(function () {
            Route::get('/rak', 'show_data_rak_buku')->name('data-rak');
            Route::get('/edit-rak/{id}', 'show_edit_shelf')->name('edit_shelf');
            Route::post('/tambah-rak', 'add_shelf')->name('add_shelf');
            Route::put('/edit-rak/{id}', 'update_shelf')->name('update_shelf');
            Route::delete('/hapus-rak/{id}', 'delete_shelf')->name('delete_shelf');
        });
    });

    Route::controller(ManagePlacement::class)->group(function () {
        Route::get('/penempatan-buku', 'show_placement')->name('data-penempatan');
        Route::get('/penempatan-buku/tambah', 'show_add_placement')->name('add_placement');
        Route::get('/penempatan-buku/edit/{id}', 'show_edit_placement')->name('edit_placement');
        Route::post('/penempatan-buku/tambah', 'store_placement')->name('store_placement');
        Route::put('/penempatan-buku/update/{id}', 'update_placement')->name('update_placement');
        Route::delete('/hapus-penempatan/{id}', 'delete_placement')->name('delete_placement');
    });

    Route::controller(ManageFineBook::class)->group(function () {
        Route::get('/denda', 'show_data_denda')->name('data-denda');
    });

    // Master Data Peminjaman Route

    Route::prefix('data-peminjaman')->group(function () {
        Route::controller(ManageLoan::class)->group(function () {
            Route::prefix('perpinjaman')->group(function () {
                Route::get('/daftar-peminjam', 'show_data_peminjam')->name('data_perpinjaman');
                Route::get('/tambah-peminjaman', 'show_add_peminjaman')->name('add_peminjaman');
                Route::get('/edit-peminjaman/{id}', 'show_edit_peminjaman')->name('edit_peminjaman');
                Route::get('/detail-peminjaman/{id}', 'show_detail_peminjaman')->name('detail_peminjaman');
            });

            Route::post('/tambah-peminjaman', 'store_peminjaman')->name('store_peminjaman');
            Route::put('/edit-peminjaman/{id}', 'update_peminjaman')->name('update_peminjaman');
            Route::delete('/delete-peminjaman/{id}', 'delete_peminjaman')->name('delete_peminjaman');
        });

        Route::controller(ManageLoanReturned::class)->group(function () {
            Route::get('/pengembalian', 'show_data_pengembali')->name('data_pengembalian');
        });

        Route::controller(ManageLoanFined::class)->group(function () {
            Route::get('/terkena-denda', 'show_data_terkena_denda')->name('data_terkena_denda');
            Route::get('/pembayaran-denda', 'show_pembayaran_denda')->name('data_pembayaran_denda');
        });

        Route::controller(ManageVisitor::class)->group(function () {
            Route::get('/kunjungan', 'show_data_visit')->name('data_kunjungan');
            Route::prefix('kunjungan')->group(function () {
                Route::get('/tambah-kunjungan', 'show_add_visit')->name('add_kunjungan');
                Route::get('/edit-kunjungan/{id}', 'show_edit_visit')->name('edit_kunjungan');
            });

            Route::post('/tambah-kunjungan', 'store_visit')->name('store_visit');
            Route::put('/edit-kunjungan/{id}', 'update_visit')->name('update_visit');
            Route::delete('/delete-kunjungan/{id}', 'delete_visit')->name('delete_visit');
        });
    });

    Route::get('/pengaturan-aplikasi', [SettingController::class, 'index'])->name('setting');
    Route::put('/update-pengaturan', [SettingController::class, 'updateSettingApp'])->name('setting.update');
    Route::post('/store-carousel', [SettingController::class, 'storeCarousel'])->name('setting.storeCarousel');

    Route::prefix('informasi')->group(function () {
        Route::controller(ManageNotification::class)->group(function () {
            Route::get('/buat-notifikasi', 'show_create_notif')->name('buat_notifikasi');
            Route::post('/kirim-notifikasi', 'send_notification')->name('send_notification');
            Route::delete('/hapus-notifikasi/{id}', 'delete_notification')->name('delete_notification');
            Route::get('/detail-notifikasi/{id}', 'detail_notif')->name('detail_notif');
        });

        Route::controller(ManageSendEmail::class)->group(function () {
            Route::get('/kirim-email', 'show_send_email')->name('kirim_email');
            Route::post('/kirim-email', 'send_email')->name('send_email');
        });

        Route::controller(ManageSchedule::class)->group(function () {
            Route::get('/atur-kalender', 'show_set_calendar')->name('atur_kalender');
            Route::post('/tambah-jadwal', 'add_schedule')->name('add_schedule');
            Route::delete('/hapus-jadwal/{id}', 'delete_schedule')->name('delete_schedule');
        });
    });

    Route::controller(PDFController::class)->group(function () {
        Route::post('/print_users/{role}', 'print_data_users')->name('print_pdf_users');
        Route::post('/print_books/{format}', 'print_data_books')->name('print_pdf_books');
        Route::post('/print_helps', 'print_data_helps')->name('print_pdf_helps');
        Route::post('/print_log_aktivitas', 'print_data_logs')->name('print_pdf_logs');
    });

    Route::controller(ExcelController::class)->group(function () {
        Route::post('/export_users/{role}', 'export_users')->name('export_users');
        Route::post('/export_helps', 'export_helps')->name('export_helps');
        Route::post('/export_books/{format}', 'export_books')->name('export_books');
        Route::post('/export_aktivitas', 'export_logs')->name('export_logs');
    });
});
