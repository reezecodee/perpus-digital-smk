<?php

namespace App\Http\Controllers\Officer\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\OfficerCategoryRequest;
use App\Http\Requests\Category\OfficerUpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\Logger\ActivityLogger;

class HandlerCategoryController extends Controller
{
    protected $activityLogger;

    public function __construct(ActivityLogger $activityLogger)
    {
        $this->activityLogger = $activityLogger;   
    }

    public function storeCategory(OfficerCategoryRequest $request)
    {
        $validatedData = $request->validated();
        $category = Category::create($validatedData);

        $message = "Menambahkan kategori buku baru {$category->nama_kategori}";
        $this->activityLogger->saveLog($message);

        return redirect()->route('data-kategori')->withSuccess('Berhasil menambah data kategori');
    }

    public function updateCategory(OfficerUpdateCategoryRequest $request, $id)
    {
        $validated_data = $request->validated();
        $category = Category::findOrFail($id);

        $category->update($validated_data);

        $message = 'Memperbarui data kategori';
        $this->activityLogger->saveLog($message);

        return redirect()->route('data-kategori')->withSuccess('Berhasil memperbarui data kategori');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        $message = "Menghapus data kategori {$category->nama_kategori}";
        $this->activityLogger->saveLog($message);
        
        return back()->withSuccess('Berhasil menghapus data kategori');
    }
}
