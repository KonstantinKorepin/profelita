<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMasterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'profile_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'list_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }
}
