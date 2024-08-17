<?php

namespace App\Http\Requests\MasterData;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'cover_buku' => 'required',
            'e_book_file' => 'nullable',
            'sinopsis' => 'required',
            'format' => 'required|in:Fisik,Elektronik',
            'status' => 'required|in:Tersedia,Tidak tersedia'
        ];
    }

    public function messages()
    {
        return [
            'kategori_id.required' => 'Kategori wajib dipilih.',
            'kategori_id.exists' => 'Kategori yang dipilih tidak valid.',
            
            'judul.required' => 'Judul buku wajib diisi.',
            'judul.max' => 'Judul buku tidak boleh lebih dari 255 karakter.',
            
            'author.required' => 'Nama penulis wajib diisi.',
            'author.max' => 'Nama penulis tidak boleh lebih dari 255 karakter.',
            
            'penerbit.required' => 'Nama penerbit wajib diisi.',
            'penerbit.max' => 'Nama penerbit tidak boleh lebih dari 255 karakter.',
            
            'isbn.required' => 'ISBN buku wajib diisi.',
            'isbn.max' => 'ISBN tidak boleh lebih dari 255 karakter.',
            
            'tgl_terbit.required' => 'Tanggal terbit wajib diisi.',
            'tgl_terbit.max' => 'Tanggal terbit tidak boleh lebih dari 255 karakter.',
            
            'jml_halaman.required' => 'Jumlah halaman wajib diisi.',
            
            'bahasa.required' => 'Bahasa buku wajib diisi.',
            'bahasa.max' => 'Bahasa tidak boleh lebih dari 255 karakter.',
            
            'cover_buku.required' => 'Cover buku wajib diunggah.',
            
            'e_book_file.nullable' => 'File e-book boleh kosong.',
            
            'sinopsis.required' => 'Sinopsis buku wajib diisi.',
            
            'format.required' => 'Format buku wajib dipilih.',
            'format.in' => 'Format buku harus berupa Fisik atau Elektronik.',
            
            'status.required' => 'Status buku wajib dipilih.',
            'status.in' => 'Status buku harus berupa Tersedia atau Tidak tersedia.'
        ];        
    }
}
