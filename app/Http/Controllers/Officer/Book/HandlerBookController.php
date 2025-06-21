<?php

namespace App\Http\Controllers\Officer\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\Officer\OfficerBookRequest;
use App\Http\Requests\Book\Officer\OfficerUpdateBookRequest;
use App\Models\Book;
use App\Models\Fine;
use App\Repositories\Logger\ActivityLogger;
use App\Services\Auth\BookService;

class HandlerBookController extends Controller
{
    protected $bookService;
    protected $activityLogger;

    public function __construct(BookService $bookService, ActivityLogger $activityLogger)
    {
        $this->bookService = $bookService;
        $this->activityLogger = $activityLogger;
    }

    public function storeBook(OfficerBookRequest $request, $format)
    {
        $validatedData = $request->validated();

        $validatedData['cover_buku'] = $this->bookService->saveCoverImage($request->file('cover_buku'));
        $validatedData['format'] = ucfirst($format);

        if ($request->hasFile('e_book_file')) {
            $validatedData['e_book_file'] = $this->bookService->savePDFeBook($request->file('e_book_file'));
        }

        $book = Book::create($validatedData);

        $fine_data = [
            'buku_id' => $book->id,
            'denda_terlambat' => $validatedData['denda_terlambat'],
            'denda_rusak' => $validatedData['denda_rusak'],
            'denda_tidak_kembali' => $validatedData['denda_tidak_kembali'],
        ];

        Fine::create($fine_data);

        $lcfirst = lcfirst($book->format);

        $message = "Menambahkan buku {$lcfirst} baru berjudul \"{$book->judul}\"";
        $this->activityLogger->saveLog($message);

        return redirect()->route('data-buku', $lcfirst)->withSuccess('Berhasil menambahkan buku baru.');
    }

    public function updateBook(OfficerUpdateBookRequest $request, $format, $id)
    {
        $validatedData = $request->validated();
        $book = Book::findOrFail($id);

        if ($request->hasFile('cover_buku')) {
            $validatedData['cover_buku'] = $this->bookService->saveCoverImage($request->file('cover_buku'), $book->cover_buku);
        }

        if ($request->hasFile('e_book_file')) {
            $validatedData['e_book_file'] = $this->bookService->savePDFeBook($request->file('e_book_file'), $book->e_book_file,);
        }

        $book->update($validatedData);

        $lcfirst = lcfirst($format);

        $message = "Memperbarui data buku {$lcfirst} dengan judul \"{$book->judul}\"";
        $this->activityLogger->saveLog($message);

        return redirect()->route('data-buku', lcfirst($lcfirst))->withSuccess('Berhasil memperbarui buku.');
    }

    public function destroyBook($id)
    {
        $book = Book::findOrFail($id);
        $fine = Fine::where('buku_id', $id)->first();

        if ($book->cover_buku) {
            $this->bookService->removeCoverImage($book->cover_buku);
        }

        if ($book->e_book_file) {
            $this->bookService->removePDFeBook($book->e_book_file);
        }

        $book->delete();

        if ($fine) {
            $fine->delete();
        }

        $lcfirst = lcfirst($book->format);

        $message = "Menghapus data buku {$lcfirst} dengan judul \"{$book->judul}\"";
        $this->activityLogger->saveLog($message);

        return back()->withSuccess('Berhasil menghapus data buku');
    }
}
