<?php

namespace App\Http\Requests\Items;

use App\Enums\Palette;
use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateRequest extends FormRequest
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
            'color_ids' => ['required', 'array'],
            'color_ids.*' => ['exists:colors,id'],
            'title' => ['required', 'string', 'min:3', 'max:100'],
            'description' => ['nullable', 'string'],
            'palette' => ['required', new Enum(Palette::class)],
            'size' => ['nullable', 'string'],
            'year' => ['required', 'integer', 'min:1900', 'max:' . date('Y')],
            'file_path' => ['nullable', 'string'],
            'category_id'=> ['integer'],
            'is_new' => ['sometimes'],
            'status' => ['required', new Enum(Status::class)],
        ];
    }

    public function getColorIds(): array
    {
        return (array) ($this->validated('color_ids'));
    }

    public function attributes(): array{
        return [
            'title' => 'Title',
            'description' => 'Description',
            'palette' => 'Palette',
            'size' => 'Size',
            'year' => 'Year',
            'category_id' => 'Category',
            'status' => 'Status',
        ];
    }
}
