<?php

namespace App\Http\Controllers\Librarian\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $title = "Pengaturan Aplikasi";
        $name = 'Overview';
        $pageTitle = "Pengaturan Aplikasi";

        return view('test_views.setting.index', compact('title', 'name', 'pageTitle'));
    }
}
