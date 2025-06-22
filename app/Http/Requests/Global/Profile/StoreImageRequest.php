<?php

namespace App\Http\Requests\Global\Profile;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
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
            'image' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Anda harus mengupload photo Anda',
            'image.string' => 'Anda harus mengupload photo dalam format base64'
        ];
    }
}
