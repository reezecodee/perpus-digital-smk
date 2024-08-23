<?php

namespace App\Http\Controllers\Pustakawan\MasterDataPengguna;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterData\ImportUserRequest;
use App\Http\Requests\MasterData\StoreUserRequest;
use App\Http\Requests\MasterData\UpdateUserRequest;
use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class LogicUserController extends Controller
{
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

    public function store_user(StoreUserRequest $request, $role)
    {
        $validated_data = $request->validated();
        if (isset($validated_data['image'])) {
            $validated_data['photo'] = $this->upload_profile_image($validated_data['image']);
        }

        $validated_data['password'] = bcrypt($validated_data['password']);

        $user = User::create($validated_data);
        $user->assignRole($role);

        $role_name = strtolower($role);
        return redirect()->route('data-user', $role_name)->withSuccess('Berhasil menambahkan admin baru');
    }

    public function update_user(UpdateUserRequest $request, $id)
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

        if($user->id == auth()->user()->id){
            return back()->withSuccess('Berhasil memperbarui profil');
        }

        return redirect()->route('data-user', $role_name)->withSuccess('Berhasil memperbarui data ' . $role_name);
    }

    public function delete_user($id)
    {
        $user = User::findOrFail($id);

        if ($user->photo) {
            Storage::delete('public/img/profile/' . $user->photo);
        }

        $roles = $user->roles->pluck('name')->toArray();
        $roles = implode(', ', $roles);

        $user->roles()->detach();
        $user->delete();

        return back()->withSuccess('Berhasil menghapus data ' . $roles);
    }

    public function import_user(Request $request)
    {
        $request->validate([
            'data_user' => 'required|file|mimes:xlsx,xls,csv|max:2048',
        ]);

        $file = $request->file('data_user');

        $import = new UsersImport();
        try {
            Excel::import($import, $file);
            if (session()->has('error')) {
                return back()->with('error', session('error'));
            }
            return back()->with('success', 'Data berhasil diimport.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
