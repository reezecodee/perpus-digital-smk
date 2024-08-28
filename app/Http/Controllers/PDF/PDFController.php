<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use App\Models\Help;
use App\Models\LogActivity;
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
        $lcfirst = lcfirst($role);

        $this->log("Mencetak list users {$lcfirst} kedalam PDF");
        return $pdf_instance->download("Daftar $role.pdf");
    }

    public function print_data_helps(PDF $pdf)
    {
        $helps = Help::with('user')->get();
        $except = [
            'id',
            'created_at',
            'updated_at'
        ];

        $helps->makeHidden($except);

        $pdf_instance = $pdf->loadView('pustakawan_views.generate.pdf_list.helps', compact('helps'));

        $pdf_instance->setPaper('A4', 'potrait');

        $this->log('Mencetak list laporan bantuan kedalam PDF');
        return $pdf_instance->download('Daftar laporan bantuan.pdf');
    }

    public function print_data_logs(PDF $pdf)
    {
        $logs = LogActivity::with('user')->get();
        $except = [
            'id',
            'created_at',
            'updated_at'
        ];

        $logs->makeHidden($except);
        $pdf_instance = $pdf->loadView('pustakawan_views.generate.pdf_list.logs', compact('logs'));
        $pdf_instance->setPaper('A4', 'potrait');

        $this->log('Mencetak list log aktivias kedalam PDF');
        return $pdf_instance->download('Daftar log aktivitas.pdf');
    }
}
