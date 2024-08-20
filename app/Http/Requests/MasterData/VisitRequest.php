<?php

namespace App\Http\Requests\MasterData;

use Illuminate\Foundation\Http\FormRequest;

class VisitRequest extends FormRequest
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
            'pengunjung_id' => 'required|exists:users,id',
            'tanggal_kunjungan' => 'required|date',
            'status_kunjungan' => 'required|in:Menunggu persetujuan,Diterima,Ditolak',
            'keterangan_kunjungan' => 'required|max:50'
        ];
    }

    public function messages()
    {
        return [
            'pengunjung_id.required' => 'Pengunjung harus dipilih.',
            'pengunjung_id.exist' => 'Pengunjung yang dipilih tidak valid.',
            'tanggal_kunjungan.required' => 'Tanggal kunjungan harus diisi.',
            'tanggal_kunjungan.date' => 'Tanggal kunjungan harus berupa tanggal yang valid.',
            'status_kunjungan.required' => 'Status kunjungan harus diisi.',
            'status_kunjungan.in' => 'Status kunjungan yang dipilih tidak valid. Pilih salah satu dari: Menunggu persetujuan, Diterima, Ditolak.',
            'keterangan_kunjungan.required' => 'Keterangan kunjungan harus diisi.',
            'keterangan_kunjungan.max' => 'Keterangan kunjungan tidak boleh lebih dari 50 karakter.',
        ];
    }
}
