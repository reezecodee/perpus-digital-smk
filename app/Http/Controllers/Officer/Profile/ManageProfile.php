<?php

namespace App\Http\Controllers\Officer\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdatePasswordRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ManageProfile extends Controller
{
    public function show_overview_profile()
    {
        $title = 'Profile Saya';
        $name = 'Overview';
        $pageTitle = 'Profile Saya';

        return view('officer-pages.profile.index', compact('title', 'name', 'pageTitle'));
    }

    public function update_password(UpdatePasswordRequest $request)
    {
        $validatedData = $request->validated();

        $user = auth()->user();
        $user->update([
            'password' => Hash::make($validatedData['new_password']),
        ]);

        $this->log('Memperbarui passwordnya');
        return redirect()->back()->withSuccess('Password berhasil diperbarui.');
    }

    public function update_profile(UpdateProfileRequest $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        $validated_data = $request->validated();

        if (!empty($validated_data['image'])) {
            $validated_data['photo'] = $this->upload_profile_image($validated_data['image']);
            if ($user->photo) {
                $imagePath = 'public/img/profile/' . $user->photo;

                if (Storage::exists($imagePath)) {
                    Storage::delete($imagePath);
                }
            }
        }

        $user->update($validated_data);

        $this->log('Memperbarui profile-nya');
        return back()->withSuccess('Berhasil memperbarui profile.');
    }

    private function store_image($base64)
    {
        $folderPath = 'public/img/profile/';

        $image_parts = explode(";base64,", $base64);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageSize = strlen($image_base64);

        $maxSizeInBytes = 1048576;

        if ($imageSize > $maxSizeInBytes) {
            return [
                'success' => false,
                'message' => 'Ukuran gambar tidak boleh lebih dari 1MB.'
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

    private function upload_profile_image($image_request)
    {
        $image_result = $this->store_image($image_request);

        if (!$image_result['success']) {
            return back()->withErrors($image_result['message'])->withInput();
        }

        return $image_result['name'];
    }
}
