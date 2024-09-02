<?php

namespace App\Http\Controllers\Borrower\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\StoreImageRequest;
use App\Http\Requests\Profile\UpdatePasswordRequest;
use App\Http\Requests\Profile\UpdatePeminjamRequest;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Profile extends Controller
{
    public function show_overview()
    {
        return view('borrower-pages.profile.overview', [
            'title' => 'Overview Profile'
        ]);
    }
    
    public function show_history()
    {
        $histories = Loan::where('peminjam_id', auth()->user()->id)->whereNotIn('status', ['Terkena denda', 'Sudah dibayar', 'E-book'])->whereHas('book', function($query) {
            $query->where('format', 'Fisik');
        })
        ->with('book')->get();

        $fine_histories = Loan::where('peminjam_id', auth()->user()->id)->whereIn('status', ['Terkena denda', 'Sudah dibayarkan'])->get();

        return view('borrower-pages.profile.loan-histories', [
            'title' => 'Riwayat Peminjaman Buku',
            'histories' => $histories,
            'fine_histories' => $fine_histories,
        ]);
    }

    public function show_ch_password()
    {
        return view('borrower-pages.profile.change-password', [
            'title' => 'Ganti Password'
        ]);
    }

    // Logical Backend Here...

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

        $image_result = $this->store_image($validated_data);

        if (!$image_result['success']) {
            return response()->json([
                'message' => $image_result['message']
            ], 422);
        }

        if ($user->photo) {
            Storage::delete('public/img/profile/' . $user->photo);
        }

        $user->update(['photo' => $image_result['name']]);

        $this->log('Memperbarui foto profile-nya');
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
            $this->log('Memperbarui data profile-nya');
            return redirect()->back()->withSuccess('Data profil berhasil diperbarui.');
        }

        return redirect()->back()->withSuccess('Tidak ada perubahan pada data profil.');
    }

    public function update_password(UpdatePasswordRequest $request)
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
