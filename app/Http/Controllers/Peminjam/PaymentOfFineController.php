<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use App\Models\Borrower;
use Illuminate\Http\Request;

class PaymentOfFineController extends Controller
{
    public function show_payment($id) 
    {
        return view('peminjam_views.pembayaran_denda', [
            'title' => 'Pembayaran Denda',
            'data' => Borrower::find($id),
        ]);
    }
}
