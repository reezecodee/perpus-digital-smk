<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function print_data_users(Request $request, PDF $pdf, $role)
    {
        $role = ucfirst($role);
        $users = User::role($role);
        $except = [
            'id',
            'email_verified_at',
            'password',
            'remember_token',
            'created_at',
            'updated_at'
        ];

        if ($request->filter) {
            $users = $users->where('status', $request->filter)->get();
        } else {
            $users = $users->get();
        }

        $users->makeHidden($except);

        $pdf_instance = $pdf->loadView('pustakawan_views.generate.pdf_list.users', compact('users', 'role'));

        $pdf_instance->setPaper('A4', 'potrait');

        return $pdf_instance->download("Daftar $role.pdf");
    }
}
