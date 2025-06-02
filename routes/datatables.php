<?php

use App\Http\Controllers\Datatable\LogActivityController;
use App\Http\Controllers\Datatable\UserController;
use App\Http\Controllers\Datatable\BookController;
use App\Http\Controllers\Datatable\ShelfController;
use App\Http\Controllers\Datatable\CategoryController;
use App\Http\Controllers\Datatable\LoanController;
use App\Http\Controllers\Datatable\ReturnController;
use App\Http\Controllers\Datatable\VisitController;
use App\Http\Controllers\Datatable\FineController;
use App\Http\Controllers\Datatable\HelpController;
use App\Http\Controllers\Datatable\CalendarController;
use App\Http\Controllers\Datatable\FinePaymentController;
use App\Http\Controllers\Datatable\CarouselController;
use App\Http\Controllers\Datatable\PlacementController;
use Illuminate\Support\Facades\Route;

Route::get('/data/log-activity', LogActivityController::class)->name('datatable.logActivity');
Route::get('/data/user/{role}', UserController::class)->name('datatable.user');
Route::get('/data/book/{format}', BookCOntroller::class)->name('datatable.book');
Route::get('/data/shelf', ShelfController::class)->name('datatable.shelf');
Route::get('/data/category', CategoryController::class)->name('datatable.category');
Route::get('/data/loan', LoanController::class)->name('datatable.loan');
Route::get('/data/return', ReturnController::class)->name('datatable.return');
Route::get('/data/fine', FineController::class)->name('datatable.fine');
Route::get('/data/visit', VisitController::class)->name('datatable.visit');
Route::get('/data/notification', VisitController::class)->name('datatable.notification');
Route::get('/data/help', HelpController::class)->name('datatable.help');
Route::get('/data/calendar', CalendarController::class)->name('datatable.calendar');
Route::get('/data/fine-payment', FinePaymentController::class)->name('datatable.finePayment');
Route::get('/data/carousel', CarouselController::class)->name('datatable.carousel');
Route::get('/data/placement/{id}', PlacementController::class)->name('datatable.placement');
