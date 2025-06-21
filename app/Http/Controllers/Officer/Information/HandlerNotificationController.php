<?php

namespace App\Http\Controllers\Officer\Information;

use App\Http\Controllers\Controller;
use App\Http\Requests\Information\OfficerNotificationRequest;
use App\Models\Notification;
use App\Repositories\Logger\ActivityLogger;

class HandlerNotificationController extends Controller
{
    protected $activityLogger;

    public function __construct(ActivityLogger $activityLogger)
    {
        $this->activityLogger = $activityLogger;
    }

    public function storeNotification(OfficerNotificationRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['pengirim_id'] = auth()->user()->id;
        $validatedData['tgl_pengiriman'] = date('Y-m-d');

        $notif = Notification::create($validatedData);

        $message = "Mengirimkan notifikasi kepada {$notif->receiver->nama}";
        $this->activityLogger->saveLog($message);

        return back()->withSuccess('Berhasil mengirimkan notifikasi');
    }

    public function deleteNotification($id)
    {
        $notification = Notification::findOrFail($id);

        $message = "Menghapus notifikasi yang dikirimkan kepada {$notification->receiver->nama}";
        $this->activityLogger->saveLog($message);

        $notification->delete();

        return back()->withSuccess('Berhasil menghapus notifikasi');
    }
}
