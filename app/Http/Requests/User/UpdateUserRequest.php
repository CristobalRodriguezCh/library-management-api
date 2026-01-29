<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class UpdateUserRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = $this->route('users');
        
        return [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $userId,
            'password' => 'sometimes|required|string|min:6|confirmed',
            'birth_date' => 'date',
            'role' => 'in:admin,author,user',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'The password field is required.',
            'password.min' => 'Password must be at least 6 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
            'role.in' => 'Role must be admin, author, or user.',
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