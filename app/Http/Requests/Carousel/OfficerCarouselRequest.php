<?php

namespace App\Http\Requests\Carousel;

use Illuminate\Foundation\Http\FormRequest;

class OfficerCarouselRequest extends FormRequest
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
            'carousel_file' => 'required|mimes:png,jpg,jpeg|max:2048',
            'urutan' => 'required|numeric|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'carousel_file.required' => 'File carousel wajib diunggah.',
            'carousel_file.mimes' => 'File carousel harus berupa gambar dengan format: png, jpg, atau jpeg.',
            'carousel_file.max' => 'Ukuran file tidak boleh lebih dari 2MB.',

            'urutan.required' => 'Urutan tampilan wajib diisi.',
            'urutan.numeric' => 'Urutan tampilan harus berupa angka.',
            'urutan.min' => 'Urutan tampilan minimal bernilai 1.',
        ];
    }
}
