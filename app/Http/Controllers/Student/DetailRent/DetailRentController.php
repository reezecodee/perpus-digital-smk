<?php

namespace App\Http\Controllers\Student\DetailRent;

use App\Http\Controllers\Controller;
use App\Models\Loan;

class DetailRentController extends Controller
{
    public function showDetailRentPage($id)
    {
        $loan = Loan::find($id);

        if (!$loan || $loan->status == 'E-book') {
            abort(404);
        }

        $title = 'Detail Peminjaman';
        $data = $loan;

        return view('student-pages.book.loan-detail', compact('title', 'data'));
    }
}
