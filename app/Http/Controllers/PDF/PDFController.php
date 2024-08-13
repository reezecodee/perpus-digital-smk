<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function print_data_admin(Request $request, PDF $pdf)
    {
        $admin = User::role('Admin');
        $except = [
            'id',
            'email_verified_at',
            'password',
            'remember_token',
            'created_at',
            'updated_at'
        ];

        if ($request->filter) {
            $admin = $admin->where('status', $request->filter)->get();
        } else {
            $admin = $admin->get();
        }

        $admin->makeHidden($except);

        $pdf_instance = $pdf->loadView('print_views.pdf.admpust', compact('admin'));

        $pdf_instance->setPaper('A4', 'potrait');

        return $pdf_instance->download('daftar_admin.pdf');
    }
}
