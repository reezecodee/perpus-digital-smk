<?php

namespace App\Http\Controllers\Peminjam\Calendar;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Schedule extends Controller
{
    public function show_calendar()
    {
        return view('peminjam_views.kalender.kalender', [
            'title' => 'Kalender Perpustakaan',
        ]);
    }

    public function events()
    {
        $events = [];

        $schedules_libraries = Calendar::select('tanggal_mulai', 'tanggal_selesai', 'keterangan', 'warna')->get();

        foreach ($schedules_libraries as $item) {
            $events[] = [
                'start' => $item->tanggal_mulai,
                'end' => $item->tanggal_selesai,
                'title' => $item->keterangan,
                'type' => $item->warna
            ];
        }

        $schedules_return = Loan::with('book')->select('jatuh_tempo', 'buku_id')
            ->where('peminjam_id', auth()->user()->id)
            ->where('status', '!=', 'E-book')
            ->get();
        
        if(!$schedules_return){
            return response()->json($events);
        }

        $closed_return = function ($end) {
            $initial_date = Carbon::createFromFormat('Y-m-d', $end);
            $new_date = $initial_date->addDays(3);
            return $new_date->format('Y-m-d');
        };

        foreach ($schedules_return as $item) {
            $book_title = $item->book ? $item->book->judul : 'tidak diketahui';

            $events[] = [
                'start' => $item->jatuh_tempo,
                'end' => $closed_return($item->jatuh_tempo),
                'title' => "Pengembalian buku, $book_title",
                'type' => 'Kuning'
            ];
        }

        return response()->json($events);
    }
}
