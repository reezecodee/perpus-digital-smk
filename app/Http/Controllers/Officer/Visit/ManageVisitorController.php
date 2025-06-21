<?php

namespace App\Http\Controllers\Officer\Visit;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Visit;

class ManageVisitorController extends Controller
{
    public function showVisit()
    {
        $title = 'Manajemen Kunjungan';
        $name = 'Overview';
        $pageTitle = 'Manajemen Kunjungan';
        $type = 'btn-modal';
        $btnName = 'Tambah Kunjungan';
        $students = User::role('Siswa')->where('status', 'Aktif')->latest()->get();

        return view('officer-pages.loan-management.visit.index', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'students'));
    }

    public function showVisitEdit($id)
    {
        $title = 'Edit Kunjungan';
        $name = 'Edit';
        $pageTitle = 'Edit Kunjungan';
        $type = 'btn-back';
        $btnName = 'Kembali';
        $url = route('data_kunjungan');
        $visit = Visit::findOrFail($id);

        return view('officer-pages.loan-management.visit.edit', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'url', 'visit'));
    }
}
