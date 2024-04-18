<?php

namespace App\Services;
use App\Models\User;
use App\Traits\ApiResponse;

class AuthService
{


    public function register($request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('PersonalAccessToken')->plainTextToken;
        $success['name'] =  $user->name;

        return $success;
    }
}
