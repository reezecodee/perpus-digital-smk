<?php

namespace App\Http\Controllers\Officer\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;

class ManageBookController extends Controller
{
    public function showBook($format)
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

        return view('officer-pages.book-management.book.index', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'format', 'lowerCaseFormat', 'categories'));
    }

    public function showBookEdit($format, $id)
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

        return view('officer-pages.book-management.book.edit', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'url', 'format', 'book', 'categories'));
    }

    public function showBookDetail($format, $id)
    {
        $formats = ['elektronik', 'fisik'];

        if (!in_array($format, $formats)) {
            abort(404);
        }

        $book = Book::findOrFail($id);
        $upperCaseFormat = ucfirst($format);

        return view('librarian-pages.master-data.book-management.book.detail', [
            'title' => 'Detail Buku ' . $book->judul,
            'heading' => 'Detail Buku ' . $upperCaseFormat,
            'data' => $book,
            'format' => $format
        ]);
    }
}
