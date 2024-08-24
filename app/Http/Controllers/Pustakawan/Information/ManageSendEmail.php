<?php

namespace App\Http\Controllers\Pustakawan\Information;

use App\Http\Controllers\Controller;
use App\Mail\NotificationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ManageSendEmail extends Controller
{
    public function show_send_email()
    {
        return view('pustakawan_views.informasi.kirim-email', [
            'title' => 'Kirim Email',
            'heading' => 'Kirim Email',
            'receivers' => User::role('Peminjam')->where('status', 'Aktif')->latest()->get(),
        ]);
    }

    public function send_email(Request $request)
    {
        $receiver = User::findOrFail($request->penerima_id);

        Mail::to($receiver->email)->send(new NotificationMail($request, $request->subject));
        return back()->withSuccess('Berhasil mengirimkan email kepada ' . $receiver->nama);
    }
}
