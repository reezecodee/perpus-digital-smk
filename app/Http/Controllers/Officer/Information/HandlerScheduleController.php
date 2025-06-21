<?php

namespace App\Http\Controllers\Officer\Information;

use App\Http\Controllers\Controller;
use App\Http\Requests\Information\OfficerCalendarRequest;
use App\Models\Calendar;
use App\Repositories\Logger\ActivityLogger;

class HandlerScheduleController extends Controller
{
    protected $activityLogger;

    public function __construct(ActivityLogger $activityLogger)
    {
        $this->activityLogger = $activityLogger;
    }

    public function storeSchedule(OfficerCalendarRequest $request)
    {
        $validatedData = $request->validated();

        $message = 'Menambahkan jadwal baru di kalender perpustakaan';
        $this->activityLogger->saveLog($message);
        
        Calendar::create($validatedData);
        return back()->withSuccess('Berhasil menambahkan jadwal baru pada kalender');
    }

    public function destroySchedule($id)
    {
        $schedule = Calendar::findOrFail($id);
        $schedule->delete();

        $message = 'Menghapus jadwal di kalender perpustakaan';
        $this->activityLogger->saveLog($message);
        
        return back()->withSuccess('Berhasil menghapus jadwal');
    }
}
