<?php

namespace App\Http\Requests\Loan;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
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
            'penempatan_id' => 'required|exists:placements,id',
            'jatuh_tempo' => 'required|date|after_or_equal:today',
            'keterangan' => 'nullable|min:10|max:200',
        ];
    }

    public function messages()
    {
        return [
            'penempatan_id.required' => 'Harap pilih rak buku terlebih dahulu.',
            'penempatan_id.exists' => 'Rak yang dipilih tidak valid.',
            'jatuh_tempo.required' => 'Tanggal jatuh tempo harus diisi.',
            'jatuh_tempo.date' => 'Tanggal jatuh tempo harus berupa format tanggal yang valid.',
            'jatuh_tempo.after_or_equal' => 'Tanggal jatuh tempo tidak boleh sebelum hari ini.',
            'keterangan.min' => 'Keterangan harus memiliki minimal 10 karakter.',
            'keterangan.max' => 'Keterangan tidak boleh lebih dari 200 karakter.',
        ];
    }
}
