<?php

namespace App\Http\Requests\Profile;

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
            'nama' => 'required|min:5|max:255',
            'telepon' => 'required|min:12|max:15|unique:users,telepon,' . auth()->user()->id,
            'email' => 'required|email|min:8|max:255|unique:users,email,' . auth()->user()->id,
            'alamat' => 'required|max:200',
            'image' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username ini sudah terdaftar, gunakan yang lain.',
            'username.min' => 'Username harus terdiri dari minimal 7 karakter.',
            'username.max' => 'Username tidak boleh lebih dari 15 karakter.',

            'nama.required' => 'Nama wajib diisi.',
            'nama.min' => 'Nama harus terdiri dari minimal 5 karakter.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'telepon.required' => 'Nomor telepon wajib diisi.',
            'telepon.unique' => 'Nomor telepon ini sudah terdaftar, gunakan yang lain.',
            'telepon.min' => 'Nomor telepon harus terdiri dari minimal 12 karakter.',
            'telepon.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email ini sudah terdaftar, gunakan yang lain.',
            'email.email' => 'Format email tidak valid.',
            'email.min' => 'Email harus terdiri dari minimal 8 karakter.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',

            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.max' => 'Alamat tidak boleh lebih dari 200 karakter.',

            'image.string' => 'Gambar harus berupa string yang valid.',
        ];
    }
}
