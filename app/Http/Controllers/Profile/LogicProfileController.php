<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\StoreImageRequest;
use App\Http\Requests\Profile\UpdatePasswordRequest;
use App\Http\Requests\Profile\UpdatePeminjamRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    public function upload_profile_image(StoreImageRequest $image_request)
    {
        $validated_data = $image_request->validated();
        $user = auth()->user();

        $image_result = $this->store_image($image_request);

        if (!$image_result['success']) {
            return response()->json([
                'message' => $image_result['message']
            ], 422);
        }

        if ($user->photo) {
            Storage::delete('public/img/profile/' . $user->photo);
        }

        $user->update(['photo' => $image_result['name']]);

        return response()->json([
            'message' => 'Data profil berhasil diperbarui'
        ]);
    }

    public function update_profile(UpdatePeminjamRequest $update_request)
    {
        $update_data = $update_request->validated();
        $user = auth()->user();

        $has_changes = false;
        foreach ($update_data as $key => $value) {
            if ($user->$key != $value) {
                $has_changes = true;
                break;
            }
        }

        if ($has_changes) {
            $user->update($update_data);
            return redirect()->back()->withSuccess('Data profil berhasil diperbarui');
        }

        return redirect()->back()->withSuccess('Tidak ada perubahan pada data profil');
    }

    public function update_password(UpdatePasswordRequest $request)
    {
        $validatedData = $request->validated();

        $user = auth()->user();
        $user->update([
            'password' => Hash::make($validatedData['new_password']),
        ]);

        return redirect()->back()->withSuccess('Password berhasil diperbarui.');
    }
}
