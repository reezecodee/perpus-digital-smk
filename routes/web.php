<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Excel\ExcelController;
use App\Http\Controllers\Excel\ImportExcelController;
use App\Http\Controllers\PDF\PDFController;
use App\Http\Controllers\Peminjam\Book\BookController;
use App\Http\Controllers\Peminjam\Book\LogicBookController;
use App\Http\Controllers\Peminjam\Calendar\CalendarController;
use App\Http\Controllers\Peminjam\Chat\ChatController;
use App\Http\Controllers\Peminjam\Dashboard\DashboardController;
use App\Http\Controllers\Peminjam\Notification\NotificationController;
use App\Http\Controllers\Peminjam\Payment\PaymentFineController;
use App\Http\Controllers\Peminjam\Profile\LogicPeminjamProfileController;
use App\Http\Controllers\Peminjam\Profile\PeminjamProfileController;
use App\Http\Controllers\Peminjam\Visit\VisitController;
use App\Http\Controllers\Pustakawan\ChatMasukController;
use App\Http\Controllers\Pustakawan\Information\InformationController;
use App\Http\Controllers\Pustakawan\MasterDataBuku\BukuController;
use App\Http\Controllers\Pustakawan\MasterDataPeminjaman\PeminjamanController;
use App\Http\Controllers\Pustakawan\MasterDataPengguna\LogicUserController;
use App\Http\Controllers\Pustakawan\MasterDataPengguna\UserController;
use App\Http\Controllers\Pustakawan\MasterDataPerpustakaan\PerpustakaanController;
use App\Http\Controllers\Pustakawan\Profile\PustakawanProfileController;
use App\Http\Controllers\Pustakawan\PustakawanDashboardController;
use App\Http\Controllers\Site\SiteController;
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


/*
|--------------------------------------------------------------------------
| SiteController Group
|--------------------------------------------------------------------------
| SiteController class group memuat route yang dapat diakses tanpa melakukan proses Auth, 
| Ini merupakan bagian yang memuat informasi mengenai website E-Perpustakaan ini. 
|
*/

Route::controller(SiteController::class)->group(function () {
    Route::get('/syarat-dan-ketentuan', 'terms_conditions')->name('terms_conditions');
    Route::get('/kebijakan-privasi', 'privacy_policy')->name('privacy_policy');
    Route::get('/tentang-kami', 'about_us')->name('about_us');
    Route::get('/kontak-kami', 'contact_us')->name('contact_us');
    Route::get('/artikel', 'article')->name('article');
});




/*
|--------------------------------------------------------------------------
| AuthController Group
|--------------------------------------------------------------------------
| AuthController class group memuat route yang berkaitan dengan proses Auth. Ini mencakup 
| http route GET dan POST 
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::prefix('auth')->middleware('guest')->group(function () {
        Route::get('/login', 'show_login')->name('show_login');
        Route::get('/register', 'show_register')->name('show_register');

        Route::post('/login', 'logic_login')->name('logic_login');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});



/*
|--------------------------------------------------------------------------
| Route Middleware Peminjam
|--------------------------------------------------------------------------
| Ini merupakan route yang hanya boleh diakses oleh user dengan role peminjam saja,
|
*/

Route::middleware(['auth', 'role:Peminjam'])->group(function () {
    Route::controller(BookController::class)->group(function () {
        Route::get('/peminjaman-sukses', 'show_success')->name('success');
        Route::get('/rak-buku-saya', 'show_my_shelf')->name('my_shelf');
        Route::get('/baca-e-book/{id}', 'show_read_e_book')->name('read_e_book');
        Route::get('/detail-peminjaman/{id}', 'show_detail_rent')->name('detail_rent');
        Route::get('/buku-disukai', 'show_liked_book')->name('liked');
        Route::get('/semua-buku', 'show_all_books')->name('all_books');
        Route::get('/konfirmasi-peminjaman/{id}', 'show_confirm')->name('confirm');

        Route::withoutMiddleware(['auth', 'role:Peminjam'])->group(function () {
            Route::get('/hasil-pencarian', 'show_search_result')->name('search_result');
            Route::get('/buku/{id}', 'show_book')->name('detail_buku');
        });
    });


    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'show_dashboard')->name('dashboard');
    });


    Route::controller(NotificationController::class)->group(function () {
        Route::get('/notifikasi', 'show_notification')->name('notification');
        Route::get('/notifikasi/baca/{id}', 'show_read_notif')->name('read_notif');
    });


    Route::controller(PeminjamProfileController::class)->group(function () {
        Route::get('/overview-profile', 'show_overview')->name('overview');
        Route::get('/riwayat-peminjaman', 'show_history')->name('history');
        Route::get('/ganti-password', 'show_ch_password')->name('ch_password');
    });


    Route::controller(ChatController::class)->group(function () {
        Route::get('/chat', 'show_chat_index')->name('chat_index');
        Route::get('/chat/{id}', 'show_chat')->name('chat');
    });


    Route::controller(PaymentFineController::class)->group(function () {
        Route::get('/pembayaran-denda/{id}', 'show_payment')->name('payment');
    });


    Route::controller(VisitController::class)->group(function () {
        Route::get('/kunjungan', 'show_visit')->name('visit');
        Route::post('/kunjungan', 'add_visit')->name('add_visit');
        Route::delete('/kunjungan/{id}', 'delete_visit')->name('delete_visit');
    });


    Route::controller(CalendarController::class)->group(function () {
        Route::get('/kalender-perpustakaan', 'show_calendar')->name('calendar');
    });


    Route::controller(LogicPeminjamProfileController::class)->group(function () {
        Route::post('/overview-profile', 'upload_profile_image');
        Route::post('/ganti-password', 'update_password')->name('update_password');

        Route::put('/update-profile', 'update_profile_peminjam')->name('update_profile');
    });


    Route::controller(LogicBookController::class)->group(function () {
        Route::post('/sukai-buku/{id}', 'update_like')->name('update_like');
        Route::post('/baca-e-book/{id}', 'update_e_book')->name('update_e_book');
        Route::delete('/hapus-e-book/{id}', 'delete_e_book')->name('delete_e_book');
    });
});




