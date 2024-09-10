<?php

namespace App\Http\Controllers\Borrower\DetailRent;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorHTML;

class DetailRentController extends Controller
{
     /**
     * Function ini digunakan untuk menampilkan halaman detail peminjaman user.
     * 
     */
    
    public function showDetailRentPage($id)
    {
        $loan = Loan::find($id);

        if (!$loan || $loan->status == 'E-book') {
            abort(404);
        }

        $title = 'Detail Peminjaman';
        $data = $loan;

        return view('borrower-pages.book.loan-detail', compact('title', 'data'));
    }
}
