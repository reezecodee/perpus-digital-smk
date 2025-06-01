<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePeminjamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->hasRole('Siswa');
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|string|max:15|min:5|unique:users,username,' . $this->user()->id,
            'nip_nis' => 'required|string|max:20|unique:users,nip_nis,' . $this->user()->id,
            'nisn' => 'required|string|size:10|unique:users,nisn,' . $this->user()->id,
            'nama' => 'required|string|min:5|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->user()->id,
            'telepon' => 'required|string|min:12|max:15|unique:users,telepon,' . $this->user()->id,
            'jk' => 'required|string|in:Laki-laki,Perempuan',
            'alamat' => 'required|string|max:500',
        ];

    }

    public function messages()
    {
        return [
            'username.required' => 'Username wajib diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.min' => 'Username harus memiliki minimal 5 karakter.',
            'username.max' => 'Username tidak boleh lebih dari 15 karakter.',
            'username.unique' => 'Username sudah terdaftar, silakan gunakan username lain.',

            'nip_nis.required' => 'NIP/NIS wajib diisi.',
            'nip_nis.string' => 'NIP/NIS harus berupa teks.',
            'nip_nis.max' => 'NIP/NIS tidak boleh lebih dari 20 karakter.',
            'nip_nis.unique' => 'NIP/NIS sudah terdaftar, silakan gunakan NIP/NIS lain.',

            'nisn.required' => 'NISN harus wajib disi.',
            'nisn.string' => 'NISN harus berupa teks.',
            'nisn.size' => 'NISN harus terdiri dari 10 karakter.',
            'nisn.unique' => 'NISN sudah terdaftar, silakan gunakan NISN lain.',

            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.min' => 'Nama harus memiliki minimal 5 karakter.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'email.unique' => 'Email sudah terdaftar, silakan gunakan email lain.',

            'telepon.required' => 'Nomor telepon wajib diisi.',
            'telepon.string' => 'Nomor telepon harus berupa teks.',
            'telepon.min' => 'Nomor telepon harus memiliki minimal 12 karakter.',
            'telepon.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',
            'telepon.unique' => 'Nomor telepon sudah terdaftar, silakan gunakan nomor telepon lain.',

            'jk.required' => 'Jenis kelamin wajib dipilih.',
            'jk.in' => 'Jenis kelamin yang dipilih tidak valid.',

            'alamat.required' => 'Alamat harus wajib disi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'alamat.max' => 'Alamat tidak boleh lebih dari 500 karakter.',
        ];
    }
}
