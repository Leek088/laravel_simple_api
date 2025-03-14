<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Services\ApiRespose;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/status', fn(): JsonResponse => ApiRespose::success(['message' => 'API is running']));

Route::apiResource('clients', ClientController::class);

Route::post('/login', [AuthController::class, 'login']);
