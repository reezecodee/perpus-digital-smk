<?php

namespace App\Http\Requests\MasterData;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'username' => 'required|min:7|max:15|unique:users,username,' . $this->route('id'),
            'nama' => 'required|min:5|max:255',
            'nip_nis' => 'required|min:10|max:15|unique:users,nip_nis,' . $this->route('id'),
            'telepon' => 'required|min:12|max:15|unique:users,telepon,' . $this->route('id'),
            'email' => 'required|email|min:8|max:255|unique:users,email,' . $this->route('id'),
            'jk' => 'required|in:Laki-laki,Perempuan',
            'password_temporary' => 'nullable|min:8',
            'confirm_password' => 'nullable|min:8|same:password_temporary',
            'alamat' => 'required|max:200',
            'status' => 'required|in:Aktif,Nonaktif',
            'image' => 'nullable|string',
            'nisn' => 'nullable|min:10|max:10|unique:users,nisn,' . $this->route('id')
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username ini sudah terdaftar, gunakan yang lain.',
            'username.min' => 'Username harus terdiri dari minimal 7 karakter.',
            'username.max' => 'Username tidak boleh lebih dari 15 karakter.',

            'nama.required' => 'Nama wajib diisi.',
            'nama.min' => 'Nama harus terdiri dari minimal 5 karakter.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'nip_nis.required' => 'NIP/NIS wajib diisi.',
            'nip_nis.unique' => 'NIP/NIS ini sudah terdaftar, gunakan yang lain.',
            'nip_nis.min' => 'NIP/NIS harus terdiri dari minimal 10 karakter.',
            'nip_nis.max' => 'NIP/NIS tidak boleh lebih dari 15 karakter.',

            'telepon.required' => 'Nomor telepon wajib diisi.',
            'telepon.unique' => 'Nomor telepon ini sudah terdaftar, gunakan yang lain.',
            'telepon.min' => 'Nomor telepon harus terdiri dari minimal 12 karakter.',
            'telepon.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email ini sudah terdaftar, gunakan yang lain.',
            'email.email' => 'Format email tidak valid.',
            'email.min' => 'Email harus terdiri dari minimal 8 karakter.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',

            'jk.required' => 'Jenis kelamin wajib diisi.',
            'jk.in' => 'Jenis kelamin yang dipilih tidak valid.',

            'password.min' => 'Password harus terdiri dari minimal 8 karakter.',

            'confirm_password.same' => 'Konfirmasi password tidak sesuai dengan password.',
            'confirm_password.min' => 'Konfirmasi password harus terdiri dari minimal 8 karakter.',

            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.max' => 'Alamat tidak boleh lebih dari 200 karakter.',

            'status.required' => 'Status wajib diisi.',
            'status.in' => 'Status yang dipilih tidak valid.',

            'image.string' => 'Gambar harus berupa string yang valid.',

            'nisn.min' => 'NISN harus memiliki minimal 10 karakter.',
            'nisn.max' => 'NISN tidak boleh lebih dari 10 karakter.',
            'nisn.unique' => 'NISN sudah digunakan.',
        ];
    }
}
