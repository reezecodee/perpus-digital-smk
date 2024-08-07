<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\StoreImageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogicProfileController extends Controller
{
    private function store_image($request)
    {
        $folderPath = 'public/img/profile/';

        // Memisahkan bagian data image base64
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        // Menentukan nama unik untuk file image
        $imageName = uniqid() . '.' . $image_type;

        // Menyimpan image menggunakan Storage Laravel
        $imageFullPath = $folderPath . $imageName;
        Storage::put($imageFullPath, $image_base64);

        return $imageName;
    }

    public function logic_profile_peminjam(StoreImageRequest $request)
    {
        $imageName = $this->store_image($request);
        return back()->withSuccess('Gambar berhasil diunggah: ' . $imageName);
    }
}
