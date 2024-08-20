<?php

namespace App\Http\Requests\MasterData;

use Illuminate\Foundation\Http\FormRequest;

class PerpustakaanRequest extends FormRequest
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
            'nama_perpustakaan' => 'required|max:255',
            'telepon' => 'required|min:12|max:15',
            'email' => 'required|max:255|email',
            'operasional_buka' => 'required|max:255',
            'operasional_tutup' => 'required|max:255',
            'website' => 'required|max:255',
            'instagram' => 'required|max:255',
            'facebook' => 'required|max:255',
            'twitter_x' => 'required|max:255',
            'alamat' => 'required|max:300',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'nama_perpustakaan.required' => 'Nama perpustakaan wajib diisi.',
            'nama_perpustakaan.max' => 'Nama perpustakaan tidak boleh lebih dari 255 karakter.',

            'telepon.required' => 'Nomor telepon wajib diisi.',
            'telepon.min' => 'Nomor telepon harus terdiri dari minimal 12 karakter.',
            'telepon.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',

            'email.required' => 'Alamat email wajib diisi.',
            'email.max' => 'Alamat email tidak boleh lebih dari 255 karakter.',
            'email.email' => 'Alamat email harus berupa alamat email yang valid.',

            'operasional_buka.required' => 'Jam operasional buka wajib diisi.',
            'operasional_buka.max' => 'Jam operasional buka tidak boleh lebih dari 255 karakter.',

            'operasional_tutup.required' => 'Jam operasional tutup wajib diisi.',
            'operasional_tutup.max' => 'Jam operasional tutup tidak boleh lebih dari 255 karakter.',

            'website.required' => 'Alamat website wajib diisi.',
            'website.max' => 'Alamat website tidak boleh lebih dari 255 karakter.',

            'instagram.required' => 'Link Instagram wajib diisi.',
            'instagram.max' => 'Link Instagram tidak boleh lebih dari 255 karakter.',

            'facebook.required' => 'Link Facebook wajib diisi.',
            'facebook.max' => 'Link Facebook tidak boleh lebih dari 255 karakter.',

            'twitter_x.required' => 'Link Twitter/X wajib diisi.',
            'twitter_x.max' => 'Link Twitter/X tidak boleh lebih dari 255 karakter.',

            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.max' => 'Alamat tidak boleh lebih dari 300 karakter.',

            'logo.nullable' => 'Logo tidak wajib diunggah.',
            'logo.image' => 'Logo harus berupa gambar.',
            'logo.mimes' => 'Logo harus berupa file dengan format: png, jpg, atau jpeg.',
            'logo.max' => 'Ukuran logo tidak boleh lebih dari 2MB.'
        ];
    }
}
