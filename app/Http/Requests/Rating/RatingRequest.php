<?php

namespace App\Http\Requests\Rating;

use Illuminate\Foundation\Http\FormRequest;

class RatingRequest extends FormRequest
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
            'buku_id' => 'required|exists:books,id',
            'peminjam_id' => 'required|exists:users,id',
            'rating' => 'required|integer|in:1,2,3,4,5',
            'komentar' => 'required|min:5|max:100'
        ];
    }

    public function messages()
    {
        return [
            'buku_id.required' => 'Buku harus di isi',
            'buku_id.exists' => 'Buku tidak terdaftar di sistem',

            'peminjam_id.required' => 'Peminjam harus ada',
            'peminjam_id.exists' => 'Peminjam tidak terdaftar di sistem',

            'rating.required' => 'Kolom rating harus diisi.',
            'rating.integer' => 'Rating harus berupa angka.',
            'rating.in' => 'Rating hanya boleh antara 1 sampai 5.',
            
            'komentar.required' => 'Kolom komentar harus diisi.',
            'komentar.min' => 'Komentar harus memiliki minimal 5 karakter.',
            'komentar.max' => 'Komentar tidak boleh lebih dari 100 karakter.',
        ];        
    }
}
