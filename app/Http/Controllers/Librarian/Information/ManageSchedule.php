<?php

namespace App\Http\Controllers\Librarian\Information;

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

        return view('librarian-pages.information.set-schedule', [
            'title' => 'Atur Kalender',
            'heading' => 'Atur Kalender',
            'schedules' => $events
        ]);
    }

    // Logical Backend Here...

    public function add_schedule(CalendarRequest $request)
    {
        $validated_data = $request->validated();
        $this->log('Menambahkan jadwal baru di kalender perpustakaan');
        Calendar::create($validated_data);
        return back()->withSuccess('Berhasil menambahkan jadwal baru pada kalender');
    }

    public function delete_schedule($id)
    {
        $schedule = Calendar::findOrFail($id);
        $schedule->delete();
        $this->log('Menghapus jadwal di kalender perpustakaan');
        return back()->withSuccess('Berhasil menghapus jadwal');
    }
}
