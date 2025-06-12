<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/nks-login', [AuthController::class, 'nksLogin']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/logout-all', [AuthController::class, 'logoutAll']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/refresh-token', [AuthController::class, 'refreshToken']);
    Route::post('/change-password', [AuthController::class, 'changePassword']);

    // NKS API routes
    Route::post('/nks-user-info', [AuthController::class, 'nksUserInfo']);
    Route::post('/nks-update-info', [AuthController::class, 'nksUpdateUserInfo']);
   // Route::middleware('auth:sanctum')->post('/api/nks-user-info', [AuthController::class, 'nksUserInfo']);
});
