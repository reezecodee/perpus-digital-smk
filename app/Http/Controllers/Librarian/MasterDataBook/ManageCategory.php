<?php

namespace App\Http\Controllers\Librarian\MasterDataBook;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class ManageCategory extends Controller
{
    public function show_data_kategori()
    {
        $title = 'Manajemen Kategori';
        $name = 'Overview';
        $pageTitle = 'Manajemen Kategori';
        $type = 'btn-modal';
        $btnName = 'Tambah Kategori';

        return view('test_views.book-management.category.index', compact('title', 'name', 'pageTitle', 'type', 'btnName'));
    }

    public function show_edit_category($id)
    {
        $category = Category::findOrFail($id);

        $title = 'Edit Kategori';
        $name = 'Edit';
        $pageTitle = 'Edit Kategori';
        $type = 'btn-back';
        $btnName = 'Kembali';
        $url = route('data-kategori');

        return view('test_views.book-management.category.edit', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'url', 'category'));
    }

    // Logical Backend Here...

    public function add_category(Request $request)
    {
        $validated_data = $request->validate([
            'nama_kategori' => 'required|max:20|unique:categories,nama_kategori',
            'keterangan' => 'nullable|max:50'
        ], [
            'nama_kategori.unique' => 'Nama kategori sudah digunakan.',
            'nama_kategori.required' => 'Nama kategori wajib di isi.',
            'nama_kategori.max' => 'Panjang maksimal nama kategori adalah 20 karakter',
            'keterangan.max' => 'Panjang maksimal keterangan adalah 50 karakter',
        ]);

        $category = Category::create($validated_data);
        $this->log("Menambahkan kategori buku baru {$category->nama_kategori}");
        return redirect()->route('data-kategori')->withSuccess('Berhasil menambah data kategori');
    }

    public function update_category(Request $request, $id)
    {
        $validated_data = $request->validate([
            'nama_kategori' => 'required|max:20|unique:categories,nama_kategori,' . $id,
            'keterangan' => 'nullable|max:50'
        ], [
            'nama_kategori.unique' => 'Nama kategori sudah digunakan.',
            'nama_kategori.required' => 'Nama kategori wajib di isi.',
            'nama_kategori.max' => 'Panjang maksimal nama kategori adalah 20 karakter',
            'keterangan.max' => 'Panjang maksimal keterangan adalah 50 karakter',
        ]);

        $category = Category::findOrFail($id);
        $category->update($validated_data);
        $this->log('Memperbarui data kategori');
        return redirect()->route('data-kategori')->withSuccess('Berhasil memperbarui data kategori');
    }

    public function delete_category($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        $this->log("Menghapus data kategori {$category->nama_kategori}");
        return back()->withSuccess('Berhasil menghapus data kategori');
    }
}
