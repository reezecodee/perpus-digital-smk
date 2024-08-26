<?php

namespace App\Exports;

use App\Models\Help;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HelpsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $helps = Help::with('user')->get();

        $mapped = $helps->map(function ($help) {
            return [
                'nama_pelapor' => $help->user->nama,
                'email_pelapor' => $help->user->email,
                'kategori' => $help->kategori,
                'subject' => $help->subject,
                'laporan' => $help->laporan,
                'tanggal_lapor' => $help->created_at,
            ];
        });

        return $mapped;
    }

    public function headings(): array
    {
        return [
            'Nama pelapor',
            'Email pelapor',
            'Kategori laporan',
            'Subjek',
            'Laporan',
            'Tanggal lapor',
        ];
    }
}
