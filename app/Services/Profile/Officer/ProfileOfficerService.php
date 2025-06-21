<?php

namespace App\Services\Profile\Officer;

use Illuminate\Support\Facades\Storage;

class ProfileOfficerService
{
    public function updatePhoto($rawImage, $filenamePhoto)
    {
        $folderPath = 'public/img/profile/';

        $imageParts = explode(";base64,", $rawImage);
        $imageTypeAux = explode("image/", $imageParts[0]);
        $imageType = $imageTypeAux[1];
        $imageBase64 = base64_decode($imageParts[1]);
        $imageSize = strlen($imageBase64);
        $maxSizeInBytes = 1048576;

        if ($imageSize > $maxSizeInBytes) {
            return [
                'success' => false,
                'message' => 'Ukuran gambar tidak boleh lebih dari 1MB.'
            ];
        }

        $imageName = uniqid() . '.' . $imageType;

        $imageFullPath = $folderPath . $imageName;
        Storage::put($imageFullPath, $imageBase64);

        $imageResult = [
            'success' => true,
            'name' => $imageName
        ];

        if (!$imageResult['success']) {
            return back()->withErrors($imageResult['message'])->withInput();
        }

        if ($filenamePhoto) {
            $imagePath = 'public/img/profile/' . $filenamePhoto;

            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
        }

        return $imageResult['name'];
    }
}
