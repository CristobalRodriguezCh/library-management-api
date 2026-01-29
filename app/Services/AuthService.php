<?php

namespace App\Services;

use App\User;
use JWTAuth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AuthService
{
    public function register(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'birth_date' => $data['birth_date'] ?? null,
            'role' => $data['role'] ?? 'user',
        ]);

        $token = JWTAuth::fromUser($user);

        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function login(array $credentials)
    {
        if (!$token = JWTAuth::attempt($credentials)) {
            throw new HttpException(401, 'Invalid credentials');
        }

        $user = JWTAuth::toUser($token);

        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return true;
    }

    public function getAuthenticatedUser()
    {
        return JWTAuth::parseToken()->authenticate();
    }
}