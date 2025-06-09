<?php

namespace App\Http\Controllers\Datatable;

use App\Http\Controllers\Controller;
use App\Models\FinePayment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FinePaymentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->ajax()) {
            $payments = FinePayment::query()
                ->select(['id', 'peminjam_id', 'peminjaman_id', 'status_bayar', 'created_at'])
                ->with('borrower')
                ->latest();

            return DataTables::of($payments)
                ->addIndexColumn()
                ->addColumn('nama', function ($payment) {
                    return $payment->borrower->nama;
                })
                ->filterColumn('nama', function ($query, $keyword) {
                    $query->whereHas('borrower', function ($q) use ($keyword) {
                        $q->where('nama', 'like', "%{$keyword}%");
                    });
                })
                ->addColumn('created_at', function ($payment) {
                    return $payment->created_at->translatedFormat('d F Y H:i:s');
                })
                ->make(true);
        }

        return back();
    }
}
