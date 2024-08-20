<?php

namespace App\Http\Controllers\Pustakawan\MasterDataPerpustakaan;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterData\ApplicationRequest;
use App\Http\Requests\MasterData\PerpustakaanRequest;
use App\Models\Application;
use App\Models\Library;
use Illuminate\Http\Request;

class LogicPerpustakaanController extends Controller
{
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

        return back()->withSuccess($message);
    }
}
