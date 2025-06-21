<?php

namespace App\Http\Controllers\Officer\MasterDataBook;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Fine;
use Illuminate\Http\Request;

class ManageFineBook extends Controller
{
    public function update_fine(Request $request, $id)
    {
        $validated_data = $request->validate([
            'denda_terlambat' => 'nullable|min:4|max:10',
            'denda_rusak' => 'nullable|min:4|max:10',
            'denda_tidak_kembali' => 'nullable|min:4|max:10'
        ], [
            'denda_terlambat.min' => 'Denda keterlambatan minimal harus terdiri dari :min karakter.',
            'denda_terlambat.max' => 'Denda keterlambatan maksimal boleh terdiri dari :max karakter.',

            'denda_rusak.min' => 'Denda kerusakan minimal harus terdiri dari :min karakter.',
            'denda_rusak.max' => 'Denda kerusakan maksimal boleh terdiri dari :max karakter.',

            'denda_tidak_kembali.min' => 'Denda tidak kembali minimal harus terdiri dari :min karakter.',
            'denda_tidak_kembali.max' => 'Denda tidak kembali maksimal boleh terdiri dari :max karakter.',
        ]);

        $fine = Fine::findOrFail($id);

        $fine->update($validated_data);

        $this->log('Mempebarui denda buku.');
        return redirect()->back()->withSuccess('Berhasil memperbarui data denda buku.');
    }
}
