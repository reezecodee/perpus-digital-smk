<?php

namespace App\Http\Controllers\Datatable;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FineController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->ajax()) {
            $loans = Loan::query()
                ->select(['id', 'peminjam_id', 'buku_id', 'kode_peminjaman', 'peminjaman', 'status', 'keterangan_denda'])
                ->whereIn('status', ['Terkena denda', 'Sudah dibayar'])
                ->latest();

            return DataTables::of($loans)
                ->addIndexColumn()
                ->addColumn('nama', function ($loan) {
                    return $loan->peminjam->nama;
                })
                ->filterColumn('nama', function ($query, $keyword) {
                    $query->whereHas('peminjam', function ($q) use ($keyword) {
                        $q->where('nama', 'like', "%{$keyword}%");
                    });
                })
                ->addColumn('buku', function ($loan) {
                    return $loan->book->judul;
                })
                ->filterColumn('buku', function ($query, $keyword) {
                    $query->whereHas('book', function ($q) use ($keyword) {
                        $q->where('judul', 'like', "%{$keyword}%");
                    });
                })
                ->make(true);
        }

        return back();
    }
}
