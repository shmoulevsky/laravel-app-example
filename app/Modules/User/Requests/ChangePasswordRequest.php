<?php

namespace App\Modules\User\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ChangePasswordRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'id' => ['required', 'int', Rule::exists('users', 'id')],
            'password' => ['required','min:5', 'confirmed'],
            'password_old' => ['required'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => Auth::id(),
        ]);
    }

}
