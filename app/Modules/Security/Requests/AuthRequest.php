<?php

namespace App\Modules\Security\Requests;


use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'login' => ['required', 'min:3'],
            'password' => ['required', 'min:5']
        ];
    }
}
