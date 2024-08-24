<?php

namespace App\Http\Controllers\Pustakawan\MasterDataPerpustakaan;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterData\ApplicationRequest;
use App\Models\Application;
use Illuminate\Http\Request;

class ManageAppWeb extends Controller
{
    public function show_data_aplikasi()
    {
        return view('pustakawan_views.master_data.perpustakaan.data_aplikasi.index', [
            'title' => 'Data Aplikasi',
            'heading' => 'Data Aplikasi',
            'data' => Application::first()
        ]);
    }

    // Logical Backend Here...

    public function update_data_app(ApplicationRequest $request)
    {
        $validation_data = $request->validated();
        $destinationPath = public_path('assets/app');

        $application = Application::first();

        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');

            $fileName = 'favicon_app.' . $file->getClientOriginalExtension();

            if ($application) {
                if ($application->favicon) {
                    $oldFaviconPath = $destinationPath . '/' . $application->favicon;
                    if (file_exists($oldFaviconPath)) {
                        unlink($oldFaviconPath);
                    }
                }
            }

            $file->move($destinationPath, $fileName);

            $validation_data['favicon'] = $fileName;
        }

        if ($application) {
            $application->update($validation_data);
            $message = 'Berhasil memperbarui data aplikasi';
        } else {
            Application::create($validation_data);
            $message = 'Berhasil menambahkan data aplikasi';
        }

        return back()->withSuccess($message);
    }
}
