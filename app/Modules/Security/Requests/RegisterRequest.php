<?php

namespace App\Modules\Security\Requests;



use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required',  Rule::unique('users', 'phone')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'string', Password::min(5)]
        ];
    }
}
