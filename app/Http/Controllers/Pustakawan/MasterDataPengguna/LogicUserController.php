<?php

namespace App\Http\Controllers\Pustakawan\MasterDataPengguna;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterData\StoreAdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogicUserController extends Controller
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
        if(isset($validated_data['image'])){
            $validated_data['photo'] = $this->upload_profile_image($request);
        }

        $validated_data['password'] = bcrypt($validated_data['password']);

        $user = User::create($validated_data);
        $user->assignRole('Admin');

        return redirect()->route('data-admin')->withSuccess('Berhasil menambahkan admin baru');
    }

    public function update_admin() {}

    public function delete_admin() {}

    public function logic_import_admin(Request $request)
    {
        $data = $request->input('data');
        // dd($data);

        // Proses dan simpan data ke database atau lakukan operasi lainnya
        // foreach ($data as $row) {
        //     // Logika penyimpanan data
        // }

        return response()->json(['message' => 'Data successfully uploaded']);
    }
}
