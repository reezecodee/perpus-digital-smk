<?php

namespace App\Http\Requests\Information;

use Illuminate\Foundation\Http\FormRequest;

class CalendarRequest extends FormRequest
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
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'keterangan' => 'required|max:20',
            'warna' => 'required|in:Merah,Kuning,Hijau'
        ];
    }

    public function messages()
    {
        return [
            'tanggal_mulai.required' => 'Tanggal mulai harus diisi.',
            'tanggal_mulai.date' => 'Tanggal mulai harus berupa tanggal yang valid.',

            'tanggal_selesai.date' => 'Tanggal selesai harus berupa tanggal yang valid.',

            'keterangan.required' => 'Keterangan harus diisi.',
            'keterangan.max' => 'Keterangan tidak boleh lebih dari 20 karakter.',

            'warna.required' => 'Warna harus dipilih.',
            'warna.in' => 'Warna yang dipilih harus salah satu dari: Merah, Kuning, Hijau.',
        ];
    }
}
