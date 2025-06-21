<?php

namespace App\Http\Requests\Visit\Student;

use Illuminate\Foundation\Http\FormRequest;

class StudentVisitRequest extends FormRequest
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
            'keterangan_kunjungan' => 'required|min:15|max:200',
            'ttd' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'keterangan_kunjungan.required' => 'Keterangan wajib di isi',
            'keterangan_kunjungan.min' => 'Keterangan minimal berisi 15 karakter',
            'keterangan_kunjungan.max' => 'Keterangan maksimal berisi 200 karakter',
            'ttd.required' => 'Anda harus menyetujui ketentuan kunjungan'
        ];
    }
}