/*
|--------------------------------------------------------------------------
| Route Middleware Admin & Pustakawan
|--------------------------------------------------------------------------
| Route ini mencakup halaman yang boleh diakses oleh user dengan role Admin dan Pustakawan
|
*/

Route::middleware(['auth', 'role:Admin|Pustakawan'])->group(function () {
    Route::controller(PustakawanDashboardController::class)->group(function () {
        Route::get('/dashboard-control', 'show_dashboard')->name('dashboard.ctrl');
    });

    Route::controller(ChatMasukController::class)->group(function () {
        Route::get('/chat-masuk', 'show_chat')->name('chat_masuk');
    });

    Route::controller(PustakawanProfileController::class)->group(function () {
        Route::get('/overview-data-profile', 'show_overview_profile')->name('profile.overview');
    });

    Route::prefix('master-data')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/admin', 'show_data_admin')->name('data-admin');
            Route::get('/pustakawan', 'show_data_pustakawan')->name('data-pustakawan');
            Route::get('/peminjam', 'show_data_peminjam')->name('data-peminjam');

            Route::prefix('admin')->group(function () {
                Route::get('/import', 'show_import_admin')->name('import_admin');
                Route::get('/tambah', 'show_manip_admin')->name('add_admin');
                Route::get('/perbarui/{id}', 'show_manip_admin')->name('edit_admin');
                Route::get('/detail/{id}', 'show_detail_admin')->name('detail_admin');
                
                Route::controller(LogicUserController::class)->group(function(){
                    Route::post('/tambah', 'store_admin')->name('store_admin');
                    Route::put('/perbarui/{id}', 'update_user')->name('update_user');
                    Route::delete('/hapus/{id}', 'delete_user')->name('delete_user');
                    Route::post('/import-admin', 'import_admin')->name('direct_import');
                });
            });

            Route::prefix('pustakawan')->group(function () {
                Route::get('/tambah', 'show_manip_pustakawan')->name('add_pustakawan');
                Route::get('/perbarui/{id}', 'show_manip_pustakawan')->name('edit_pustakawan');
                Route::get('/detail/{id}', 'show_detail_pustakawan')->name('detail_pustakawan');

                Route::put('/perbarui/{id}', 'update_pustakawan')->name('update_pustakawan');
                Route::delete('/hapus/{id}', 'delete_pustakawan')->name('delete_pustakawan');
            });

            Route::prefix('peminjam')->group(function () {
                Route::get('/tambah', 'show_manip_peminjam')->name('add_peminjam');
                Route::get('/perbarui/{id}', 'show_manip_peminjam')->name('edit_peminjam');
                Route::get('/detail/{id}', 'show_detail_peminjam')->name('detail_peminjam');

                Route::put('/perbarui/{id}', 'update_peminjam')->name('update_peminjam');
                Route::delete('/hapus/{id}', 'delete_peminjam')->name('delete_peminjam');
            });
        });

        Route::controller(BukuController::class)->group(function () {
            Route::get('/rak-buku', 'show_data_rak_buku')->name('data-rak');
            Route::get('/kategori', 'show_data_kategori')->name('data-kategori');
            Route::get('/buku', 'show_data_buku')->name('data-buku');
            Route::get('/e-book', 'show_data_ebook')->name('data-ebook');
        });

        Route::controller(PeminjamanController::class)->group(function () {
            Route::get('/perpinjaman', 'show_data_peminjam')->name('data-perpinjaman');
            Route::get('/pengembalian', 'show_data_pengembali')->name('data-pengembali');
            Route::get('/kunjungan', 'show_data_kunjungan')->name('data-kunjungan');
            Route::get('/denda', 'show_data_denda')->name('data-denda');
        });

        Route::controller(PerpustakaanController::class)->group(function () {
            Route::get('/aplikasi', 'show_data_aplikasi')->name('data-aplikasi');
            Route::get('/perpustakaan', 'show_data_perpus')->name('data-perpustakaan');
        });
    });

    Route::prefix('informasi')->group(function () {
        Route::controller(InformationController::class)->group(function () {
            Route::get('/buat-notifikasi', 'show_create_notif')->name('buat_notifikasi');
            Route::get('/kirim-email', 'show_send_email')->name('kirim_email');
            Route::get('/buat-artikel', 'show_create_article')->name('buat_artikel');
            Route::get('/atur-kalender', 'show_set_calendar')->name('atur_kalender');
        });
    });

    Route::controller(PDFController::class)->group(function(){
        Route::post('/print_admin', 'print_data_admin')->name('print_pdf_admin');
    });

    Route::controller(ExcelController::class)->group(function(){
        Route::post('/export_admin', 'export_admin')->name('export_admin');
    });
});
