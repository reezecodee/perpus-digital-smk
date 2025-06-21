<?php

namespace App\Http\Controllers\Officer\Information;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Carbon\Carbon;

class ManageSchedule extends Controller
{
    public function showCalendar()
    {
        $title = 'Kalender Perpustakaan';
        $name = 'Overview';
        $pageTitle = 'Kalender Perpustakaan';
        $type = 'btn-modal';
        $btnName = 'Buat Jadwal';

        return view('officer-pages.information-management.calendar.index', compact('title', 'name', 'pageTitle', 'type', 'btnName'));
    }

    public function getSchedule()
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
