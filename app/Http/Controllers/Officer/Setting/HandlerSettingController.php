<?php

namespace App\Http\Controllers\Officer\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Carousel\OfficerCarouselRequest;
use App\Http\Requests\Setting\SettingRequest;
use App\Models\Application;
use App\Models\Carousel;
use App\Repositories\Logger\ActivityLogger;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HandlerSettingController extends Controller
{
    protected $activityLogger;

    public function __construct(ActivityLogger $activityLogger)
    {
        $this->activityLogger = $activityLogger;
    }

    public function updateSetting(SettingRequest $request)
    {
        $validatedData = $request->validated();

        $app = Application::first();
        if (!$app) {
            $app = new Application();
            $app->id = (string) Str::uuid();
        }

        foreach (['favicon', 'logo_sekolah', 'logo_perpus'] as $field) {
            if ($request->hasFile($field)) {
                $old_path = public_path('img/' . $app->{$field});

                if ($app->{$field} && file_exists($old_path)) {
                    unlink($old_path);
                }

                $file = $request->file($field);
                $filename = uniqid($field . '_') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('img'), $filename);

                $validatedData[$field] = $filename;
            }
        }

        $app->fill($validatedData);
        $app->save();

        $message = "Memperbarui pengaturan aplikasi";
        $this->activityLogger->saveLog($message);

        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }

    public function storeCarousel(OfficerCarouselRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['carousel_file'] = $this->carousel_handler($request->file('carousel_file'));

        Carousel::create($validatedData);

        $message = "Menambahkan carousel baru";
        $this->activityLogger->saveLog($message);
        
        return redirect()->back()->withSuccess('Berhasil menambahkan carousel baru');
    }

    private function carousel_handler($file_carousel)
    {
        $folder_path = 'public/img/carousel/';
        $file_name = uniqid() . '.' . $file_carousel->getClientOriginalExtension();
        $file_carousel->storeAs($folder_path, $file_name);

        return $file_name;
    }

    public function deleteCarousel($id)
    {
        $carousel = Carousel::findOrFail($id);
        $file_path = 'public/img/carousel/' . $carousel->carousel_file;

        if (Storage::exists($file_path)) {
            Storage::delete($file_path);
        }

        $carousel->delete();

        $this->log('Menghapus data gambar carousel');
        return redirect()->back()->withSuccess('Carousel berhasil dihapus!');
    }
}
