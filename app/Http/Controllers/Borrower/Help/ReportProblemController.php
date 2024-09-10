<?php

namespace App\Http\Controllers\Borrower\Help;

use App\Http\Controllers\Controller;
use App\Http\Requests\Help\HelpRequest;
use App\Models\Help;
use Illuminate\Http\Request;

class ReportProblemController extends Controller
{
    /**
     * Satu function untuk mengatur munculnya tampilan dari halaman blade.
     * 
     */

    public function reportProblemPage()
    {
        $title = 'Laporkan Masalah';

        return view('borrower-pages.help.help-form', compact('title'));
    }
}
