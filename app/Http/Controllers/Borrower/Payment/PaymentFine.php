<?php

namespace App\Http\Controllers\Borrower\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\PaymentRequest;
use App\Models\FinePayment;
use App\Models\Loan;
use Illuminate\Http\Request;

class PaymentFine extends Controller
{
    public function show_payment($id)
    {
        $data = Loan::findOrFail($id);

        if (!$data || $data->status != 'Terkena denda' || $data->keterangan_denda == 'Tidak ada') {
            abort(404);
        }

        return view('borrower-pages.payment.fine-payment', [
            'title' => 'Pembayaran Denda',
            'data' => $data,
        ]);
    }

    // Logical Backend Here...

    public function fine_payment(PaymentRequest $request, $id)
    {
        $validated_data = $request->validated();
        $loan = Loan::findOrFail($id);

        $finePayment = FinePayment::where('peminjaman_id', $loan->id)->first();

        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'img/pembayaran';

            if ($finePayment && $finePayment->bukti_pembayaran) {
                $oldFilePath = public_path('storage/' . $destinationPath . '/' . $finePayment->bukti_pembayaran);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $file->storeAs($destinationPath, $filename, 'public');

            $validated_data['bukti_pembayaran'] = $filename;
            $validated_data['peminjaman_id'] = $loan->id;
            $validated_data['peminjam_id'] = auth()->user()->id;

            if ($finePayment) {
                $finePayment->update($validated_data);
            } else {
                FinePayment::create($validated_data);
            }

            return back()->withSuccess('Pembayaran berhasil disimpan.');
        }

        return back()->with('error', 'Gagal mengunggah bukti pembayaran.');
    }
}
