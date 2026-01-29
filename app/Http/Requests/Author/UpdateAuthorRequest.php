<?php

namespace App\Http\Requests\Author;

use App\Http\Requests\Request;

class UpdateAuthorRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'biography' => 'string',
        ];
    }

    public function messages()
    {
        return [
            'biography.string' => 'Biography must be a string.',
        ];
    }

    public function response(array $errors)
    {
        return response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'errors' => $errors
        ], 422);
    }
}