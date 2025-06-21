<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'nama_sekolah' => 'required|max:255',
            'nama_perpustakaan' => 'required|max:255',
            'email' => 'required|max:255',
            'telepon' => 'required|max:15|min:12',
            'keyword' => 'required|max:255',
            'website' => 'required|max:255',
            'jam_buka' => 'required|max:255',
            'jam_tutup' => 'required|max:255',
            'hari_libur' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'alamat' => 'required|max:255',
            'favicon' => 'nullable|mimes:png,ico',
            'logo_sekolah' => 'nullable|mimes:png,jpg,jpeg',
            'logo_perpus' => 'nullable|mimes:png,jpg,jpeg',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_sekolah.required' => 'Nama sekolah wajib diisi.',
            'nama_sekolah.max' => 'Nama sekolah tidak boleh lebih dari 255 karakter.',

            'nama_perpustakaan.required' => 'Nama perpustakaan wajib diisi.',
            'nama_perpustakaan.max' => 'Nama perpustakaan tidak boleh lebih dari 255 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',

            'telepon.required' => 'Nomor telepon wajib diisi.',
            'telepon.max' => 'Nomor telepon tidak boleh lebih dari 15 digit.',
            'telepon.min' => 'Nomor telepon minimal 12 digit.',

            'keyword.required' => 'Keyword wajib diisi.',
            'keyword.max' => 'Keyword tidak boleh lebih dari 255 karakter.',

            'website.required' => 'Website wajib diisi.',
            'website.max' => 'Website tidak boleh lebih dari 255 karakter.',

            'jam_buka.required' => 'Jam buka wajib diisi.',
            'jam_buka.max' => 'Jam buka tidak boleh lebih dari 255 karakter.',

            'jam_tutup.required' => 'Jam tutup wajib diisi.',
            'jam_tutup.max' => 'Jam tutup tidak boleh lebih dari 255 karakter.',

            'hari_libur.required' => 'Hari libur wajib diisi.',
            'hari_libur.max' => 'Hari libur tidak boleh lebih dari 255 karakter.',

            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'deskripsi.max' => 'Deskripsi tidak boleh lebih dari 255 karakter.',

            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.max' => 'Alamat tidak boleh lebih dari 255 karakter.',

            'favicon.required' => 'Favicon wajib diunggah.',
            'favicon.mimes' => 'Favicon harus berupa file dengan format PNG atau ICO.',

            'logo_sekolah.required' => 'Logo sekolah wajib diunggah.',
            'logo_sekolah.mimes' => 'Logo sekolah harus berupa file PNG, JPG, atau JPEG.',

            'logo_perpus.required' => 'Logo perpustakaan wajib diunggah.',
            'logo_perpus.mimes' => 'Logo perpustakaan harus berupa file PNG, JPG, atau JPEG.',
        ];
    }
}
