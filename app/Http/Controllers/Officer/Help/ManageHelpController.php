<?php

namespace App\Http\Controllers\Officer\Help;

use App\Http\Controllers\Controller;
use App\Models\Help;
use Barryvdh\DomPDF\PDF;

class ManageHelpController extends Controller
{
    public function showHelp()
    {
        $title = 'Manajemen Bantuan';
        $name = 'Overview';
        $pageTitle = 'Manajemen Bantuan';
        $type = '';

        return view('officer-pages.help-management.index', compact('title', 'name', 'pageTitle', 'type'));
    }

    public function showHelpDetail($id)
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

    public function printHelpReport(PDF $pdf, $id)
    {
        $data = Help::findOrFail($id);
        $pdf_instance = $pdf->loadView('librarian-pages.generate.pdf_laporan.help-report', compact('data'));
        $pdf_instance->setPaper('A4', 'potrait');

        return $pdf_instance->download("Laporan {$data->user->nama}.pdf");
    }
}
