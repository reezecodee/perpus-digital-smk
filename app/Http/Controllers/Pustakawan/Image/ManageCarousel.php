<?php

namespace App\Http\Controllers\Pustakawan\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\Information\ImageRequest;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManageCarousel extends Controller
{
    public function show_carousel()
    {
        return view('pustakawan_views.image.carousel', [
            'title' => 'Carousel',
            'heading' => 'Carousel',
            'carousels' => Carousel::all()
        ]);
    }

    public function upload_carousel(ImageRequest $request)
    {
        $validated_data = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/img/carousel', $filename);
            $validated_data['carousel_file'] = $filename;
            Carousel::create($validated_data);
        }

        return redirect()->back()->withSuccess('Gambar berhasil diupload!');
    }

    public function delete_carousel($id)
    {
        $carousel = Carousel::findOrFail($id);
        $file_path = 'public/img/carousel/' . $carousel->carousel_file;

        if (Storage::exists($file_path)) {
            Storage::delete($file_path);
        }

        $carousel->delete();

        return back()->withSuccess('Carousel berhasil dihapus!');
    }
}
