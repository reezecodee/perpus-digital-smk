<?php

namespace App\Http\Controllers\Student\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Global\Profile\UpdateProfileRequest;
use App\Http\Requests\Profile\StoreImageRequest;
use App\Http\Requests\Profile\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class HandlerProfileBorrowerController extends Controller
{
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

    private function storeImage($request)
    {
        $folderPath = 'public/img/profile/';

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

    public function updateProfile(UpdateProfileRequest $request)
    {
        try {
            $updateData = $request->validated();
            /** @var \App\Models\User $user */
            $user = Auth::user();

            $user->fill($updateData);

            if ($user->isDirty()) {
                $user->save();
                $this->log('Memperbarui data profile-nya');
                return redirect()->back()->withSuccess('Data profil berhasil diperbarui.');
            }

            return redirect()->back()->withSuccess('Tidak ada perubahan pada data profil.');
        } catch (\Exception $e) {
            Log::error('Error saat memperbarui profil: ' . $e->getMessage());
            return redirect()->back()->withErrors('Terjadi kesalahan saat memperbarui profil.');
        }
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $validatedData = $request->validated();

        /** @var \App\Models\User $user */
        $user = auth()->user();
        $user->update([
            'password' => Hash::make($validatedData['new_password']),
        ]);

        $this->log('Memperbarui password-nya');
        return redirect()->back()->withSuccess('Password berhasil diperbarui.');
    }
}
