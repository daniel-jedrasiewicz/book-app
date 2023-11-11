<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'author.name' => 'required|min:2|max:255|regex:/^[a-zA-Z]+$/',
            'author.surname' => 'required|min:2|max:255|regex:/^[a-zA-Z]+$/',
            'book.title' => 'required|min:2|max:255',
            'book.description' => 'required|min:2|max:500',
            'selected_author_id' => 'nullable',
        ];
    }
}
