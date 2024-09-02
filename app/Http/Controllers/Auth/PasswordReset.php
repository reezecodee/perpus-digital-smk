<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EmailResetPwRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordReset extends Controller
{
    public function show_forgot_password()
    {
        return view('auth-pages.forget-password', [
            'title' => 'Lupa Password'
        ]);
    }

    public function send_reset_link_email(EmailResetPwRequest $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', 'Email verifikasi berhasil dikirim, silahkan cek email Anda')
            : back()->withErrors(['email' => __($status)]);
    }

    public function show_reset_password(Request $request, $token)
    {
        return view('auth-pages.reset-password', [
            'title' => 'Konfirmasi perubahan password',
            'token' => $token,
            'email' => $request->query('email')
        ]);
    }

    public function reset_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required'
        ],[
            'password.required' => 'Password harus di isi',
            'password.confirmed' => 'Konfirmasi password tidak sama',
            'password.min' => 'Password minimal berisi 8 karakter'
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->save();
            }
        );
    
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('show_login')->with('status', 'Berhasil memperbarui password')
                    : back()->withErrors(['email' => __($status)]);
    }
}
