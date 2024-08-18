<?php

namespace App\Http\Controllers\Pustakawan\MasterDataBuku;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterData\StoreBookRequest;
use App\Http\Requests\MasterData\UpdateBookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Fine;
use App\Models\Shelf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogicBukuController extends Controller
{
    private function book_cover_handler($file_cover)
    {
        $folder_path = 'public/img/cover/';
        $file_name = uniqid() . '.' . $file_cover->getClientOriginalExtension();
        $file_cover->storeAs($folder_path, $file_name);

        return $file_name;
    }

    private function pdf_file_handler($file_pdf)
    {
        $folder_path = 'public/pdf/';
        $file_name = uniqid() . '.' . $file_pdf->getClientOriginalExtension();
        $file_pdf->storeAs($folder_path, $file_name);

        return $file_name;
    }

    public function store_book(StoreBookRequest $request)
    {
        $validated_data = $request->validated();

        $validated_data['cover_buku'] = $this->book_cover_handler($request->file('cover_buku'));

        if ($request->hasFile('e_book_file')) {
            $validated_data['e_book_file'] = $this->pdf_file_handler($request->file('e_book_file'));
        }

        $book = Book::create($validated_data);

        if (isset($validated_data['denda_terlambat'], $validated_data['denda_rusak'], $validated_data['denda_tidak_kembali'])) {
            $fine_data = [
                'buku_id' => $book->id,
                'denda_terlambat' => $validated_data['denda_terlambat'],
                'denda_rusak' => $validated_data['denda_rusak'],
                'denda_tidak_kembali' => $validated_data['denda_tidak_kembali'],
            ];

            Fine::create($fine_data);
        }


        return redirect()->route('data-buku', lcfirst($book->format))->withSuccess('Berhasil menambahkan buku baru');
    }

    public function update_book(UpdateBookRequest $request, $format, $id)
    {
        $validated_data = $request->validated();

        $book = Book::find($id);

        if (!$book) {
            abort(404);
        }

        if ($request->hasFile('cover_buku')) {
            $old_cover_path = 'public/img/cover/' . $book->cover_buku;
            if ($book->cover_buku && Storage::exists($old_cover_path)) {
                Storage::delete($old_cover_path);
            }

            $validated_data['cover_buku'] = $this->book_cover_handler($request->file('cover_buku'));
        }

        if ($request->hasFile('e_book_file')) {
            $old_pdf_path = 'public/pdf/' . $book->e_book_file;
            if ($book->e_book_file && Storage::exists($old_pdf_path)) {
                Storage::delete($old_pdf_path);
            }

            $validated_data['e_book_file'] = $this->pdf_file_handler($request->file('e_book_file'));
        }

        $book->update($validated_data);

        if (isset($validated_data['denda_terlambat'], $validated_data['denda_rusak'], $validated_data['denda_tidak_kembali'])) {
            $fine_data = [
                'buku_id' => $book->id,
                'denda_terlambat' => $validated_data['denda_terlambat'] ?? $book->fine->denda_terlambat,
                'denda_rusak' => $validated_data['denda_rusak'] ?? $book->fine->denda_rusak,
                'denda_tidak_kembali' => $validated_data['denda_tidak_kembali'] ?? $book->fine->denda_tidak_kembali,
            ];

            Fine::updateOrCreate(['buku_id' => $book->id], $fine_data);
        }

        return redirect()->route('data-buku', lcfirst($format))->withSuccess('Berhasil memperbarui buku.');
    }

    public function delete_book($id)
    {
        $book = Book::findOrFail($id);
        $fine = Fine::where('buku_id', $id)->first();

        if ($book->cover_buku) {
            Storage::delete('public/img/cover/' . $book->cover_buku);
        }

        if ($book->e_book_file) {
            Storage::delete('public/pdf/' . $book->e_book_file);
        }

        $book->delete();

        if ($fine) {
            $fine->delete();
        }

        return back()->withSuccess('Berhasil menghapus data buku');
    }

    public function import_books() {}

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

        Category::create($validated_data);
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
        return redirect()->route('data-kategori')->withSuccess('Berhasil memperbarui data kategori');
    }

    public function delete_category($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return back()->withSuccess('Berhasil menghapus data kategori');
    }

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
