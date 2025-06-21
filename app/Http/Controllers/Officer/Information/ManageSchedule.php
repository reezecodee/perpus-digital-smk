<?php

namespace App\Http\Controllers\Officer\Information;

use App\Http\Controllers\Controller;
use App\Http\Requests\Information\CalendarRequest;
use App\Models\Calendar;
use Carbon\Carbon;

class ManageSchedule extends Controller
{
    public function show_set_calendar()
    {
        $title = 'Kalender Perpustakaan';
        $name = 'Overview';
        $pageTitle = 'Kalender Perpustakaan';
        $type = 'btn-modal';
        $btnName = 'Buat Jadwal';

        return view('officer-pages.information-management.calendar.index', compact('title', 'name', 'pageTitle', 'type', 'btnName'));
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

    public function get_schedule()
    {
        $currentYear = Carbon::now()->year;
        $events = Calendar::whereYear('tanggal_mulai', $currentYear)
            ->latest()
            ->get()->map(function ($item) {
                return [
                    'start' => $item->tanggal_mulai,
                    'end' => $item->tanggal_selesai,
                    'title' => $item->keterangan,
                    'type' => $item->warna
                ];
            })
            ->toArray();

        return response()->json($events);
    }
}
