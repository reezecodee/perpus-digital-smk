<?php

namespace App\Http\Controllers\Borrower\Calendar;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HandlerScheduleController extends Controller
{
    /**
     * Function events digunakan untuk mengambil data tanggal melalui format JSON.
     * 
     */

    public function events()
    {
        $events = $this->getLibrarySchedules();
        $userLoans = $this->getReturnBookSchedules();

        if (!$userLoans->isEmpty()) {
            $events = array_merge($events, $this->formatLoanEvents($userLoans));
        }

        return response()->json($events);
    }


    /**
     * Mengambil jadwal dari perpustakaan.
     */

    private function getLibrarySchedules()
    {
        return Calendar::select('tanggal_mulai', 'tanggal_selesai', 'keterangan', 'warna')
            ->get()
            ->map(function ($item) {
                return [
                    'start' => $item->tanggal_mulai,
                    'end' => $item->tanggal_selesai,
                    'title' => $item->keterangan,
                    'type' => $item->warna
                ];
            })
            ->toArray();
    }


    /**
     * Mengambil jadwal peminjaman buku pengguna.
     */

    private function getReturnBookSchedules()
    {
        return Loan::with('book')
            ->select('jatuh_tempo', 'buku_id')
            ->where('peminjam_id', $this->user->id)
            ->where('status', '!=', 'E-book')
            ->get();
    }


    /**
     * Memformat data jadwal pengembalian buku pengguna.
     * @param $schedules -> berisi semua jadwal 
     */

    private function formatLoanEvents($schedules)
    {
        return $schedules->map(function ($item) {
            $bookTitle = $item->book ? $item->book->judul : 'tidak diketahui';

            return [
                'start' => $item->jatuh_tempo,
                'end' => $this->calculateReturnDeadline($item->jatuh_tempo),
                'title' => "Pengembalian buku, $bookTitle",
                'type' => 'Kuning'
            ];
        })->toArray();
    }


    /**
     * Menghitung tanggal jatuh tempo pengembalian buku dengan menambahkan 3 hari.
     * @param $endDate -> berisi data jatuh tempo dari peminjaman
     */

    private function calculateReturnDeadline($endDate)
    {
        return Carbon::createFromFormat('Y-m-d', $endDate)
            ->addDays(3)
            ->format('Y-m-d');
    }
}
