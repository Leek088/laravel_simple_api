<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Services\ApiRespose;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

//routes public
Route::get('/status', fn(): JsonResponse => ApiRespose::success(['message' => 'API is running']));
Route::post('/login', [AuthController::class, 'login']);

//Routes auth
Route::middleware('auth:sanctum')->group(function (): void {
    //Routes clients
    Route::get('/clients', [ClientController::class, 'index'])->middleware('ability:clients.index');
    Route::get('/clients/{id}', [ClientController::class, 'show'])->middleware('ability:clients.show');
    Route::post('/clients', [ClientController::class, 'store'])->middleware('ability:clients.store');
    Route::put('/clients/{id}', [ClientController::class, 'update'])->middleware('ability:clients.update');
    Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->middleware('ability:clients.destroy');
    //Route logout
    Route::get('/logout', [AuthController::class, 'logout']);
});
