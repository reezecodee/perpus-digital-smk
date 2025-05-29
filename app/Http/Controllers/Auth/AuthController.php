<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Function ini digunakan untuk menampilkan halaman login.
     *
     */

    public function showLoginPage()
    {
        $title = 'Login ke E-Perpustakaan';

        return view('auth-pages.login', compact('title'));
    }


    /**
     * Function ini digunakan untuk menampilkan halaman verifikasi email.
     *
     */

    public function showVerifyNoticePage()
    {
        $title = 'Verifikasi email Anda';

        return view('auth-pages.verify-email', compact('title'));
    }


    /**
     * Function ini digunakan untuk menampilkan halaman peringatan akun belum aktif .
     *
     */

    public function showNotActivatedPage()
    {
        $title = 'Status akun kamu nonaktif';

        return view('auth-pages.not-activated', compact('title'));
    }
}
