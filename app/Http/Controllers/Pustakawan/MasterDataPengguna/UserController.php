<?php

namespace App\Http\Controllers\Pustakawan\MasterDataPengguna;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show_data_admin()
    {
        return view('pustakawan_views.master_data.pengguna.admin.index', [
            'title' => 'Daftar Data Admin',
            'heading' => 'Daftar Admin',
            'admins' => User::role('Admin')->where('id', '!=', auth()->user()->id)->get()
        ]);
    }

    public function show_data_pustakawan()
    {
        return view('pustakawan_views.master_data.pengguna.pustakawan.index', [
            'title' => 'Daftar Data Pustakawan',
            'heading' => 'Daftar Pustakawan',
            'librarians' => User::role('Pustakawan')->where('id', '!=', auth()->user()->id)->get()
        ]);
    }

    public function show_data_peminjam()
    {
        return view('pustakawan_views.master_data.pengguna.peminjam.index', [
            'title' => 'Daftar Data Peminjam',
            'heading' => 'Daftar Peminjam',
            'borrowers' => User::role('Peminjam')->get()
        ]);
    }

    public function show_manip_admin($id = '')
    {
        $admin = [];

        if ($id) {
            $admin = User::find($id);
            $title = 'Perbarui Data Admin';
            $heading = 'Perbarui Admin';
        } else {
            $title = 'Tambah Admin Baru';
            $heading = 'Tambah Admin';
        }

        return view('pustakawan_views.master_data.pengguna.admin.manip', [
            'title' => $title,
            'heading' => $heading,
            'data' => $admin
        ]);
    }

    public function show_detail_admin($id)
    {
        if (!$id) {
            return back();
        }

        return view('pustakawan_views.master_data.pengguna.admin.detail', [
            'title' => 'Detail Data Admin',
            'heading' => 'Detail Data Admin',
            'data' => User::find($id)
        ]);
    }

    public function show_manip_pustakawan($id = '')
    {
        $pustakawan = [];

        if ($id) {
            $pustakawan = User::find($id);
            $title = 'Perbarui Data Pustakawan';
            $heading = 'Perbarui Pustakawan';
        } else {
            $title = 'Tambah Pustakawan Baru';
            $heading = 'Tambah Pustakawan';
        }

        return view('pustakawan_views.master_data.pengguna.pustakawan.manip', [
            'title' => $title,
            'heading' => $heading,
            'data' => $pustakawan
        ]);
    }
    public function show_detail_pustakawan($id)
    {
        if (!$id) {
            return back();
        }

        return view('pustakawan_views.master_data.pengguna.pustakawan.detail', [
            'title' => 'Detail Data Pustakawan',
            'heading' => 'Detail Data Pustakawan',
            'data' => User::find($id)
        ]);
    }

    public function show_manip_peminjam($id = '')
    {
        $peminjam = [];

        if ($id) {
            $peminjam = User::find($id);
            $title = 'Perbarui Data Peminjam';
            $heading = 'Perbarui Peminjam';
        } else {
            $title = 'Tambah Peminjam Baru';
            $heading = 'Tambah Peminjam';
        }
        return view('pustakawan_views.master_data.pengguna.peminjam.manip', [
            'title' => $title,
            'heading' => $heading,
            'data' => $peminjam
        ]);
    }

    public function show_detail_peminjam($id)
    {
        if (!$id) {
            return back();
        }

        return view('pustakawan_views.master_data.pengguna.peminjam.detail', [
            'title' => 'Detail Data Peminjam',
            'heading' => 'Detail Data Peminjam',
            'data' => User::find($id)
        ]);
    }
    
    public function show_import_admin()
    {
        return view('pustakawan_views.master_data.pengguna.admin.import', [
            'title' => 'Import Data Admin',
            'heading' => 'Import Admin',
        ]);
    }
}
