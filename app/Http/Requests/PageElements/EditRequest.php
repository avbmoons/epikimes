<?php

namespace App\Http\Requests\PageElements;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'title' => ['nullable', 'string'],
            'color' => ['required', 'string'],
            'image' => ['nullable'],    // 'image', 'mimes:jpeg,png,jpg,gif,svg,webp'],
        ];
    }
}
