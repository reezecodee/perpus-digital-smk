<?php

namespace App\Http\Controllers\Datatable;

use App\Http\Controllers\Controller;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LogActivityController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->ajax()) {
            $logs = LogActivity::query()->select(['user_id', 'keterangan', 'created_at'])->with('user')->latest();

            return DataTables::of($logs)
                ->addIndexColumn()
                ->addColumn('nama', function ($log) {
                    return $log->user->nama;
                })
                ->filterColumn('nama', function ($query, $keyword) {
                    $query->whereHas('user', function ($q) use ($keyword) {
                        $q->where('nama', 'like', "%{$keyword}%");
                    });
                })
                ->editColumn('created_at', function ($log) {
                    return $log->created_at->translatedFormat('d F Y H:i:s');
                })
                ->make(true);
        }

        return back();
    }
}
