<?php

namespace App\Services\Auth;

use App\Repositories\Logger\ActivityLogger;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginService
{
    protected $activityLogger;

    public function __construct(ActivityLogger $activityLogger)
    {
        $this->activityLogger = $activityLogger;
    }

    public function handleUserLogin(array $credentials, bool $remember, Request $request)
    {
        if (!Auth::attempt($credentials, $remember)) {
            return back()->with('error', 'Email atau password yang Anda masukkan salah')->withInput();
        }

        $request->session()->regenerate();
        
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$user->hasVerifiedEmail()) {
            $user->sendEmailVerificationNotification();
            return redirect()->route('verification.notice');
        }

        $role = $user->getRoleNames()->first();

        if ($role === 'Siswa') {
            $this->activityLogger->saveLog('Berhasil login ke aplikasi dan redirect ke dashboard siswa');
            return redirect()->route('show.homepage');
        }

        if (in_array($role, ['Admin', 'Pustakawan'])) {
            $this->activityLogger->saveLog('Berhasil login ke aplikasi dan redirect ke dashboard');
            return redirect()->route('show.dashboard');
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return back()->with('error', 'Mohon maaf role user tidak terdaftar di sistem kami')->withInput();
    }
}
