<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreImageRequest extends FormRequest
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
            // 'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            // 'image.image' => 'File yang di upload harus berupa gambar',
            // 'image.mimes' => 'File yang di upload harus bertipe jpg, png, atau jpeg',
            // 'image.max' => 'Ukuran file yang kamu upload terlalu besar'
            'image.required' => 'Anda harus mengupload photo Anda',
            'image.string' => 'Anda harus mengupload photo dalam format base64'
        ];
    }
}
