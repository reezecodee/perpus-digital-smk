<?php

namespace App\Http\Controllers\Student\Help;

use App\Http\Controllers\Controller;
use App\Http\Requests\Help\HelpRequest;
use App\Models\Help;

class HandlerReportProblemController extends Controller
{
    public function sendReport(HelpRequest $request)
    {
        $validatedData = $request->validated();
        $user = auth()->user();

        $validatedData['pelapor_id'] = $user->id;
        Help::create($validatedData);

        $this->log("{$user->nama} baru saja mengirimkan laporan permintaan bantuan");
        return back()->withSuccess('Berhasil mengirimkan laporan bantuan');
    }
}
