<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class ApiRespose
{
    public static function success(array $data): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public static function notFound(array $data): JsonResponse
    {
        return response()->json([
            'status' => 'not found',
            'data' => $data
        ], 404);
    }

    public static function badRequest(array $data): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'data' => $data
        ], 400);
    }

    public static function created(array $data): JsonResponse
    {
        return response()->json([
            'status' => 'created',
            'data' => $data
        ], 201);
    }

    public static function unauthorized(array $data): JsonResponse
    {
        return response()->json([
            'status' => 'unauthorized',
            'data' => $data
        ], 401);
    }
}
