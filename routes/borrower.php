<?php

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
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Route Middleware User With Role "Peminjam"
|--------------------------------------------------------------------------
| Ini merupakan route yang hanya boleh diakses oleh user dengan role peminjam saja,
|
*/

Route::middleware(['auth', 'status_active', 'verified'])->group(function () {
    Route::get('/baca-e-book/{id}', [ReadEbookController::class, 'showReadEbook'])->name('show.readEbook');

    Route::controller(HandlerScheduleController::class)->group(function () {
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


    Route::controller(CategoryController::class)->group(function () {
        Route::get('/semua-kategori', 'showAllCategory')->name('show.allCategories');
    });


    // Shelf


    Route::controller(ShelfController::class)->group(function () {
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

    Route::controller(HandlerProfileBorrowerController::class)->group(function () {
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
