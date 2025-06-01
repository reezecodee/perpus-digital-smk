<?php

namespace App\Http\Controllers\Librarian\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\ApplicationRequest;
use App\Http\Requests\Application\CarouselRequest;
use App\Models\Application;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SettingController extends Controller
{
    public function index()
    {
        $title = "Pengaturan Aplikasi";
        $name = 'Overview';
        $pageTitle = "Pengaturan Aplikasi";

        return view('test_views.setting.index', compact('title', 'name', 'pageTitle'));
    }

    public function updateSettingApp(ApplicationRequest $request)
    {
        $validated_data = $request->validated();

        $app = Application::first();
        if (!$app) {
            $app = new Application();
            $app->id = (string) Str::uuid();
        }

        foreach (['favicon', 'logo_sekolah', 'logo_perpus', 'qris_perpus'] as $field) {
            if ($request->hasFile($field)) {
                $old_path = public_path('img/' . $app->{$field});

                if ($app->{$field} && file_exists($old_path)) {
                    unlink($old_path);
                }

                $file = $request->file($field);
                $filename = uniqid($field . '_') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('img'), $filename);

                $validated_data[$field] = $filename;
            }
        }

        $app->fill($validated_data);
        $app->save();
        $this->log("Memperbarui pengaturan aplikasi");

        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }

    public function storeCarousel(CarouselRequest $request)
    {
        $validated_data = $request->validated();
        $validated_data['carousel_file'] = $this->carousel_handler($request->file('carousel_file'));

        Carousel::create($validated_data);

        $this->log("Menambahkan carousel baru");
        return redirect()->back()->withSuccess('Berhasil menambahkan carousel baru');
    }

    private function carousel_handler($file_carousel)
    {
        $folder_path = 'public/img/carousel/';
        $file_name = uniqid() . '.' . $file_carousel->getClientOriginalExtension();
        $file_carousel->storeAs($folder_path, $file_name);

        return $file_name;
    }
}
