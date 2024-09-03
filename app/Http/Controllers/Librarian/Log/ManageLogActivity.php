<?php

namespace App\Http\Controllers\Librarian\Log;

use App\Http\Controllers\Controller;
use App\Models\LogActivity;
use Illuminate\Http\Request;

class ManageLogActivity extends Controller
{
    public function show_log() 
    {
        return view('librarian-pages.log.log-activity', [
            'title' => 'Log Aktivitas',
            'heading' => 'Log Aktivitas',
            'logs' => LogActivity::with('user')->latest()->limit(20)->get()
        ]);
    }
}
