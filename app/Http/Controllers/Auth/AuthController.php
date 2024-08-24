<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show_login()
    {
        return view('auth.login', [
            'title' => 'Login ke E-Perpustakaan'
        ]);
    }

    public function show_register()
    {
        return view('auth.register', [
            'title' => 'Register ke E-Perpustakaan'
        ]);
    }

    public function show_forget_password()
    {
        return view('auth.forget-password', [
            'title' => 'Lupa Password'
        ]);
    }

    public function show_reset_password()
    {
        return view('auth.reset-password', [
            'title' => 'Konfirmasi perubahan password'
        ]);
    }

    public function show_verify_email()
    {
        return view('auth.verify-email', [
            'title' => 'Verifikasi email'
        ]);
    }

    public function show_email_confirmed()
    {
        return view('auth.email-confirmed', [
            'title' => 'Email berhasil di verifikasi'
        ]);
    }

    public function show_not_activated()
    {
        return view('auth.not-activated', [
            'title' => 'Status akun kamu nonaktif'
        ]);
    }

    public function logic_login(LoginRequest $request)
    {
        $validatedData = $request->validated();

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->hasRole('Peminjam')) {
                return redirect('/dashboard');
            } else if ($user->hasRole('Admin') || $user->hasRole('Pustakawan')) {
                return redirect('/dashboard-control');
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->with(['error', 'Mohon maaf role user tidak terdaftar di sistem kami'])->withInput();
            }
        }

        return back()->with('error', 'Email atau password yang Anda masukkan salah')->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
