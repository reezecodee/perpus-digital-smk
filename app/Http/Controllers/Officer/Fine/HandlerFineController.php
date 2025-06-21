<?php

namespace App\Http\Controllers\Officer\Fine;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fine\OfficerUpdateFineRequest;
use App\Models\Fine;
use App\Repositories\Logger\ActivityLogger;

class HandlerFineController extends Controller
{
    protected $activityLogger;

    public function __construct(ActivityLogger $activityLogger)
    {
        $this->activityLogger = $activityLogger;
    }

    public function updateFine(OfficerUpdateFineRequest $request, $id)
    {
        $validatedData = $request->validated();

        $fine = Fine::findOrFail($id);
        $fine->update($validatedData);

        $message = 'Mempebarui denda buku.';
        $this->activityLogger->saveLog($message);

        return redirect()->back()->withSuccess('Berhasil memperbarui data denda buku.');
    }
}
