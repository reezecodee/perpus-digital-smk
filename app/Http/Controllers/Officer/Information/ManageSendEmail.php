<?php

namespace App\Http\Controllers\Officer\Information;

use App\Http\Controllers\Controller;
use App\Mail\NotificationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ManageSendEmail extends Controller
{
    public function show_send_email()
    {
        $title = 'Kirim Email';
        $name = 'Overview';
        $pageTitle = 'Kirim Email';

        return view('officer-pages.information-management.email.index', compact('title', 'name', 'pageTitle'));
    }

    public function send_email(Request $request)
    {
        $receiver = User::findOrFail($request->penerima_id);

        Mail::to($receiver->email)->send(new NotificationMail($request, $request->subject));
        $this->log("Mengirimkan email kepada {$receiver->nama} - {$receiver->email}");
        return back()->withSuccess('Berhasil mengirimkan email kepada ' . $receiver->nama);
    }
}
