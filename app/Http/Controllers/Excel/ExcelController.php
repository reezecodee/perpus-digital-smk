<?php

namespace App\Http\Controllers\Excel;

use App\Exports\HelpsExport;
use App\Exports\LogsExport;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function export_helps() 
    {
        $this->log('Meng-ekspor data excel dari list bantuan');
        return Excel::download(new HelpsExport, 'daftar_laporan_bantuan.xlsx');
    }

    public function export_users(Request $request, $role) 
    {
        $this->log('Meng-ekspor data excel dari list user role ' . $role);
        return Excel::download(new UsersExport($request->filter, ucfirst($role)), "daftar_{$role}.xlsx");
    }

    public function export_logs() 
    {
        $this->log('Meng-ekspor data excel dari list log aktivitas');
        return Excel::download(new LogsExport, 'daftar_log.xlsx');
    }
}
