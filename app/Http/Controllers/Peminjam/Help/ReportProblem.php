<?php

namespace App\Http\Controllers\Peminjam\Help;

use App\Http\Controllers\Controller;
use App\Http\Requests\Help\HelpRequest;
use App\Models\Help;
use Illuminate\Http\Request;

class ReportProblem extends Controller
{
    public function report_problem()
    {
        return view('peminjam_views.bantuan.index', [
            'title' => 'Laporkan Masalah',
            'chat_bubble' => false
        ]);
    }

    public function send_report(HelpRequest $request)
    {
        $validated_data = $request->validated();
        $user = auth()->user();
        $validated_data['pelapor_id'] = $user->id;
        Help::create($validated_data);
        $this->log("{$user->nama} baru saja mengirimkan laporan permintaan bantuan");
        return back()->withSuccess('Berhasil mengirimkan laporan bantuan');
    }
}
