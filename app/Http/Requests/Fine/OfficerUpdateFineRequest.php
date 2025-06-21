<?php

namespace App\Http\Requests\Fine;

use Illuminate\Foundation\Http\FormRequest;

class OfficerUpdateFineRequest extends FormRequest
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
            'denda_terlambat' => 'nullable|min:4|max:10',
            'denda_rusak' => 'nullable|min:4|max:10',
            'denda_tidak_kembali' => 'nullable|min:4|max:10'
        ];
    }

    public function messages(): array
    {
        return [
            'denda_terlambat.min' => 'Denda keterlambatan minimal harus terdiri dari :min karakter.',
            'denda_terlambat.max' => 'Denda keterlambatan maksimal boleh terdiri dari :max karakter.',

            'denda_rusak.min' => 'Denda kerusakan minimal harus terdiri dari :min karakter.',
            'denda_rusak.max' => 'Denda kerusakan maksimal boleh terdiri dari :max karakter.',

            'denda_tidak_kembali.min' => 'Denda tidak kembali minimal harus terdiri dari :min karakter.',
            'denda_tidak_kembali.max' => 'Denda tidak kembali maksimal boleh terdiri dari :max karakter.',
        ];
    }
}
