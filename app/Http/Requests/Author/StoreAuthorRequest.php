<?php

namespace App\Http\Requests\Author;

use App\Http\Requests\Request;

class StoreAuthorRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [            
            'user_id' => 'required_without:user|integer|exists:users,id|unique:authors,user_id',
            'user' => 'required_without:user_id|array',
            'user.name' => 'required_with:user|string|max:255',
            'user.email' => 'required_with:user|string|email|max:255|unique:users,email',
            'user.password' => 'required_with:user|string|min:6',
            'user.birth_date' => 'date',
            'biography' => 'string',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required_without' => 'You must provide either user_id or user data.',
            'user_id.exists' => 'The selected user does not exist.',
            'user_id.unique' => 'This user is already an author.',
            'user.required_without' => 'You must provide either user_id or user data.',
            'user.name.required_with' => 'User name is required when creating a new user.',
            'user.email.required_with' => 'User email is required when creating a new user.',
            'user.email.unique' => 'This email is already registered.',
            'user.password.required_with' => 'User password is required when creating a new user.',
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