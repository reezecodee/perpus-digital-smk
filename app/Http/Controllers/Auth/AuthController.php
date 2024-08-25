<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stringable;

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

    public function show_verify_notice()
    {
        return view('auth.verify-email', [
            'title' => 'Verifikasi email'
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
        $remember = $request->boolean('remember');
        $credentials = [
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ];

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if (!$user->hasVerifiedEmail()) {
                $user->sendEmailVerificationNotification();
                return redirect()->route('verification.notice');
            }

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

    public function resend_verify(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'Link verifikasi baru telah dikirim ke email Anda.');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        $user = auth()->user();

        if ($user->hasRole('Peminjam')) {
            return redirect('/dashboard')->withSuccess('Selamat akun kamu berhasil di verifikasi');
        } else if ($user->hasRole('Admin') || $user->hasRole('Pustakawan')) {
            return redirect('/dashboard-control')->withSuccess('Selamat akun kamu berhasil di verifikasi');
        } else {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return back()->with(['error', 'Mohon maaf role user tidak terdaftar di sistem kami'])->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
