<?php

namespace App\Http\Controllers\Officer\Setting;

use App\Http\Controllers\Controller;
use App\Models\Application;

class SettingController extends Controller
{
    public function showSetting()
    {
        $title = "Pengaturan Aplikasi";
        $name = 'Overview';
        $pageTitle = "Pengaturan Aplikasi";
        $setting = Application::latest()->first() ?? new Application();

        return view('officer-pages.setting.index', compact('title', 'name', 'pageTitle', 'setting'));
    }
}
