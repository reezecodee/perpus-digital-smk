<?php

namespace App\Http\Requests\MasterData;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'nama_sekolah' => 'required|max:50',
            'keyword' => 'required|max:255',
            'hak_cipta' => 'required|max:255',
            'web_sekolah' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'favicon' => 'nullable|image|mimes:ico,png,jpg,jpeg|max:2048'
        ];
    }
}
