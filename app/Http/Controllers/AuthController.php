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
        //teste
        $user = auth()->user();
        $token = $user->createToken($user->name, ['*'], now()->addHour())->plainTextToken;

        return ApiRespose::success([
            'message' => 'user looged successfully',
            'token' => $token,
            'user' => $user
        ]);
    }

    public function logout(): JsonResponse
    {
        auth()->user()->tokens()->delete();

        return ApiRespose::success(['message' => 'user logout successfully']);
    }
}
