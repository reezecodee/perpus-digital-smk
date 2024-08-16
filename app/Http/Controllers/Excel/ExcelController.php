<?php

namespace App\Http\Controllers\Excel;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function export_users(Request $request) 
    {
        return Excel::download(new UsersExport($request->filter, 'Admin'), 'daftar_admin.xlsx');
    }
}
