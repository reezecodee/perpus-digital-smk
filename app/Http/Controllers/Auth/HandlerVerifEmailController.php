<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Logger\ActivityLogger;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandlerVerifEmailController extends Controller
{
    protected $activityLogger;

    public function __construct(ActivityLogger $activityLogger)
    {
        $this->activityLogger = $activityLogger;
    }

    public function resendVerification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'Link verifikasi baru telah dikirim ke email Anda.');
    }

    public function verifyUserEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $logMessage = 'Berhasil memverifikasi akunnya';
        $successMessage = 'Selamat akun kamu berhasil di verifikasi';

        $this->activityLogger->saveLog($logMessage);

        switch (true) {
            case $user->hasRole('Siswa'):
                return redirect()->intended(route('show.homepage'))->with('success', $successMessage);

            case $user->hasRole('Admin'):
            case $user->hasRole('Pustakawan'):
                return redirect()->route('show.dashboard')->with('success', $successMessage);

            default:
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->with('error', 'Mohon maaf, role user tidak terdaftar di sistem kami')->withInput();
        }
    }
}
