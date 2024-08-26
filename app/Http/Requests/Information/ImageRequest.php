<?php

namespace App\Http\Requests\Information;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
            'image' => 'required|mimes:jpg,png,jpeg|max:2048',
            'link' => 'nullable|max:255'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Gambar wajib di upload',
            'image.mimes' => 'Gambar harus berformat jpg, png, atau jpeg',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'link.max' => 'Link terlalu panjang maksimal 255 karakter'
        ];
    }
}
