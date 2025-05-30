<?php

namespace App\Http\Controllers\Librarian\Help;

use App\Http\Controllers\Controller;
use App\Models\Help;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class ManageHelp extends Controller
{
    public function show_help()
    {
        // return view('librarian-pages.help-report.index', [
        //     'title' => 'Pusat Bantuan',
        //     'heading' => 'Manajemen Bantuan',
        //     'helps' => Help::with('user')->latest()->limit(100)->get()
        // ]);
        $title = 'Manajemen Bantuan';
        $name = 'Overview';
        $pageTitle = 'Manajemen Bantuan';
        $type = '';

        return view('test_views.help-management.index', compact('title', 'name', 'pageTitle', 'type'));
    }

    public function show_detail_help($id)
    {
        // $help = Help::findOrFail($id);
        // return view('librarian-pages.help-report.detail', [
        //     'title' => 'Detail Laporan Bantuan',
        //     'heading' => 'Detail Laporan',
        //     'data' => $help
        // ]);

        $help = Help::findOrFail($id);
        $title = 'Detail Bantuan';
        $name = 'Detail';
        $pageTitle = 'Detail Bantuan';
        $type = 'btn-back';
        $btnName = 'Kembali';
        $url = route('help');

        return view('test_views.help-management.detail', compact('help', 'title', 'name', 'pageTitle', 'type', 'btnName', 'url'));
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
