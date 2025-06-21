<?php

namespace App\Http\Controllers\Officer\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class ManageCategoryController extends Controller
{
    public function show_data_kategori()
    {
        $title = 'Manajemen Kategori';
        $name = 'Overview';
        $pageTitle = 'Manajemen Kategori';
        $type = 'btn-modal';
        $btnName = 'Tambah Kategori';

        return view('officer-pages.book-management.category.index', compact('title', 'name', 'pageTitle', 'type', 'btnName'));
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

        return view('officer-pages.book-management.category.edit', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'url', 'category'));
    }
}
