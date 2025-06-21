<?php

namespace App\Http\Controllers\Student\Help;

use App\Http\Controllers\Controller;

class ReportProblemController extends Controller
{
    public function reportProblemPage()
    {
        $title = 'Laporkan Masalah';

        return view('student-pages.help.help-form', compact('title'));
    }
}
