<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Storage;

class BookService
{
    public function saveCoverImage($file, $coverName = null)
    {
        $oldCoverPath = 'public/img/cover/' . $coverName;
        if ($coverName && Storage::exists($oldCoverPath)) {
            Storage::delete($oldCoverPath);
        }

        $folderPath = 'public/img/cover/';
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs($folderPath, $fileName);

        return $fileName;
    }

    public function savePDFeBook($file, $pdfName = null)
    {
        $oldCoverPath = 'public/pdf/' . $pdfName;
        if ($pdfName && Storage::exists($oldCoverPath)) {
            Storage::delete($oldCoverPath);
        }

        $folderPath = 'public/pdf/';
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs($folderPath, $fileName);

        return $fileName;
    }

    public function removeCoverImage($coverName)
    {
        Storage::delete('public/img/cover/' . $coverName);
    }

    public function removePDFeBook($pdfName)
    {
        Storage::delete('public/pdf/' . $pdfName);
    }
}
