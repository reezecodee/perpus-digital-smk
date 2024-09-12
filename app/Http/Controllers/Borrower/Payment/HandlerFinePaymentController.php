<?php

namespace App\Http\Controllers\Borrower\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\PaymentRequest;
use App\Models\FinePayment;
use App\Models\Loan;
use Illuminate\Http\Request;

class HandlerFinePaymentController extends Controller
{
    /**
     * Function ini digunakan untuk menyimpan atau memperbarui pembayaran denda.
     * @param $id -> berisi ID Loan
     *
     */

    public function finePayment(PaymentRequest $request, $id)
    {
        $validatedData = $request->validated();
        $loan = Loan::findOrFail($id);

        $finePayment = FinePayment::where('peminjaman_id', $loan->id)->first();

        if ($request->hasFile('bukti_pembayaran')) {
            $filename = $this->handleFileUpload($request->file('bukti_pembayaran'), $finePayment);

            $validatedData = array_merge($validatedData, [
                'status_bayar' => 'Menunggu konfirmasi',
                'bukti_pembayaran' => $filename,
                'peminjaman_id' => $loan->id,
                'peminjam_id' => auth()->user()->id,
                'alasan_ditolak' => null
            ]);

            $this->saveOrUpdateFinePayment($finePayment, $validatedData);

            return back()->withSuccess('Pembayaran berhasil disimpan.');
        }

        return back()->with('error', 'Gagal mengunggah bukti pembayaran.');
    }

    /**
     * Mengunggah file bukti pembayaran dan menghapus file lama jika ada.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @param  FinePayment|null  $finePayment
     * @return string  Nama file yang diunggah
     */

    private function handleFileUpload($file, $finePayment)
    {
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $destinationPath = 'img/pembayaran';

        if ($finePayment && $finePayment->bukti_pembayaran) {
            $this->deleteOldFile($destinationPath, $finePayment->bukti_pembayaran);
        }

        $file->storeAs($destinationPath, $filename, 'public');

        return $filename;
    }

    /**
     * Menghapus file lama dari penyimpanan.
     *
     * @param  string  $destinationPath
     * @param  string  $oldFilename
     * @return void
     */

    private function deleteOldFile($destinationPath, $oldFilename)
    {
        $oldFilePath = public_path('storage/' . $destinationPath . '/' . $oldFilename);
        if (file_exists($oldFilePath)) {
            unlink($oldFilePath);
        }
    }

    /**
     * Menyimpan atau memperbarui data pembayaran denda.
     *
     * @param  FinePayment|null  $finePayment
     * @param  array  $validatedData
     * @return void
     */

    private function saveOrUpdateFinePayment($finePayment, array $validatedData)
    {
        if ($finePayment) {
            $finePayment->update($validatedData);
        } else {
            FinePayment::create($validatedData);
        }
    }
}
