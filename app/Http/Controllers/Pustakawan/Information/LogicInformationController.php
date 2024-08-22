<?php

namespace App\Http\Controllers\Pustakawan\Information;

use App\Http\Controllers\Controller;
use App\Http\Requests\Information\ArticleRequest;
use App\Http\Requests\Information\CalendarRequest;
use App\Http\Requests\Information\NotificationRequest;
use App\Mail\NotificationMail;
use App\Models\Article;
use App\Models\Articles;
use App\Models\Calendar;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LogicInformationController extends Controller
{
    public function send_notification(NotificationRequest $request)
    {
        $validation_data = $request->validated();
        $validation_data['pengirim_id'] = auth()->user()->id;
        $validation_data['tgl_pengiriman'] = date('Y-m-d');

        Notification::create($validation_data);
        return back()->withSuccess('Berhasil mengirimkan notifikasi');
    }

    public function send_email(Request $request)
    {
        $receiver = User::findOrFail($request->penerima_id);

        Mail::to($receiver->email)->send(new NotificationMail($request, $request->subject));
        return back()->withSuccess('Berhasil mengirimkan email kepada ' . $receiver->nama);
    }

    public function post_article(ArticleRequest $request)
    {
        $validated_data = $request->validated();
        $user = auth()->user();
        $validated_data['author_id'] = $user->id;
        $validated_data['penulis'] = $user->nama;

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('img/thumbnail', $fileName, 'public');
            $validated_data['thumbnail'] = $fileName;
        }

        Article::create($validated_data);
        return back()->withSuccess('Berhasil membuat artikel baru');
    }

    public function add_schedule(CalendarRequest $request) {
        $validated_data = $request->validated();
        Calendar::create($validated_data);
        return back()->withSuccess('Berhasil menambahkan jadwal baru pada kalender');
    }
}
