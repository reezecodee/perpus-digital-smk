<?php

namespace App\Http\Controllers\Pustakawan\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdatePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageProfile extends Controller
{
    public function show_overview_profile() 
    {
        return view('pustakawan_views.profile.overview', [
            'title' => 'Overview Profile',
            'heading' => 'Overview Profile'
        ]);
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
}
