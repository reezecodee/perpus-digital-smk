<?php

namespace App\Http\Controllers\Pustakawan\Information;

use App\Http\Controllers\Controller;
use App\Http\Requests\Information\CalendarRequest;
use App\Models\Calendar;
use Illuminate\Http\Request;

class ManageSchedule extends Controller
{
    public function show_set_calendar()
    {
        return view('pustakawan_views.informasi.atur-kalender', [
            'title' => 'Atur Kalender',
            'heading' => 'Atur Kalender',
            'schedules' => Calendar::all()
        ]);
    }

    public function add_schedule(CalendarRequest $request)
    {
        $validated_data = $request->validated();
        Calendar::create($validated_data);
        return back()->withSuccess('Berhasil menambahkan jadwal baru pada kalender');
    }
}
