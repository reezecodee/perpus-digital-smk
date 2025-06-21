<?php

namespace App\Http\Controllers\Officer\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Global\Profile\UpdateProfileRequest;
use App\Http\Requests\Profile\UpdatePasswordRequest;
use App\Models\User;
use App\Repositories\Logger\ActivityLogger;
use App\Services\Profile\Officer\ProfileOfficerService;
use Illuminate\Support\Facades\Hash;

class HandlerProfileController extends Controller
{
    protected $activityLogger;
    protected $profileService;

    public function __construct(ActivityLogger $activityLogger, ProfileOfficerService $profileService)
    {
        $this->activityLogger = $activityLogger;
        $this->profileService = $profileService;
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $validatedData = $request->validated();

        $user = auth()->user();
        $user->update([
            'password' => Hash::make($validatedData['new_password']),
        ]);

        $message = 'Memperbarui passwordnya';
        $this->activityLogger->saveLog($message);

        return redirect()->back()->withSuccess('Password berhasil diperbarui.');
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $validatedData = $request->validated();

        if (!empty($validatedData['image'])) {
            $validatedData['photo'] = $this->profileService->updatePhoto($validatedData['image'], $user->photo);
        }

        $user->update($validatedData);

        $message = 'Memperbarui profile-nya';
        $this->activityLogger->saveLog($message);

        return back()->withSuccess('Berhasil memperbarui profile.');
    }
}
