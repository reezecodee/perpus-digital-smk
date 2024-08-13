<?php

namespace App\Http\Controllers\Excel;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function export_admin(Request $request) 
    {
        return Excel::download(new UsersExport($request->filter, 'Admin'), 'admin.xlsx');
    }
}
