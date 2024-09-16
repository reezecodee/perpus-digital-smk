<?php

namespace App\Http\Controllers\Borrower\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Function ini digunakan untuk menampilkan halaman daftar kategori buku.
     *
     */

    public function showAllCategory(){
        $title = 'Semua Kategori Buku';
        $categories = Category::all();

        return view('borrower-pages.category.all-categories', compact('title', 'categories'));
    }
}
