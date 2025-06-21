<?php

namespace App\Http\Controllers\PasswordReset;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EmailResetPwRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class HandlerPasswordResetController extends Controller
{
    public function sendResetLinkEmail(EmailResetPwRequest $request)
    {
        $email = $request->validated()['email'];
        $status = Password::sendResetLink(['email' => $email]);

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', __('Email verifikasi berhasil dikirim, silahkan cek email Anda'));
        }

        return back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword(Request $request)
    {
        $this->validateResetPasswordRequest($request);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->save();
            }
        );

        return $this->handleResetResponse($status);
    }

    private function validateResetPasswordRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required'
        ], [
            'password.required' => 'Password harus diisi',
            'password.confirmed' => 'Konfirmasi password tidak sama',
            'password.min' => 'Password minimal berisi 8 karakter'
        ]);
    }

    private function handleResetResponse($status)
    {
        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('show.login')->with('status', 'Berhasil memperbarui password');
        }

        return back()->withErrors(['email' => __($status)]);
    }
}
