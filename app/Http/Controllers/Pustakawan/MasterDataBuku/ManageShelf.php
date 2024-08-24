<?php

namespace App\Http\Controllers\Pustakawan\MasterDataBuku;

use App\Http\Controllers\Controller;
use App\Models\Shelf;
use Illuminate\Http\Request;

class ManageShelf extends Controller
{
    public function show_data_rak_buku()
    {
        return view('pustakawan_views.master_data.buku.rak_buku.index', [
            'title' => 'Daftar Data Rak Buku',
            'heading' => 'Daftar Rak Buku',
            'shelves' => Shelf::all(),
        ]);
    }

    public function show_edit_shelf($id)
    {
        $shelf = Shelf::findOrFail($id);

        return view('pustakawan_views.master_data.buku.rak_buku.edit', [
            'title' => 'Edit Data Rak',
            'heading' => 'Edit Rak',
            'data' => $shelf
        ]);
    }

    // Logical Backend Here

    public function add_shelf(Request $request)
    {
        $validated_data = $request->validate([
            'kode' => 'required|max:20|unique:shelves,kode',
            'nama_rak' => 'required|max:30',
            'kapasitas' => 'required|max:5',
        ], [
            'kode.unique' => 'Kode rak sudah digunakan.',
            'kode.required' => 'Kode rak wajib di isi.',
            'nama_rak.required' => 'Nama rak wajin di isi',
            'nama_rak.max' => 'Panjang maksimal nama rak adalah 30 karakter',
            'kapasitas.required' => 'Kapasitas wajib di isi',
            'kapasitas.max' => 'Panjang maksimal kapasitas adalah 5 karakter',
        ]);

        Shelf::create($validated_data);
        return redirect()->route('data-rak')->withSuccess('Berhasil menambah data rak');
    }

    public function update_shelf(Request $request, $id)
    {
        $validated_data = $request->validate([
            'kode' => 'required|max:20|unique:shelves,kode,' . $id,
            'nama_rak' => 'required|max:30',
            'kapasitas' => 'required|max:5',
        ], [
            'kode.unique' => 'Kode rak sudah digunakan.',
            'kode.required' => 'Kode rak wajib di isi.',
            'nama_rak.required' => 'Nama rak wajin di isi',
            'nama_rak.max' => 'Panjang maksimal nama rak adalah 30 karakter',
            'kapasitas.required' => 'Kapasitas wajib di isi',
            'kapasitas.max' => 'Panjang maksimal kapasitas adalah 5 karakter',
        ]);

        $shelf = Shelf::findOrFail($id);
        $shelf->update($validated_data);
        return redirect()->route('data-rak')->withSuccess('Berhasil memperbarui data rak');
    }

    public function delete_shelf($id)
    {
        $category = Shelf::findOrFail($id);
        $category->delete();

        return back()->withSuccess('Berhasil menghapus data rak');
    }
}
