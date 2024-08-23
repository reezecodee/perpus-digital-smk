<?php

namespace App\Http\Controllers\Peminjam\Payment;

use App\Http\Controllers\Controller;
use App\Models\Borrower;
use Illuminate\Http\Request;

class PaymentFineController extends Controller
{
    public function show_payment($id) 
    {
        $data = Borrower::find($id);

        if(!$data || $data->status != 'Terkena denda' || $data->keterangan_denda == 'Tidak ada'){
            abort(404);
        }

        return view('peminjam_views.pembayaran.pembayaran-denda', [
            'title' => 'Pembayaran Denda',
            'data' => $data,
        ]);
    }
}
