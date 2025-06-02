<?php

namespace App\Http\Requests\MasterData;

use Illuminate\Foundation\Http\FormRequest;

class PlacementRequest extends FormRequest
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
            'buku_id' => 'required|exists:books,id',
            'jumlah_buku' => 'required|min:1|max:5',
            'buku_saat_ini' => 'required|min:1|max:5|lte:jumlah_buku'
        ];
    }

    public function messages()
    {
        return [
            'buku_id.required' => 'Buku harus dipilih.',
            'buku_id.exists' => 'Buku yang dipilih tidak valid.',

            'jumlah_buku.required' => 'Jumlah buku harus diisi.',
            'jumlah_buku.min' => 'Jumlah buku minimal 1 karakter.',
            'jumlah_buku.max' => 'Jumlah buku tidak boleh lebih dari 5 karakter.',
            
            'buku_saat_ini.required' => 'Jumlah buku saat ini harus diisi.',
            'buku_saat_ini.min' => 'Jumlah buku saat ini minimal 1 karakter.',
            'buku_saat_ini.max' => 'Jumlah buku saat ini tidak boleh lebih dari 5 karakter.',
            'buku_saat_ini.lte' => 'Jumlah buku saat ini tidak boleh lebih dari jumlah buku.',
        ];
    }
}
