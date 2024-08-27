<?php

namespace App\Http\Requests\Information;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
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
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'judul' => 'required|max:100',
            'keyword' => 'required|max:100',
            'deskripsi' => 'required',
            'konten_artikel' => 'required|max:6000',
            'visibilitas' => 'required|in:Publik,Privasi'
        ];
    }

    public function messages()
    {
        return [
            'thumbnail.image' => 'Thumbnail harus berupa file gambar.',
            'thumbnail.mimes' => 'Thumbnail harus berformat jpg, jpeg, atau png.',
            'thumbnail.max' => 'Thumbnail tidak boleh lebih dari 2MB.',

            'judul.required' => 'Judul wajib diisi.',
            'judul.max' => 'Judul tidak boleh lebih dari 100 karakter.',

            'keyword.required' => 'Kata kunci wajib diisi.',
            'keyword.max' => 'Kata kunci tidak boleh lebih dari 100 karakter.',

            'deskripsi.required' => 'Deskripsi wajib diisi.',

            'konten_artikel.required' => 'Konten artikel wajib diisi.',
            'konten_artikel.max' => 'Konten artikel tidak boleh lebih dari 6.000 karakter.',

            'visibilitas.required' => 'Visibilitas wajib diisi.',
            'visibilitas.in' => 'Visibilitas harus di antara Publik atau Privasi.'
        ];
    }
}
