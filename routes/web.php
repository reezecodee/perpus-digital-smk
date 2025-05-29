<?php

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
        'title' => 'Selamat datang di E-perpustakaan',
    ]);
});

Route::get('/test', function () {
    return view('test_views/profile/index', [
        'title' => 'Test only',
        'name' => 'Test',
        'pageTitle' => 'Dashboard',
        'type' => '',
        'btnName' => 'Tambah Admin'
    ]);
});

require __DIR__ . '/site.php';
require __DIR__ . '/auth.php';
require __DIR__ . '/borrower.php';
require __DIR__ . '/librarian.php';
require __DIR__ . '/datatables.php';