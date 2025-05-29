<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandlerAuthController extends Controller
{
    /**
     * Function ini digunakan untuk menangani request login.
     *
     */

    public function authLoginHandler(LoginRequest $request)
    {
        $validatedData = $request->validated();
        $credentials = $this->getCredentials($validatedData);
        $remember = $request->boolean('remember');

        // jika user salah dalam menginputkan maka redirect kembali dan berikan message error
        if (!Auth::attempt($credentials, $remember)) {
            return back()->with('error', 'Email atau password yang Anda masukkan salah')->withInput();
        }

        $request->session()->regenerate();
        $user = Auth::user();

        // jika user belum verifikasi email maka redirect ke halaman verifikasi
        if (!$user->hasVerifiedEmail()) {
            $user->sendEmailVerificationNotification();
            return redirect()->route('verification.notice');
        }

        // kembalikan hasil proses dari function handleUserRoleRedirect
        return $this->handleUserRoleRedirect($user, $request);
    }


    /**
     * Buat kredensial email dan password.
     */

    private function getCredentials(array $validatedData): array
    {
        return [
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ];
    }


    /**
     * Redirect user berdasarkan rolenya.
     */

    private function handleUserRoleRedirect($user, $request)
    {
        if ($user->hasRole('Peminjam')) {
            $this->log('Berhasil login ke aplikasi dan redirect ke dashboard peminjam');
            return redirect()->route('show.homepage');
        }

        if (in_array($user->getRoleNames()->first(), ['Admin', 'Pustakawan'])) {
            $this->log('Berhasil login ke aplikasi dan redirect ke dashboard');
            return redirect()->route('show.dashboard');
        }

        // kembalikan hasil dari function handleInvalidRole
        return $this->handleInvalidRole($request);
    }


    /**
     * Logout user jika role user tidak terdaftar.
     */

    private function handleInvalidRole($request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return back()->with('error', 'Mohon maaf role user tidak terdaftar di sistem kami')->withInput();
    }


    /**
     * Function ini digunakan untuk meminta ulang email verifikasi.
     *
     */

    public function resendVerification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'Link verifikasi baru telah dikirim ke email Anda.');
    }


    /**
     * Function digunakan untuk melakukan redirect verifikasi email yang berhasil.
     *
     */

    public function verifyUserEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();
        $user = auth()->user();

        $logMessage = 'Berhasil memverifikasi akunnya';
        $successMessage = 'Selamat akun kamu berhasil di verifikasi';

        // logging verifikasi akun
        $this->log($logMessage);

        if ($user->hasRole('Peminjam')) {
            return redirect()->intended(route('show.homepage'))->with([
                'success' => $successMessage,
            ]);
        } elseif ($user->hasRole('Admin') || $user->hasRole('Pustakawan')) {
            return redirect()->route('show.dashboard')->with('success', $successMessage);
        }

        // logout user yang tidak terdaftar
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return back()->with('error', 'Mohon maaf, role user tidak terdaftar di sistem kami')->withInput();
    }


    /**
     * Function ini digunakan untuk memproses logout.
     *
     */

    public function logout(Request $request)
    {
        // logging user ketika logout
        if (auth()->check()) {
            $this->log('Logout dari aplikasi perpustakaan');
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
