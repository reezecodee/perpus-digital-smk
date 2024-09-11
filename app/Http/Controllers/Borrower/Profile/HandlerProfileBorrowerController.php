<?php

namespace App\Http\Controllers\Borrower\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\StoreImageRequest;
use App\Http\Requests\Profile\UpdatePasswordRequest;
use App\Http\Requests\Profile\UpdatePeminjamRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HandlerProfileBorrowerController extends Controller
{
    /**
     * Function ini digunakan untuk memperbarui foto profile user.
     *
     */

    public function uploadProfileImage(StoreImageRequest $request)
    {
        $validatedData = $request->validated();
        $user = $this->user;

        $imageResult = $this->storeImage($validatedData);

        if (!$imageResult['success']) {
            return response()->json([
                'message' => $imageResult['message']
            ], 422);
        }

        if ($user->photo) {
            Storage::delete('public/img/profile/' . $user->photo);
        }

        $user->update(['photo' => $imageResult['name']]);

        $this->log('Memperbarui foto profile-nya');
        return response()->json([
            'message' => 'Data profil berhasil diperbarui'
        ]);
    }


    /**
     * Lakukan penyimpanan foto.
     * @param $request -> data gambar
     */

    private function storeImage($request)
    {
        $folderPath = 'public/img/profile/';

        // Memisahkan bagian data image base64
        $image_parts = explode(";base64,", $request['image']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageSize = strlen($image_base64);

        $maxSizeInBytes = 2 * 1024 * 1024;

        if ($imageSize > $maxSizeInBytes) {
            return [
                'success' => false,
                'message' => 'Ukuran gambar tidak boleh lebih dari 2MB.'
            ];
        }

        $imageName = uniqid() . '.' . $image_type;

        $imageFullPath = $folderPath . $imageName;
        Storage::put($imageFullPath, $image_base64);

        return [
            'success' => true,
            'name' => $imageName
        ];
    }


    /**
     * Function ini digunakan untuk memperbarui profile user.
     *
     */

    public function updateProfile(UpdatePeminjamRequest $request)
    {
        $updateData = $request->validated();
        $user = $this->user;

        $hasChanges = false;
        foreach ($updateData as $key => $value) {
            if ($user->$key != $value) {
                $hasChanges = true;
                break;
            }
        }

        if ($hasChanges) {
            $user->update($updateData);
            $this->log('Memperbarui data profile-nya');
            return redirect()->back()->withSuccess('Data profil berhasil diperbarui.');
        }

        return redirect()->back()->withSuccess('Tidak ada perubahan pada data profil.');
    }

    /**
     * Function ini digunakan untuk memperbarui password user.
     *
     */

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $validatedData = $request->validated();

        $user = auth()->user();
        $user->update([
            'password' => Hash::make($validatedData['new_password']),
        ]);

        $this->log('Memperbarui password-nya');
        return redirect()->back()->withSuccess('Password berhasil diperbarui.');
    }
}
