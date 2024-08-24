<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetController extends Controller
{
    public function show_forgot_password()
    {
        return view('auth.forget-password', [
            'title' => 'Lupa Password'
        ]);
    }

    public function send_reset_link_email(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    public function show_reset_password(Request $request, $token)
    {
        return view('auth.reset-password', [
            'title' => 'Konfirmasi perubahan password',
            'token' => $token,
            'email' => $request->query('email')
        ]);
    }

    public function reset_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required'
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
                    ? redirect()->route('show_login')->with('status', __($status))
                    : back()->withErrors(['email' => __($status)]);
    }
}
