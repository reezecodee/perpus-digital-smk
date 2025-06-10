<?php

namespace App\Http\Requests\MasterData;

use Illuminate\Foundation\Http\FormRequest;

class PeminjamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'peminjam_id' => 'required|exists:users,id',
            'penempatan_id' => 'required|exists:placements,id',
            'buku_id' => 'required|exists:books,id',
            'peminjaman' => 'required|date',
            'pengembalian' => 'required|date|after_or_equal:peminjaman',
            'jatuh_tempo' => 'required|date|after_or_equal:peminjaman',
            'keterangan_denda' => 'nullable|string',
            'status' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'peminjam_id.required' => 'Peminjam harus dipilih.',
            'peminjam_id.exists' => 'Peminjam yang dipilih tidak valid.',
            'penempatan_id.required' => 'Penempatan buku harus dipilih.',
            'penempatan_id.exists' => 'Penempatan buku yang dipilih tidak valid.',
            'buku_id.required' => 'Buku harus dipilih.',
            'buku_id.exists' => 'Buku yang dipilih tidak valid.',
            'peminjaman.required' => 'Tanggal peminjaman harus diisi.',
            'peminjaman.date' => 'Tanggal peminjaman harus berupa tanggal yang valid.',
            'pengembalian.required' => 'Tanggal pengembalian harus diisi.',
            'pengembalian.date' => 'Tanggal pengembalian harus berupa tanggal yang valid.',
            'pengembalian.after_or_equal' => 'Tanggal pengembalian harus setelah atau sama dengan tanggal peminjaman.',
            'jatuh_tempo.required' => 'Tanggal jatuh tempo harus diisi.',
            'jatuh_tempo.date' => 'Tanggal jatuh tempo harus berupa tanggal yang valid.',
            'jatuh_tempo.after_or_equal' => 'Tanggal jatuh tempo harus setelah atau sama dengan tanggal peminjaman.',
            'keterangan_denda.string' => 'Keterangan harus berupa teks.',
        ];
    }
}
