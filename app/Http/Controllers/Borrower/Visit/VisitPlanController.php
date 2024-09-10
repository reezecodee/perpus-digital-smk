<?php

namespace App\Http\Controllers\Borrower\Visit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Visit\AddVisitRequest;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitPlanController extends Controller
{
    /**
     * Function ini digunakan untuk menampilkan halaman rencana kunjungan.
     * 
     */
    
    public function showVisitPage()
    {
        $title = 'Form Kunjungan Perpustakaan';
        $visits = Visit::where('pengunjung_id', auth()->user()->id)->latest()->get();

        return view('borrower-pages.visit.visit-plan', compact('title', 'visits'));
    }
}
