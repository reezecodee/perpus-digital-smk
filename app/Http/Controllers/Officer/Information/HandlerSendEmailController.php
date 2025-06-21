<?php

namespace App\Http\Controllers\Officer\Information;

use App\Http\Controllers\Controller;
use App\Mail\NotificationMail;
use App\Models\User;
use App\Repositories\Logger\ActivityLogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HandlerSendEmailController extends Controller
{
    protected $activityLogger;

    public function __construct(ActivityLogger $activityLogger)
    {
        $this->activityLogger = $activityLogger;
    }

    public function sendEmail(Request $request)
    {
        $receiver = User::findOrFail($request->penerima_id);

        Mail::to($receiver->email)->send(new NotificationMail($request, $request->subject));

        $message = "Mengirimkan email kepada {$receiver->nama} - {$receiver->email}";
        $this->activityLogger->saveLog($message);

        return back()->withSuccess('Berhasil mengirimkan email kepada ' . $receiver->nama);
    }
}
