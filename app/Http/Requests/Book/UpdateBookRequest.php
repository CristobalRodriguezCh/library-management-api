<?php

namespace App\Http\Requests\Book;

use App\Http\Requests\Request;

class UpdateBookRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $bookId = $this->route('books');
        
        return [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'string',
            'published_date' => 'nullable|date',
            'isbn' => 'string|unique:books,isbn,' . $bookId,
            'author_id' => 'sometimes|required|integer|exists:authors,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'isbn.unique' => 'This ISBN is already registered.',
            'author_id.required' => 'The author ID is required.',
            'author_id.exists' => 'The selected author does not exist.',
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