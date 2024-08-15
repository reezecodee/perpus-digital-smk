<?php

namespace App\Http\Controllers\Pustakawan\MasterDataPengguna;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterData\StoreAdminRequest;
use App\Http\Requests\MasterData\UpdateAdminRequest;
use App\Imports\UsersImport;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException as ValidationValidationException;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException as ValidatorsValidationException;

class LogicUserController extends Controller
{
    private function store_image($base64)
    {
        $folderPath = 'public/img/profile/';

        // Memisahkan bagian data image base64
        $image_parts = explode(";base64,", $base64);
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

    private function upload_profile_image($image_request)
    {
        $image_result = $this->store_image($image_request);

        if (!$image_result['success']) {
            return back()->withErrors($image_result['message']);
        }

        return $image_result['name'];
    }

    public function store_admin(StoreAdminRequest $request)
    {
        $validated_data = $request->validated();
        if (isset($validated_data['image'])) {
            $validated_data['photo'] = $this->upload_profile_image($validated_data['image']);
        }

        $validated_data['password'] = bcrypt($validated_data['password']);

        $user = User::create($validated_data);
        $user->assignRole('Admin');

        $role_name = $user->roles->first()->name;
        $url_slug = strtolower("data-$role_name");
        return redirect()->route($url_slug)->withSuccess('Berhasil menambahkan admin baru');
    }

    public function update_user(UpdateAdminRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $validated_data = $request->validated();

        if (empty($validated_data['password'])) {
            unset($validated_data['password']);
        } else {
            $validated_data['password'] = bcrypt($validated_data['password']);
        }

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

        $role_name = $user->roles->first()->name;
        return redirect()->route('data-user', $role_name)->withSuccess('Berhasil memperbarui data ' . $role_name);
    }

    public function delete_user($id)
    {
        $user = User::findOrFail($id);
        $role = $user->roles()->pluck('name');

        if ($user->photo) {
            $imagePath = 'public/img/profile/' . $user->photo;

            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
        }

        $user->roles()->detach();
        $user->delete();

        return back()->withSuccess('Berhasi menghapus data ' . $role);
    }

    // public function logic_import_admin(StoreAdminRequest $request)
    // {
    //     $validated_data = $request->validated();

    //     return response()->json(['message' => $validated_data['data'][1]]);
    // }

    public function import_admin(Request $request)
    {
        $request->validate([
            'data_admin' => 'required|file|mimes:xlsx,xls,csv|max:2048',
        ]);
    
        $file = $request->file('data_admin');
    
        Excel::import(new UsersImport, $file);
    
        return back()->with('success', 'Data berhasil diimport.');
    }
}
