<?php

namespace Modules\Notes\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|string|max:100',
            'reference_id' => 'nullable|integer',
            'tags' => 'nullable|string',
            'quantity' => 'nullable|numeric',
            'amount' => 'nullable|numeric',
        ];
    }
}
