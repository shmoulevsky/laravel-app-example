<?php

namespace App\Modules\Note\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class NoteStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:3'],
            'text' => ['required', 'min:3'],
        ];
    }

}
