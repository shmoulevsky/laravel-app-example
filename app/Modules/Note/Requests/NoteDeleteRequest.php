<?php

namespace App\Modules\Note\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class NoteDeleteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'int', Rule::exists('notes', 'id')],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('id'),
        ]);
    }
}
