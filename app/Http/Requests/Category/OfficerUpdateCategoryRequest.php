<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class OfficerUpdateCategoryRequest extends FormRequest
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
            'nama_kategori' => 'required|max:20|unique:categories,nama_kategori,' . $this->route('id'),
            'keterangan' => 'nullable|max:50'
        ];
    }

    public function messages(): array
    {
        return [
            'nama_kategori.unique' => 'Nama kategori sudah digunakan.',
            'nama_kategori.required' => 'Nama kategori wajib di isi.',
            'nama_kategori.max' => 'Panjang maksimal nama kategori adalah 20 karakter',
            'keterangan.max' => 'Panjang maksimal keterangan adalah 50 karakter',
        ];
    }
}
