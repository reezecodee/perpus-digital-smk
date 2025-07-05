<?php

namespace App\Http\Requests\Information;

use Illuminate\Foundation\Http\FormRequest;

class OfficerNotificationRequest extends FormRequest
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
            'penerima_id' => 'required|exists:users,id',
            'judul' => 'required|max:255',
            'pesan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'penerima_id.required' => 'Penerima harus dipilih.',
            'penerima_id.exists' => 'Penerima yang dipilih tidak valid.',
            'judul.required' => 'Judul wajib diisi.',
            'judul.max' => 'Judul tidak boleh lebih dari 255 karakter.',
            'pesan.required' => 'Pesan wajib diisi.',
        ];
    }
}
