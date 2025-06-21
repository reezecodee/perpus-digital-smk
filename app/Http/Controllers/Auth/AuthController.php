<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function showLoginPage()
    {
        $title = 'Login ke E-Perpustakaan';

        return view('auth-pages.login', compact('title'));
    }

    public function showVerifyNoticePage()
    {
        $title = 'Verifikasi email Anda';

        return view('auth-pages.verify-email', compact('title'));
    }
    
    public function showNotActivatedPage()
    {
        $title = 'Status akun kamu nonaktif';

        return view('auth-pages.not-activated', compact('title'));
    }
}
