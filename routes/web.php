<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\HandlerAuthController;
use App\Http\Controllers\Borrower\AllBooks\AllBooksController;
use App\Http\Controllers\Borrower\BookDetail\BookDetailController;
use App\Http\Controllers\Borrower\BookDetail\HandlerBookDetailController;
use App\Http\Controllers\Borrower\BookLiked\BookLikedListController;
use App\Http\Controllers\Borrower\BookShelf\BookShelfController;
use App\Http\Controllers\Borrower\BookShelf\HandlerBookShelfController;
use App\Http\Controllers\Borrower\Calendar\HandlerScheduleController;
use App\Http\Controllers\Borrower\Calendar\ScheduleController;
use App\Http\Controllers\Borrower\Category\CategoryController;
use App\Http\Controllers\Borrower\DetailRent\DetailRentController;
use App\Http\Controllers\Borrower\Help\HandlerReportProblemController;
use App\Http\Controllers\Borrower\Help\ReportProblemController;
use App\Http\Controllers\Borrower\Homepage\HomepageController;
use App\Http\Controllers\Borrower\LoanConfirmation\HandlerLoanConfirmationController;
use App\Http\Controllers\Borrower\LoanConfirmation\LoanConfirmationController;
use App\Http\Controllers\Borrower\Notification\NotificationListController;
use App\Http\Controllers\Borrower\Payment\FinePaymentController;
use App\Http\Controllers\Borrower\Payment\HandlerFinePaymentController;
use App\Http\Controllers\Borrower\Profile\HandlerProfileBorrowerController;
use App\Http\Controllers\Borrower\Profile\ProfileBorrowerController;
use App\Http\Controllers\Borrower\ReadEbook\ReadEbookController;
use App\Http\Controllers\Borrower\SearchResult\SearchResultController;
use App\Http\Controllers\Borrower\Shelf\ShelfController;
use App\Http\Controllers\Borrower\Visit\HandlerVisitPlanController;
use App\Http\Controllers\Borrower\Visit\VisitPlanController;
use App\Http\Controllers\Excel\ExcelController;
use App\Http\Controllers\Librarian\DashboardController;
use App\Http\Controllers\Librarian\Help\ManageHelp;
use App\Http\Controllers\Librarian\Image\ManageCarousel;
use App\Http\Controllers\Librarian\Image\ManagePopup;
use App\Http\Controllers\Librarian\Information\ManageCreateArticle;
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
use App\Http\Controllers\PasswordReset\HandlerPasswordResetController;
use App\Http\Controllers\PasswordReset\PasswordResetController;
use App\Http\Controllers\PDF\PDFController;
use App\Http\Controllers\Site\SiteController;
use App\Models\FinePayment;
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
    Route::get('/syarat-dan-ketentuan', 'showTermsConditionsPage')->name('show.termsConditions');
    Route::get('/kebijakan-privasi', 'showPrivacyPolicyPage')->name('show.privacyPolicy');
    Route::get('/tentang-kami', 'showAboutUsPage')->name('show.aboutUs');
    Route::get('/kontak-kami', 'showContactUsPage')->name('show.contactUs');
    Route::get('/list-artikel-perpustakaan', 'showArticlePage')->name('show.articles');
    Route::get('/baca-artikel/{id}', 'showReadArticlePage')->name('show.readArticle');
    Route::get('/crop-picture', 'showCropPicturePage')->name('show.cropPicture');
});



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
        Route::get('/register', 'showRegisterPage')->name('show.register');
    });

    Route::get('/email/verify', 'showVerifyNoticePage')->middleware(['auth'])->name('verification.notice');
    Route::get('/not-activated', 'showNotActivatedPage')->name('show.notActivated');
});


Route::controller(HandlerAuthController::class)->group(function () {
    Route::post('/login', 'authLoginHandler')->name('login.process');
    Route::post('/email/verification-notification', 'resendVerification')->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
    Route::get('/email/verify/{id}/{hash}', 'verifyUserEmail')->middleware(['auth', 'signed'])->name('verification.verify');
    Route::get('/logout', 'logout')->name('logout');
});


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



/*
|--------------------------------------------------------------------------
| Route Middleware User With Role "Peminjam"
|--------------------------------------------------------------------------
| Ini merupakan route yang hanya boleh diakses oleh user dengan role peminjam saja,
|
*/

Route::middleware(['auth', 'status_active', 'verified'])->group(function () {
    Route::get('/baca-e-book/{id}', [ReadEbookController::class, 'showReadEbook'])->name('show.readEbook');

    Route::controller(HandlerScheduleController::class)->group(function(){
        Route::get('/events', 'events')->name('event.schedule');
    });
});

