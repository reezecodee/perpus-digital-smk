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
        $user = Auth::user();
        if ($user->hasRole('Peminjam')) {
            return true;
        }
        return false;
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
            'nisn' => 'nullable|string|max:10|unique:users,nisn,' . $this->user()->id,
            'nama' => 'required|string|min:5|max:255',
            'email' => 'required|email|min:5|max:255|unique:users,email,' . $this->user()->id,
            'telepon' => 'required|string|min:12|max:15|unique:users,telepon,' . $this->user()->id,
            'jk' => 'required|string|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username wajib diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.max' => 'Username tidak boleh lebih dari 15 karakter.',
            'username.min' => 'Username harus memiliki minimal 5 karakter.',
            'username.unique' => 'Username sudah digunakan, pilih username lain.',

            'nip_nis.required' => 'NIS wajib diisi.',
            'nip_nis.string' => 'NIS harus berupa teks.',
            'nip_nis.max' => 'NIS tidak boleh lebih dari 20 karakter.',
            'nip_nis.unique' => 'NIS sudah digunakan, pilih NIS lain.',
            'nip_nis.required' => 'NIS wajib diisi.',
            'nip_nis.string' => 'NIS harus berupa teks.',
            'nip_nis.max' => 'NIS tidak boleh lebih dari 20 karakter.',
            'nip_nis.unique' => 'NIS sudah digunakan, pilih NIS lain.',

            'nisn.string' => 'NISN harus berupa teks.',
            'nisn.max' => 'NISN terlalu panjang, maksimal 10',
            'nip_nis.max' => 'User teralalu penjang masimal 10 karakter',
            'nip_nis.unique' => 'NIS sudah digunakan harap gunakan nis lainnya.',

            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.min' => 'Nama minimal memuat 5 karakter.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus berupa format email yang valid.',
            'email.min' => 'Email minimal memuat 5 karakter.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'email.unique' => 'Email sudah digunakan, pilih email lain.',

            'telepon.required' => 'Telepon wajib diisi.',
            'telepon.string' => 'Telepon harus berupa teks.',
            'telepon.min' => 'Telepon minimal berisi 12 karakter.',
            'telepon.max' => 'Telepon tidak boleh lebih dari 15 karakter.',
            'telepon.unique' => 'Telepon sudah digunakan, pilih telepon lain.',

            'jk.required' => 'Jenis kelamin harap di isi',
            'jk.string' => 'Jenis kelamin harus berupa teks',
            'jk.in' => 'Jenis kelamin harus berisi antara Laki-laki atau Perempuan',

            'alamat.string' => 'Alamat harus berupa teks.',
            'alamat.max' => 'Alamat tidak boleh lebih dari 500 karakter.',
        ];
    }
}
