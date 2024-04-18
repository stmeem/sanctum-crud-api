<?php

namespace App\Services;

use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function register($request): array
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $data['token'] = $user->createToken('PersonalAccessToken')->plainTextToken;
        $data['name'] = $user->name;

        return $data;
    }

    public function login($request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $data['token'] = $user->createToken('PersonalAccessToken')->plainTextToken;
            $data['name'] = $user->name;

            return $data;
        }
    }
}
