<?php

namespace App\Http\Controllers\Librarian\Information;

use App\Http\Controllers\Controller;
use App\Mail\NotificationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ManageSendEmail extends Controller
{
    public function show_send_email()
    {
        // return view('librarian-pages.information.send-email', [
        //     'title' => 'Kirim Email',
        //     'heading' => 'Kirim Email',
        //     'receivers' => User::role('Peminjam')->where('status', 'Aktif')->latest()->get(),
        // ]);

        $title = 'Kirim Email';
        $name = 'Overview';
        $pageTitle = 'Kirim Email';

        return view('test_views.information-management.email.index', compact('title', 'name', 'pageTitle'));
    }

    public function send_email(Request $request)
    {
        $receiver = User::findOrFail($request->penerima_id);

        Mail::to($receiver->email)->send(new NotificationMail($request, $request->subject));
        $this->log("Mengirimkan email kepada {$receiver->nama} - {$receiver->email}");
        return back()->withSuccess('Berhasil mengirimkan email kepada ' . $receiver->nama);
    }
}
