<?php

namespace App\Http\Controllers\Officer\Help;

use App\Http\Controllers\Controller;
use App\Models\Help;
use Barryvdh\DomPDF\PDF;

class ManageHelp extends Controller
{
    public function show_help()
    {
        $title = 'Manajemen Bantuan';
        $name = 'Overview';
        $pageTitle = 'Manajemen Bantuan';
        $type = '';

        return view('officer-pages.help-management.index', compact('title', 'name', 'pageTitle', 'type'));
    }

    public function show_detail_help($id)
    {
        $help = Help::findOrFail($id);
        $title = 'Detail Permintaan Bantuan';
        $name = 'Detail';
        $pageTitle = 'Detail Permintaan Bantuan';
        $type = 'btn-back';
        $btnName = 'Kembali';
        $url = route('help');

        return view('officer-pages.help-management.detail', compact('help', 'title', 'name', 'pageTitle', 'type', 'btnName', 'url'));
    }

    // Logical Backend Here...

    public function delete_help($id)
    {
        $help = Help::findOrFail($id);
        $help->delete();

        $this->log("Menghapus laporan bantuan milik {$help->user->nama}");
        return back()->withSuccess('Berhasil menghapus data bantuan');
    }

    public function print_help_report(PDF $pdf, $id)
    {
        $data = Help::findOrFail($id);
        $pdf_instance = $pdf->loadView('librarian-pages.generate.pdf_laporan.help-report', compact('data'));
        $pdf_instance->setPaper('A4', 'potrait');

        return $pdf_instance->download("Laporan {$data->user->nama}.pdf");
    }
}
