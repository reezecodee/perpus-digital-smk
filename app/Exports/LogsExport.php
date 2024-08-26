<?php

namespace App\Exports;

use App\Models\LogActivity;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LogsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $logs = LogActivity::with('user')->get();

        $mapped = $logs->map(function ($log) {
            return [
                'nama' => $log->user->nama,
                'peran' => $log->user->getRoleNames()->first(),
                'keterangan' => $log->keterangan,
                'waktu' => $log->created_at,
            ];
        });

        return $mapped;
    }

    public function headings(): array
    {
        return [
            'Nama pengguna',
            'Peran pengguna',
            'Keterangan aktivitas',
            'Waktu',
        ];
    }
}
