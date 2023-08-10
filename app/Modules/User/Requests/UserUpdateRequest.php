<?php

namespace App\Modules\User\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class UserUpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'id' => ['required', 'int', Rule::exists('users', 'id')],
            'name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required',  Rule::unique('users', 'phone')->ignore($this->id)],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->id)],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => Auth::id(),
        ]);
    }

}
