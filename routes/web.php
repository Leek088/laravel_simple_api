<?php

use App\Services\ApiRespose;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/', fn(): JsonResponse => ApiRespose::success(['message' => 'Welcome to the API']));
