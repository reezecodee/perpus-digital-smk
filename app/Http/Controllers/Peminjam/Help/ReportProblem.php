<?php

namespace App\Http\Controllers\Peminjam\Help;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportProblem extends Controller
{
    public function report_problem() 
    {
        return view('peminjam_views.bantuan.index', [
            'title' => 'Laporkan Masalah',
            'chat_bubble' => false
        ]);
    }
}