Route::middleware(['auth', 'role:Peminjam', 'status_active', 'verified'])->group(function () {
    Route::controller(HomepageController::class)->group(function () {
        Route::get('/homepage', 'showHomepage')->name('show.homepage');
    });


    // Book


    Route::controller(BookDetailController::class)->group(function () {
        Route::get('/buku/{id}', 'showBookDetailPage')->name('show.bookDetail');
    });

    Route::controller(HandlerBookDetailController::class)->group(function () {
        Route::post('/sukai-buku/{id}', 'updateBookLike')->name('update.bookLike');
    });

    Route::controller(BookShelfController::class)->group(function () {
        Route::get('/rak-buku-saya', 'showMyBookShelfPage')->name('show.myBookShelf');
    });

    Route::controller(HandlerBookShelfController::class)->group(function () {
        Route::post('/baca-e-book/{id}', 'updateEbook')->name('update.eBook');
        Route::delete('/hapus-e-book/{id}', 'deleteEbook')->name('delete.eBook');
        Route::post('/kirim-komentar/{id}', 'sendComment')->name('store.comment');
        Route::delete('/hapus-komentar/{id}', 'deleteComment')->name('delete.comment');
    });

    Route::withoutMiddleware(['auth', 'role:Peminjam', 'status_active', 'verified'])->group(function () {
        Route::controller(SearchResultController::class)->group(function () {
            Route::get('/hasil-pencarian', 'showSearchResult')->name('show.searchResult');
        });
    });

    Route::controller(LoanConfirmationController::class)->group(function () {
        Route::middleware('check_pending_loan')->group(function () {
            Route::get('/konfirmasi-peminjaman/{id}', 'showConfirmationPage')->name('show.loanConfirm');
        });
        Route::get('/peminjaman-sukses', 'showSuccessPage')->name('show.success');
    });

    Route::controller(HandlerLoanConfirmationController::class)->group(function () {
        Route::middleware('check_pending_loan')->group(function () {
            Route::post('/buat-peminjaman', 'createLoan')->name('store.loan');
        });
    });

    Route::controller(DetailRentController::class)->group(function () {
        Route::get('/detail-peminjaman/{id}', 'showDetailRentPage')->name('show.detailRent');
    });

    Route::controller(BookLikedListController::class)->group(function () {
        Route::get('/buku-disukai', 'showBookLikedPage')->name('show.bookliked');
    });

    Route::controller(AllBooksController::class)->group(function () {
        Route::get('/semua-buku', 'showAllBooksPage')->name('show.allBooks');
    });



    // Category


    Route::controller(CategoryController::class)->group(function(){
        Route::get('/semua-kategori', 'showAllCategory')->name('show.allCategories');
    });


    // Shelf


    Route::controller(ShelfController::class)->group(function(){
        Route::get('/semua-rak-buku', 'showAllShelves')->name('show.allShelves');
        Route::get('/lihat-rak-buku/{id}', 'showShelf')->name('show.shelf');
    });


    // Schedule


    Route::controller(ScheduleController::class)->group(function () {
        Route::get('/kalender-perpustakaan', 'showCalendarPage')->name('show.calendar');
    });


    // Notification


    Route::controller(NotificationListController::class)->group(function () {
        Route::get('/notifikasi', 'showNotificationPage')->name('show.notification');
        Route::get('/notifikasi/baca/{id}', 'showReadNotificationPage')->name('show.readNotif');
    });


    // Help/Report Problem


    Route::controller(ReportProblemController::class)->group(function () {
        Route::get('/laporkan-masalah', 'reportProblemPage')->name('show.reportProblem');
    });

    Route::controller(HandlerReportProblemController::class)->group(function () {
        Route::post('/kirim-laporan', 'sendReport')->name('store.sendReport');
    });


    // Payment


    Route::controller(FinePaymentController::class)->group(function () {
        Route::get('/pembayaran-denda/{id}', 'showPaymentPage')->name('show.payment');
        Route::get('/riwayat-pembayaran-denda', 'showPaymentHistoriesPage')->name('show.paymentHistories');
        Route::get('/detail-pembayaran-denda/{id}', 'showDetailPaymentPage')->name('show.detailPayment');
        Route::get('/tutorial-pembayaran-denda', 'showTutorialPage')->name('show.paymentTutorial');
    });

    Route::controller(HandlerFinePaymentController::class)->group(function () {
        Route::post('/simpan-pembayaran/{id}', 'finePayment')->name('store.payment');
    });


    // Profile


    Route::controller(ProfileBorrowerController::class)->group(function () {
        Route::get('/overview-profile', 'showOverviewPage')->name('show.overview');
        Route::get('/riwayat-peminjaman', 'showHistoryPage')->name('show.history');
        Route::get('/ganti-password', 'showChangePasswordPage')->name('show.changePassword');
    });

    Route::controller(HandlerProfileBorrowerController::class)->group(function(){
        Route::post('/overview-profile', 'uploadProfileImage')->name('store.profileImage');
        Route::post('/ganti-password', 'updatePassword')->name('update.password');
        Route::put('/update-profile', 'updateProfile')->name('update.profile');
    });


    // Visit


    Route::controller(VisitPlanController::class)->group(function () {
        Route::get('/kunjungan', 'showVisitPage')->name('show.visit');
    });

    Route::controller(HandlerVisitPlanController::class)->group(function () {
        Route::post('/kunjungan', 'addVisit')->name('store.visitPlan');
        Route::delete('/kunjungan/{id}', 'deleteMyVisit')->name('delete.myVisit');
    });
});




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

    Route::controller(ManagePopup::class)->group(function () {
        Route::get('/popup', 'show_popup')->name('popup');
        Route::post('/popup', 'upload_popup')->name('upload_popup');
        Route::delete('/hapus-popup/{id}', 'delete_popup')->name('delete_popup');
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
        Route::get('/overview-data-profile', 'show_overview_profile')->name('profile.overview');
        Route::post('/ganti-pw-pustakawan', 'update_password')->name('update_pw_pustakawan');
    });

    Route::prefix('master-data')->group(function () {

        // Master Data User Route

        Route::controller(UserController::class)->group(function () {
            Route::get('/user/{role}', 'show_data_user')->name('data-user');

            Route::prefix('user')->group(function () {
                Route::get('/{role}/tambah/', 'show_add_user')->name('add_user');
                Route::get('/{role}/edit/{id}', 'show_edit_user')->name('edit_user');
                Route::get('/{role}/detail/{id}', 'show_detail_user')->name('detail_user');

                Route::controller(LogicUserController::class)->group(function () {
                    Route::post('/tambah/{role}', 'store_user')->name('store_user');
                    Route::put('/perbarui/{id}', 'update_user')->name('update_user');
                    Route::delete('/hapus-user/{id}', 'delete_user')->name('delete_user');
                    Route::post('/import-user', 'import_user')->name('direct_import_user');
                });
            });
        });

        // Master Data Buku Route

        Route::controller(ManageBook::class)->group(function () {
            Route::get('/buku/{format}', 'show_data_buku')->name('data-buku');
            Route::prefix('buku')->group(function () {
                Route::get('/{format}/tambah/', 'show_add_book')->name('add_book');
                Route::get('/{format}/edit/{id}', 'show_edit_book')->name('edit_book');
                Route::get('/{format}/detail/{id}', 'show_detail_book')->name('detail_book');
            });

            Route::post('/tambah/{format}', 'store_book')->name('store_book');
            Route::put('/{format}/edit/{id}', 'update_book')->name('update_book');
            Route::delete('/hapus-buku/{id}', 'delete_book')->name('delete_book');
            Route::post('/import-buku', 'import_books')->name('direct_import_books');
        });

        Route::controller(ManageCategory::class)->group(function () {
            Route::get('/kategori', 'show_data_kategori')->name('data-kategori');
            Route::get('/kategori/edit-kategori/{id}', 'show_edit_category')->name('edit_category');
            Route::post('/tambah-kategori', 'add_category')->name('add_category');
            Route::put('/edit-kategori/{id}', 'update_category')->name('update_category');
            Route::delete('/delete-kategori/{id}', 'delete_category')->name('delete_category');
        });

        Route::controller(ManageShelf::class)->group(function () {
            Route::get('/rak-buku', 'show_data_rak_buku')->name('data-rak');
            Route::get('/edit-rak/{id}', 'show_edit_shelf')->name('edit_shelf');
            Route::post('/tambah-rak', 'add_shelf')->name('add_shelf');
            Route::put('/edit-rak/{id}', 'update_shelf')->name('update_shelf');
            Route::delete('/hapus-rak/{id}', 'delete_shelf')->name('delete_shelf');
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
            Route::get('/pengembalian', 'show_data_pengembali')->name('data_pengembali');
        });

        Route::controller(ManageLoanFined::class)->group(function () {
            Route::get('/terkena-denda', 'show_data_terkena_denda')->name('data_terkena_denda');
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

        // Master Data Perpustakaan Route

        Route::controller(ManageAppWeb::class)->group(function () {
            Route::get('/aplikasi', 'show_data_aplikasi')->name('data-aplikasi');
            Route::post('/aplikasi', 'update_data_app')->name('update_app');
        });

        Route::controller(ManageLibrary::class)->group(function () {
            Route::get('/perpustakaan', 'show_data_perpus')->name('data-perpustakaan');
            Route::post('/perpustakaan', 'update_data_perpus')->name('update_perpus');
        });
    });

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

        Route::controller(ManageCreateArticle::class)->group(function () {
            Route::get('/buat-artikel', 'show_create_article')->name('buat_artikel');
            Route::get('/artikel-saya', 'show_my_article')->name('artikel_saya');
            Route::get('/edit-artikel/{id}', 'show_edit_article')->name('edit_article');
            Route::post('/buat-artikel', 'post_article')->name('post_article');
            Route::put('/update-artikel/{id}', 'update_article')->name('update_article');
            Route::delete('/hapus-artikel/{id}', 'delete_article')->name('delete_article');
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
