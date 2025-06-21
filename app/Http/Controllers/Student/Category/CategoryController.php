<?php

namespace App\Http\Controllers\Student\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function showAllCategory(){
        $title = 'Semua Kategori Buku';
        $categories = Category::all();

        return view('student-pages.category.all-categories', compact('title', 'categories'));
    }
}
