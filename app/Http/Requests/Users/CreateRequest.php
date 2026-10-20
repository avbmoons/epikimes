<?php

namespace App\Http\Requests\Users;

use App\Enums\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rules\Password;

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
            'is_admin' => ['required', new Enum(UserRole::class)],
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'password' => ['nullable', 'string', Password::defaults()],
        ];
    }

    public function attributes(): array
    {
        return [
            'is_admin' => 'IsAdmin',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',          
        ];
    }
}
