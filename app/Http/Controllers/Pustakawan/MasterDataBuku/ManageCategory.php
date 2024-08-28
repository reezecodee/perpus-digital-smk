<?php

namespace App\Http\Controllers\Pustakawan\MasterDataBuku;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class ManageCategory extends Controller
{
    public function show_data_kategori()
    {
        return view('pustakawan_views.master_data.buku.kategori.index', [
            'title' => 'Daftar Data Kategori',
            'heading' => 'Daftar Kategori',
            'categories' => Category::withCount('book')->get(),
        ]);
    }

    public function show_edit_category($id)
    {
        $category = Category::findOrFail($id);

        return view('pustakawan_views.master_data.buku.kategori.edit', [
            'title' => 'Edit Data Kategori',
            'heading' => 'Edit Kategori',
            'books' => Book::where('kategori_id', $id)->latest()->get(),
            'data' => $category
        ]);
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
