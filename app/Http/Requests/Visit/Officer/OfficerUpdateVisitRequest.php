<?php

namespace App\Http\Requests\Visit\Officer;

use Illuminate\Foundation\Http\FormRequest;

class OfficerUpdateVisitRequest extends FormRequest
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
            'status_kunjungan' => 'required|in:Menunggu persetujuan,Diterima,Ditolak',
        ];
    }

    public function messages(): array
    {
        return [
            'status_kunjungan.required' => 'Status kunjungan wajib diisi.',
            'status_kunjungan.in' => 'Status kunjungan harus salah satu dari: Menunggu persetujuan, Diterima, atau Ditolak.',
        ];
    }
}
