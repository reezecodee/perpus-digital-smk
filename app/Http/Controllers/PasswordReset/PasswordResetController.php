<?php

namespace App\Http\Controllers\PasswordReset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    /**
     * Dua function pertama mengatur munculnya tampilan dari halaman blade.
     *
     */

    public function showForgotPasswordPage()
    {
        $title = 'Lupa Password';

        return view('auth-pages.forget-password', compact('title'));
    }


    public function showResetPasswordPage(Request $request, $token)
    {
        $title = 'Konfirmasi perubahan password';
        $token = $token;
        $email = $request->query('email');

        return view('auth-pages.reset-password', compact('title', 'token', 'email'));
    }
}
