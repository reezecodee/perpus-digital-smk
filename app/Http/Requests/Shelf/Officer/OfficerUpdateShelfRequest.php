<?php

namespace App\Http\Requests\Shelf\Officer;

use Illuminate\Foundation\Http\FormRequest;

class OfficerUpdateShelfRequest extends FormRequest
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
            'kode' => 'required|max:20|unique:shelves,kode,' . $this->route('id'),
            'nama_rak' => 'required|max:30',
            'kapasitas' => 'required|max:5',
        ];
    }

    public function messages(): array
    {
        return [
            'kode.unique' => 'Kode rak sudah digunakan.',
            'kode.required' => 'Kode rak wajib di isi.',
            'nama_rak.required' => 'Nama rak wajin di isi',
            'nama_rak.max' => 'Panjang maksimal nama rak adalah 30 karakter',
            'kapasitas.required' => 'Kapasitas wajib di isi',
            'kapasitas.max' => 'Panjang maksimal kapasitas adalah 5 karakter',
        ];
    }
}
