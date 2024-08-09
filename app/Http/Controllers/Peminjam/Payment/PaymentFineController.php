<?php

namespace App\Http\Controllers\Peminjam\Payment;

use App\Http\Controllers\Controller;
use App\Models\Borrower;
use Illuminate\Http\Request;

class PaymentFineController extends Controller
{
    public function show_payment($id) 
    {
        return view('peminjam_views.pembayaran.pembayaran_denda', [
            'title' => 'Pembayaran Denda',
            'data' => Borrower::find($id),
        ]);
    }
}
