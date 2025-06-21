<?php

namespace App\Http\Controllers\Officer\MasterDataBook;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterData\PlacementRequest;
use App\Models\Book;
use App\Models\Placement;
use App\Models\Shelf;
use Illuminate\Http\Request;

class ManageShelf extends Controller
{
    public function show_data_rak_buku()
    {
        $title = 'Manajemen Rak Buku';
        $name = 'Overview';
        $pageTitle = 'Manajemen Rak Buku';
        $type = 'btn-modal';
        $btnName = 'Tambah Rak Buku';

        return view('officer-pages.book-management.shelf.index', compact('title', 'name', 'pageTitle', 'type', 'btnName'));
    }

    public function show_edit_shelf($id)
    {
        $shelf = Shelf::findOrFail($id);

        $title = 'Edit Rak Buku';
        $name = 'Edit';
        $pageTitle = 'Edit Rak Buku';
        $type = 'btn-back';
        $btnName = 'Kembali';
        $url = route('data-rak');

        return view('officer-pages.book-management.shelf.edit', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'url', 'shelf'));
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
            'nama_rak.required' => 'Nama rak wajib di isi',
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

    public function show_detail_shelf($id)
    {
        $shelf = Shelf::findOrFail($id);

        $title = 'Detail Rak Buku';
        $name = 'Detail';
        $pageTitle = 'Detail Rak Buku';
        $type = 'btn-back';
        $btnName = 'Kembali';
        $url = route('data-rak');
        $books = Book::where('status', 'Tersedia')->where('format', 'Fisik')->get();

        return view('officer-pages.book-management.shelf.detail', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'url', 'shelf', 'books'));
    }

    public function show_edit_placement($id)
    {
        $placement = Placement::findOrFail($id);

        $title = 'Detail Penempatan Buku';
        $name = 'Detail';
        $pageTitle = 'Detail Penempatan Buku';
        $type = 'btn-back';
        $btnName = 'Kembali';
        $url = route('detail_shelf', $placement->shelf->id);

        return view('officer-pages.book-management.shelf.edit-placement', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'url', 'placement'));
    }

    public function store_placement(PlacementRequest $request, $id)
    {
        $shelf = Shelf::findOrFail($id);
        $validated_data = $request->validated();
        $validated_data['rak_id'] = $shelf->id;

        Placement::create($validated_data);

        $this->log("Menambahkan penempatan buku baru di rak {$shelf->nama_rak}");
        return redirect()->back()->withSuccess('Berhasil menambahkan tempat buku baru di rak.');
    }

    public function update_placement(Request $request, $id)
    {
        $validated_data = $request->validate([
            'jumlah_buku' => 'required|numeric|min:1',
            'buku_saat_ini' => 'required|numeric|min:1',
        ], [
            'jumlah_buku.required' => 'Jumlah buku wajib diisi.',
            'jumlah_buku.numeric' => 'Jumlah buku harus berupa angka.',
            'jumlah_buku.min' => 'Jumlah buku minimal 1.',

            'buku_saat_ini.required' => 'Buku saat ini wajib diisi.',
            'buku_saat_ini.numeric' => 'Buku saat ini harus berupa angka.',
            'buku_saat_ini.min' => 'Buku saat ini minimal 1.',
        ]);

        $placement = Placement::findOrFail($id);
        $placement->update($validated_data);

        $this->log("Memperbarui data penempatan di rak {$placement->shelf->nama_rak}");

        return redirect()->back()->withSuccess("Berhasil memperbarui data penempatan buku di rak {$placement->shelf->nama_rak}.");
    }
}
