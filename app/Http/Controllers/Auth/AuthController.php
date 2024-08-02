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

    public function logic_login(LoginRequest $request)
    {
        $validatedData = $request->validated();

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->hasRole('Peminjam')) {
                return redirect()->intended('dashboard');
            } else if ($user->hasRole('Admin') || $user->hasRole('Pustakawan')) {
                return redirect()->intended('dashboard-pustakawan');
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('show_login')->with(['error', 'Mohon maaf role user tidak terdaftar di sistem kami']);
            }
        }

        return back()->with('error', 'Email atau password yang Anda masukkan salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
