<?php

namespace App\Http\Requests\MasterData;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'kategori_id' => 'required|exists:categories,id',
            'judul' => 'required|max:255',
            'author' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'isbn' => 'required|max:255',
            'tgl_terbit' => 'required|max:255',
            'jml_halaman' => 'required',
            'bahasa' => 'required|max:255',
            'cover_buku' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'e_book_file' => 'nullable|file|mimes:pdf',
            'sinopsis' => 'required|max:5000',
            'status' => 'required|in:Tersedia,Tidak tersedia',
        ];
    }

    public function messages()
    {
        return [
            'kategori_id.required' => 'Kategori harus dipilih.',
            'kategori_id.exists' => 'Kategori yang dipilih tidak valid.',
            'judul.required' => 'Judul buku harus diisi.',
            'judul.max' => 'Judul buku tidak boleh lebih dari 255 karakter.',
            'author.required' => 'Nama pengarang harus diisi.',
            'author.max' => 'Nama pengarang tidak boleh lebih dari 255 karakter.',
            'penerbit.required' => 'Nama penerbit harus diisi.',
            'penerbit.max' => 'Nama penerbit tidak boleh lebih dari 255 karakter.',
            'isbn.required' => 'Nomor ISBN harus diisi.',
            'isbn.max' => 'Nomor ISBN tidak boleh lebih dari 255 karakter.',
            'tgl_terbit.required' => 'Tanggal terbit harus diisi.',
            'tgl_terbit.max' => 'Tanggal terbit tidak boleh lebih dari 255 karakter.',
            'jml_halaman.required' => 'Jumlah halaman harus diisi.',
            'bahasa.required' => 'Bahasa harus diisi.',
            'bahasa.max' => 'Bahasa tidak boleh lebih dari 255 karakter.',
            'cover_buku.image' => 'Cover buku harus berupa gambar.',
            'cover_buku.mimes' => 'Cover buku harus bertipe jpeg, png, atau jpg.',
            'cover_buku.max' => 'Cover buku tidak boleh lebih dari 2 MB.',
            'e_book_file.file' => 'File e-book harus diunggah.',
            'e_book_file.mimes' => 'File e-book harus bertipe pdf.',
            'sinopsis.required' => 'Sinopsis harus diisi.',
            'sinopsis.max' => 'Sinopsis tidak boleh lebih dari 5000 karakter.',
            'format.required' => 'Format buku harus dipilih.',
            'format.in' => 'Format buku harus salah satu dari Fisik atau Elektronik.',
            'status.required' => 'Status buku harus dipilih.',
            'status.in' => 'Status buku harus salah satu dari Tersedia atau Tidak tersedia.',
        ];
    }
}
