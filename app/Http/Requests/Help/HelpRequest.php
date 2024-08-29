<?php

namespace App\Http\Requests\Help;

use Illuminate\Foundation\Http\FormRequest;

class HelpRequest extends FormRequest
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
            'subject' => 'required|min:10|max:255',
            'kategori' => 'required|in:Fitur aplikasi,Bug,Saran,Lainnya',
            'laporan' => 'required|min:10|max:300'
        ];
    }

    public function messages()
    {
        return [
            'subject.required' => 'Subjek wajib diisi.',
            'subject.min' => 'Subjek harus memiliki minimal 10 karakter.',
            'subject.max' => 'Subjek tidak boleh lebih dari 255 karakter.',
            'kategori.required' => 'Kategori wajib dipilih.',
            'kategori.in' => 'Kategori yang dipilih tidak valid. Pilih salah satu: Fitur aplikasi, Bug, Saran, atau Lainnya.',
            'laporan.required' => 'Laporan wajib diisi.',
            'laporan.min' => 'Laporan minimal berisi 10 karakter.',
            'laporan.max' => 'Laporan tidak boleh lebih dari 300 karakter.',
        ];        
    }
}
