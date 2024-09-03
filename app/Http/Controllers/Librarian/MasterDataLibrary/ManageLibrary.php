<?php

namespace App\Http\Controllers\Librarian\MasterDataLibrary;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterData\PerpustakaanRequest;
use App\Models\Library;
use Illuminate\Http\Request;

class ManageLibrary extends Controller
{
    public function show_data_perpus()
    {
        return view('librarian-pages.master-data.library-management.library', [
            'title' => 'Data Perpustakaan',
            'heading' => 'Data Perpustakaan',
            'data' => Library::first()
        ]);
    }

    // Logical Backend Here...

    public function update_data_perpus(PerpustakaanRequest $request)
    {
        $validation_data = $request->validated();
        $destinationPath = public_path('assets/app');

        $application = Library::first();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');

            $fileName = 'logo_perpus.' . $file->getClientOriginalExtension();

            if ($application) {
                if ($application->favicon) {
                    $oldFaviconPath = $destinationPath . '/' . $application->favicon;
                    if (file_exists($oldFaviconPath)) {
                        unlink($oldFaviconPath);
                    }
                }
            }

            $file->move($destinationPath, $fileName);

            $validation_data['logo'] = $fileName;
        }

        if ($application) {
            $application->update($validation_data);
            $message = 'Berhasil memperbarui data informasi perpustakaan';
        } else {
            Library::create($validation_data);
            $message = 'Berhasil menambahkan data informasi perpustakaan';
        }

        $this->log('Memperbarui data informasi perpustakaan');
        return back()->withSuccess($message);
    }
}
