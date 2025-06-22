<?php

use App\Http\Controllers\Excel\ExcelController;
use App\Http\Controllers\Officer\Book\HandlerBookController;
use App\Http\Controllers\Officer\Book\ManageBookController;
use App\Http\Controllers\Officer\Category\HandlerCategoryController;
use App\Http\Controllers\Officer\Category\ManageCategoryController;
use App\Http\Controllers\Officer\DashboardController;
use App\Http\Controllers\Officer\Fine\HandlerFineController;
use App\Http\Controllers\Officer\Help\ManageHelpController;
use App\Http\Controllers\Officer\Information\HandlerNotificationController;
use App\Http\Controllers\Officer\Information\HandlerScheduleController;
use App\Http\Controllers\Officer\Information\HandlerSendEmailController;
use App\Http\Controllers\Officer\Information\ManageNotificationController;
use App\Http\Controllers\Officer\Information\ManageSchedule;
use App\Http\Controllers\Officer\Information\ManageSendEmailController;
use App\Http\Controllers\Officer\Loan\HandlerLoanController;
use App\Http\Controllers\Officer\Loan\ManageLoanController;
use App\Http\Controllers\Officer\MasterDataLoan\ManageLoanFinedController;
use App\Http\Controllers\Officer\MasterDataLoan\ManageLoanReturnedController;
use App\Http\Controllers\Officer\MasterDataUsers\LogicUserController;
use App\Http\Controllers\Officer\MasterDataUsers\UserController;
use App\Http\Controllers\Officer\Profile\HandlerProfileController;
use App\Http\Controllers\Officer\Profile\ManageProfileController;
use App\Http\Controllers\Officer\Setting\HandlerSettingController;
use App\Http\Controllers\Officer\Setting\SettingController;
use App\Http\Controllers\Officer\Shelf\HandlerPlacementController;
use App\Http\Controllers\Officer\Shelf\HandlerShelfController;
use App\Http\Controllers\Officer\Shelf\ManageShelfController;
use App\Http\Controllers\Officer\Visit\HandlerVisitController;
use App\Http\Controllers\Officer\Visit\ManageVisitorController;
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
        Route::get('/dashboard', 'showDashboard')->name('show.dashboard');
    });

    Route::prefix('manajemen-bantuan')->group(function () {
        Route::controller(ManageHelpController::class)->group(function () {
            Route::get('/', 'showHelp')->name('help');
            Route::get('/detail-bantuan/{id}', 'showHelpDetail')->name('detail_help');
            Route::post('/print-bantuan/{id}', 'printHelpReport')->name('print_help_report');
        });
    });

    Route::controller(ManageProfileController::class)->group(function () {
        Route::get('/profile-petugas', 'showProfile')->name('profile.overview');
    });

    Route::controller(HandlerProfileController::class)->group(function () {
        Route::put('/update-profile-petugas', 'updateProfile')->name('profile.update_profile');
        Route::put('/ganti-pw-petugas', 'updatePassword')->name('profile.update_pw_petugas');
    });


    // Master Data User Route

    Route::controller(UserController::class)->group(function () {
        Route::get('/data-pengguna/{role}', 'showUser')->name('data-user');

        Route::prefix('data-pengguna')->group(function () {
            Route::get('/{role}/edit/{id}', 'showUserEdit')->name('edit_user');
            Route::get('/{role}/detail/{id}', 'showUserDetail')->name('detail_user');

            Route::controller(LogicUserController::class)->group(function () {
                Route::post('/tambah/{role}', 'storeUser')->name('store_user');
                Route::put('/perbarui/{id}', 'updateUser')->name('update_user');
                Route::post('/import-user', 'importUser')->name('direct_import_user');
            });
        });
    });

    // Master Data Buku Route

    Route::prefix('data-buku')->group(function () {
        Route::controller(ManageBookController::class)->group(function () {
            Route::get('/format/{format}', 'showBook')->name('data-buku');
            Route::get('/format/{format}/edit/{id}', 'showBookEdit')->name('edit_book');
            Route::get('/format/{format}/detail/{id}', 'showBookDetail')->name('detail_book');
        });

        Route::controller(HandlerBookController::class)->group(function () {
            Route::post('/tambah/{format}', 'storeBook')->name('store_book');
            Route::put('/edit/{format}/{id}', 'updateBook')->name('update_book');
            Route::delete('/hapus-buku/{id}', 'deleteBook')->name('delete_book');
            Route::post('/import-buku', 'importBooks')->name('direct_import_books');
        });

        Route::controller(ManageCategoryController::class)->group(function () {
            Route::get('/kategori', 'show_data_kategori')->name('data-kategori');
            Route::get('/edit-kategori/{id}', 'show_edit_category')->name('edit_category');
        });

        Route::controller(HandlerCategoryController::class)->group(function () {
            Route::post('/tambah-kategori', 'storeCategory')->name('add_category');
            Route::put('/update-kategori/{id}', 'updateCategory')->name('update_category');
            Route::delete('/delete-kategori/{id}', 'deleteCategory')->name('delete_category');
        });

        Route::controller(ManageShelfController::class)->group(function () {
            Route::get('/rak', 'showShelf')->name('data-rak');
            Route::get('/edit-rak/{id}', 'showShelfEdit')->name('edit_shelf');
            Route::get('/edit-penempatan/{id}', 'showPlacementEdit')->name('edit_placement');

            Route::get('/detail-rak/{id}', 'showShelfDetail')->name('detail_shelf');
        });

        Route::controller(HandlerShelfController::class)->group(function () {
            Route::post('/tambah-rak', 'storeShelf')->name('add_shelf');
            Route::put('/update-rak/{id}', 'updateShelf')->name('update_shelf');
            Route::put('/update-penempatan/{id}', 'updatePlacement')->name('update_placement');
            Route::delete('/hapus-rak/{id}', 'deleteShelf')->name('delete_shelf');
        });

        Route::controller(HandlerPlacementController::class)->group(function () {
            Route::post('/tambah-tempat/{id}', 'storePlacement')->name('add_placement');
        });
    });

    Route::controller(HandlerFineController::class)->group(function () {
        Route::put('/update-denda/{id}', 'updateFine')->name('update_fine');
    });

    // Master Data Peminjaman Route

    Route::prefix('data-peminjaman')->group(function () {
        Route::controller(ManageLoanController::class)->group(function () {
            Route::prefix('perpinjaman')->group(function () {
                Route::get('/daftar-peminjam', 'showLoan')->name('data_perpinjaman');
                Route::get('/edit-peminjaman/{id}', 'showLoanEdit')->name('edit_peminjaman');
                Route::get('/detail-peminjaman/{id}', 'showDetailLoan')->name('detail_peminjaman');
            });
        });

        Route::controller(HandlerLoanController::class)->group(function () {
            Route::post('/tambah-peminjaman', 'storeLoan')->name('store_peminjaman');
            Route::put('/edit-peminjaman/{id}', 'updateLoan')->name('update_peminjaman');
        });

        Route::controller(ManageLoanReturnedController::class)->group(function () {
            Route::get('/pengembalian', 'showReturnedLoan')->name('data_pengembalian');
        });

        Route::controller(ManageLoanFinedController::class)->group(function () {
            Route::get('/terkena-denda', 'showLoanFined')->name('data_terkena_denda');
            Route::get('/pembayaran-denda', 'showPaymentLoanFined')->name('data_pembayaran_denda');
        });

        Route::controller(ManageVisitorController::class)->group(function () {
            Route::prefix('kunjungan')->group(function () {
                Route::get('/', 'showVisit')->name('data_kunjungan');
                Route::get('/edit-kunjungan/{id}', 'showVisitEdit')->name('edit_kunjungan');
            });
        });

        Route::controller(HandlerVisitController::class)->group(function () {
            Route::post('/tambah-kunjungan', 'storeVisit')->name('store_visit');
            Route::put('/edit-kunjungan/{id}', 'updateVisit')->name('update_visit');
            Route::delete('/delete-kunjungan/{id}', 'deleteVisit')->name('delete_visit');
        });
    });

    Route::prefix('pengaturan')->controller(SettingController::class)->group(function () {
        Route::get('/pengaturan-aplikasi', 'showSetting')->name('setting');
    });

    Route::controller(HandlerSettingController::class)->group(function () {
        Route::put('/update-pengaturan', 'updateSettingApp')->name('setting.update');
        Route::post('/store-carousel', 'storeCarousel')->name('setting.storeCarousel');
        Route::delete('/delete-carousel', 'deleteCarousel')->name('delete_carousel');
    });

    Route::prefix('informasi')->group(function () {
        Route::controller(ManageNotificationController::class)->group(function () {
            Route::get('/buat-notifikasi', 'showNotification')->name('buat_notifikasi');
            Route::get('/detail-notifikasi/{id}', 'showDetailNotification')->name('detail_notif');
        });

        Route::controller(HandlerNotificationController::class)->group(function () {
            Route::post('/kirim-notifikasi', 'storeNotification')->name('send_notification');
            Route::delete('/hapus-notifikasi/{id}', 'deleteNotification')->name('delete_notification');
        });

        Route::controller(ManageSendEmailController::class)->group(function () {
            Route::get('/kirim-email', 'showSendEmail')->name('kirim_email');
        });

        Route::controller(HandlerSendEmailController::class)->group(function () {
            Route::post('/kirim-email', 'sendEmail')->name('send_email');
        });

        Route::controller(ManageSchedule::class)->group(function () {
            Route::get('/atur-kalender', 'showCalendar')->name('atur_kalender');
            Route::get('/schedule-events', 'getSchedule')->name('jadwal_kalender');
        });

        Route::controller(HandlerScheduleController::class)->group(function () {
            Route::post('/tambah-jadwal', 'add_schedule')->name('add_schedule');
            Route::delete('/hapus-jadwal/{id}', 'delete_schedule')->name('delete_schedule');
        });
    });

    Route::controller(PDFController::class)->group(function () {
        Route::post('/print_users/{role}', 'printDataUsers')->name('print_pdf_users');
        Route::post('/print_books/{format}', 'printDataBooks')->name('print_pdf_books');
        Route::post('/print_helps', 'printDataHelps')->name('print_pdf_helps');
        Route::post('/print_log_aktivitas', 'printDataLogs')->name('print_pdf_logs');
    });

    Route::controller(ExcelController::class)->group(function () {
        Route::post('/export_users/{role}', 'exportUsers')->name('export_users');
        Route::post('/export_helps', 'exportHelps')->name('export_helps');
        Route::post('/export_books/{format}', 'exportBooks')->name('export_books');
        Route::post('/export_aktivitas', 'exportLogs')->name('export_logs');
    });
});
