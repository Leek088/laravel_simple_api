<?php

namespace App\Http\Controllers;

use App\Services\ApiRespose;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $attempt = auth()->attempt($request->only('email', 'password'));

        if (!$attempt) {
            return ApiRespose::unauthorized(['message' => 'e-mail or password incorrect']);
        }

        $user = auth()->user();
        $token = $user->createToken($user->name)->plainTextToken;

        return ApiRespose::success([
            'message' => 'user looged successfully',
            'token' => $token,
            'user' => $user
        ]);
    }
}
