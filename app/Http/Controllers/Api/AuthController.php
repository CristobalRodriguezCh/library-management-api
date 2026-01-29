<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Services\AuthService;
use App\Http\Requests\Auth\{RegisterRequest,LoginRequest};

class AuthController extends Controller
{

    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
   
    /**
     * @param  RegisterRequest $request
     * @return Response
     */
    public function register(RegisterRequest $request)
    {
        try {
            $result = $this->authService->register($request->all());

            return response()->json([
                'success' => true,
                'message' => 'User registered successfully',
                'data' => $result
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Registration failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @param  LoginRequest $request
     * @return Response
     */
    public function login(LoginRequest $request)
    {
        try {
            $result = $this->authService->login($request->only('email', 'password'));

            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'data' => $result
            ], 200);
        } catch (HttpException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], $e->getStatusCode());
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Could not create token'
            ], 500);
        }
    }

    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json(['message' => 'Logout successful'], 200);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Failed to logout'], 500);
        }
    }
}
