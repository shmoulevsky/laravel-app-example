<?php

namespace App\Modules\Note\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class NoteUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'int', Rule::exists('notes', 'id')],
            'title' => ['required', 'min:3'],
            'text' => ['required', 'min:3'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('id'),
        ]);
    }

}
