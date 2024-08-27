<?php

namespace App\Http\Controllers\Pustakawan\Information;

use App\Http\Controllers\Controller;
use App\Http\Requests\Information\CalendarRequest;
use App\Models\Calendar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ManageSchedule extends Controller
{
    public function show_set_calendar()
    {
        $currentYear = Carbon::now()->year;
        $events = Calendar::whereYear('tanggal_mulai', $currentYear)
            ->latest()
            ->get();

        return view('pustakawan_views.informasi.atur-kalender', [
            'title' => 'Atur Kalender',
            'heading' => 'Atur Kalender',
            'schedules' => $events
        ]);
    }

    public function add_schedule(CalendarRequest $request)
    {
        $validated_data = $request->validated();
        Calendar::create($validated_data);
        return back()->withSuccess('Berhasil menambahkan jadwal baru pada kalender');
    }

    public function delete_schedule($id)
    {
        $schedule = Calendar::findOrFail($id);
        $schedule->delete();
        return back()->withSuccess('Berhasil menghapus jadwal');
    }
}
