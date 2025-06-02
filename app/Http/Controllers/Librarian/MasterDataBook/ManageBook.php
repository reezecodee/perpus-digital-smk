<?php

namespace App\Http\Controllers\Librarian\MasterDataBook;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterData\StoreBookRequest;
use App\Http\Requests\MasterData\UpdateBookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Fine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManageBook extends Controller
{
    public function show_data_buku($format)
    {
        $formats = ['elektronik', 'fisik'];

        if (!in_array($format, $formats)) {
            abort(404);
        }

        $format = ucfirst($format);
        $lowerCaseFormat = strtolower($format);

        $title = "Manajemen Buku {$format}";
        $name = 'Overview';
        $pageTitle = "Manajemen Buku {$format}";
        $type = 'btn-modal';
        $btnName = "Tambah Buku {$format}";
        $categories = Category::all();

        return view('test_views.book-management.book.index', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'format', 'lowerCaseFormat', 'categories'));
    }

    public function show_edit_book($format, $id)
    {
        $formats = ['elektronik', 'fisik'];

        if (!in_array($format, $formats)) {
            abort(404);
        }

        $book = Book::with('fine')->findOrFail($id);
        $format = ucfirst($format);

        $title = "Edit Buku {$format}";
        $name = 'Edit';
        $pageTitle = "Edit Buku {$format}";
        $type = 'btn-back';
        $btnName = 'Kembali';
        $url = route('data-buku', strtolower($format));
        $categories = Category::all();

        return view('test_views.book-management.book.edit', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'url', 'format', 'book', 'categories'));
    }

    public function show_detail_book($format, $id)
    {
        $formats = ['elektronik', 'fisik'];

        if (!in_array($format, $formats)) {
            abort(404);
        }

        $book = Book::findOrFail($id);
        $uc_first_format = ucfirst($format);

        return view('librarian-pages.master-data.book-management.book.detail', [
            'title' => 'Detail Buku ' . $book->judul,
            'heading' => 'Detail Buku ' . $uc_first_format,
            'data' => $book,
            'format' => $format
        ]);
    }

    // Logical Backend Here...

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

    public function store_book(StoreBookRequest $request, $format)
    {
        $validated_data = $request->validated();

        $validated_data['cover_buku'] = $this->book_cover_handler($request->file('cover_buku'));
        $validated_data['format'] = ucfirst($format);

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

        $lcfirst = lcfirst($book->format);
        $this->log("Menambahkan buku {$lcfirst} baru berjudul \"{$book->judul}\"");
        return redirect()->route('data-buku', $lcfirst)->withSuccess('Berhasil menambahkan buku baru.');
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

        $lcfirst = lcfirst($format);
        $this->log("Memperbarui data buku {$lcfirst} dengan judul \"{$book->judul}\"");
        return redirect()->route('data-buku', lcfirst($lcfirst))->withSuccess('Berhasil memperbarui buku.');
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

        $lcfirst = lcfirst($book->format);
        $this->log("Menghapus data buku {$lcfirst} dengan judul \"{$book->judul}\"");
        return back()->withSuccess('Berhasil menghapus data buku');
    }
}
