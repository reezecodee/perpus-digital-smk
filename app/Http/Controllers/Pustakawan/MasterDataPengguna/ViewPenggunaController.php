<?php

namespace App\Http\Controllers\Pustakawan\MasterDataPengguna;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ViewPenggunaController extends Controller
{
    public function show_data_admin()
    {
        return view('pustakawan_views.master_data.pengguna.CRUD_admin.index', [
            'title' => 'Daftar Data Admin',
            'heading' => 'Daftar Admin',
            'admins' => User::role('Admin')->get()
        ]);
    }

    public function show_data_pustakawan()
    {
        return view('pustakawan_views.master_data.pengguna.CRUD_pustakawan.index', [
            'title' => 'Daftar Data Pustakawan',
            'heading' => 'Daftar Pustakawan',
            'librarians' => User::role('Pustakawan')->get()
        ]);
    }

    public function show_data_peminjam()
    {
        return view('pustakawan_views.master_data.pengguna.CRUD_peminjam.index', [
            'title' => 'Daftar Data Peminjam',
            'heading' => 'Daftar Peminjam',
            'borrowers' => User::role('Peminjam')->get()
        ]);
    }

    public function show_tambah_admin()
    {
        return view('pustakawan_views.master_data.pengguna.CRUD_admin.create', [
            'title' => 'Daftarkan Admin Baru',
            'heading' => 'Tambah Admin Baru'
        ]);
    }
    public function show_perbarui_admin()
    {
        return view('pustakawan_views.master_data.pengguna.CRUD_admin.update', [
            'title' => 'Perbarui Data Admin Belum Aktif',
            'heading' => 'Perbarui Data Admin'
        ]);
    }

    public function show_detail_admin()
    {
        return view('pustakawan_views.master_data.pengguna.CRUD_admin.detail', [
            'title' => 'Detail Data Admin',
            'heading' => 'Detail Data Admin'
        ]);
    }

    public function show_tambah_pustakawan()
    {
        return view('pustakawan_views.master_data.pengguna.CRUD_pustakawan.create', [
            'title' => 'Daftarkan Pustakawan Baru',
            'heading' => 'Tambah Pustakawan Baru'
        ]);
    }

    public function show_perbarui_pustakawan()
    {
        return view('pustakawan_views.master_data.pengguna.CRUD_pustakawan.update', [
            'title' => 'Perbarui Data Pustakawan',
            'heading' => 'Perbarui Pustakawan'
        ]);
    }
    public function show_detail_pustakawan()
    {
        return view('pustakawan_views.master_data.pengguna.CRUD_pustakawan.detail', [
            'title' => 'Detail Data Pustakawan',
            'heading' => 'Detail Data Pustakawan'
        ]);
    }

    public function show_tambah_peminjam()
    {
        return view('pustakawan_views.master_data.pengguna.CRUD_peminjam.create', [
            'title' => 'Daftarkan Peminjam Baru',
            'heading' => 'Tambah Peminjam Baru'
        ]);
    }

    public function show_perbarui_peminjam()
    {
        return view('pustakawan_views.master_data.pengguna.CRUD_peminjam.update', [
            'title' => 'Perbarui Data Peminjam',
            'heading' => 'Perbarui Peminjam'
        ]);
    }

    public function show_detail_peminjam()
    {
        return view('pustakawan_views.master_data.pengguna.CRUD_peminjam.detail', [
            'title' => 'Detail Data Peminjam',
            'heading' => 'Detail Data Peminjam'
        ]);
    }



}
