<?php

namespace App\Http\Controllers\Officer\Information;

use App\Http\Controllers\Controller;

class ManageSendEmailController extends Controller
{
    public function showSendEmail()
    {
        $title = 'Kirim Email';
        $name = 'Overview';
        $pageTitle = 'Kirim Email';

        return view('officer-pages.information-management.email.index', compact('title', 'name', 'pageTitle'));
    }
}
