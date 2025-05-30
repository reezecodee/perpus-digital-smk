<?php

namespace App\Http\Controllers\Librarian\MasterDataBook;

use App\Http\Controllers\Controller;
use App\Models\Shelf;
use Illuminate\Http\Request;

class ManageShelf extends Controller
{
    public function show_data_rak_buku()
    {
        // return view('librarian-pages.master-data.book-management.book-shelf.index', [
        //     'title' => 'Daftar Data Rak Buku',
        //     'heading' => 'Daftar Rak Buku',
        //     'shelves' => Shelf::all(),
        // ]);

        $title = 'Manajemen Rak Buku';
        $name = 'Overview';
        $pageTitle = 'Manajemen Rak Buku';
        $type = 'btn-modal';
        $btnName = 'Tambah Rak Buku';

        return view('test_views.book-management.shelf.index', compact('title', 'name', 'pageTitle', 'type', 'btnName'));
    }

    public function show_edit_shelf($id)
    {
        $shelf = Shelf::findOrFail($id);

        return view('librarian-pages.master-data.book-management.book-shelf.edit', [
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

        $shelf = Shelf::create($validated_data);
        $this->log("Menambahkan rak buku baru dengan nama {$shelf->nama_rak}");
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
        $this->log("Memperbarui rak buku {$shelf->nama_rak}");
        return redirect()->route('data-rak')->withSuccess('Berhasil memperbarui data rak');
    }

    public function delete_shelf($id)
    {
        $shelf = Shelf::findOrFail($id);
        $shelf->delete();

        $this->log("Menghapus rak buku dengan nama rak $shelf->nama_rak");
        return back()->withSuccess('Berhasil menghapus data rak');
    }
}
