<?php

namespace App\Http\Controllers\Pustakawan\Log;

use App\Http\Controllers\Controller;
use App\Models\LogActivity;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ManageLogActivity extends Controller
{
    public function show_log() 
    {
        Carbon::setLocale('id');
        return view('pustakawan_views.log.log-aktivitas', [
            'title' => 'Log Aktivitas',
            'heading' => 'Log Aktivitas',
            'logs' => LogActivity::with('user')->latest()->limit(20)->get()
        ]);
    }
}
