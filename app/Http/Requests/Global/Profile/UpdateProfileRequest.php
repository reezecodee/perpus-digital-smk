<?php

namespace App\Http\Requests\Global\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'username' => 'required|min:7|max:15|unique:users,username,' . auth()->user()->id,
            'image' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Username wajib diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.min' => 'Username harus memiliki minimal 5 karakter.',
            'username.max' => 'Username tidak boleh lebih dari 15 karakter.',
            'username.unique' => 'Username sudah terdaftar, silakan gunakan username lain.', 

            'image.string' => 'Gambar harus berupa string yang valid.',
        ];
    }
}
