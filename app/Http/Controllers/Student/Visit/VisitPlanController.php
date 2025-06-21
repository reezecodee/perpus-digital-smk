<?php

namespace App\Http\Controllers\Student\Visit;

use App\Http\Controllers\Controller;
use App\Models\Visit;

class VisitPlanController extends Controller
{
    public function showVisitPage()
    {
        $title = 'Form Kunjungan Perpustakaan';
        $visits = Visit::where('pengunjung_id', auth()->user()->id)->latest()->get();

        return view('student-pages.visit.visit-plan', compact('title', 'visits'));
    }
}
