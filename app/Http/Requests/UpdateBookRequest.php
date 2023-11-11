<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'book.title' => 'required|min:2|max:255',
            'book.description' => 'required|min:2|max:500',
            'author_id' => 'required'
        ];
    }
}
