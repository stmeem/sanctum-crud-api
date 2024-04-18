<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;


class AuthController extends Controller
{
    use ApiResponse;
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $data = $this->authService->register($request);
        return $this->sendResponse($data, 'User registered successfully.');
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $data = $this->authService->login($request);
        if($data){
            return $this->sendResponse($data, 'Login Successful');
        } else {
            return $this->sendError('User credentials did not match.', 401);
        }

    }
}
