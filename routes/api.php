<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Services\ApiRespose;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/status', fn(): JsonResponse => ApiRespose::success(['message' => 'API is running']));
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function (): void {
    Route::apiResource('clients', ClientController::class);
    Route::get('/logout', [AuthController::class, 'logout']);
});
