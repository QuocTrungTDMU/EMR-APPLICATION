<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

// ✅ PUBLIC ROUTES
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/nks-login', [AuthController::class, 'nksLogin']);
    Route::post('/login-with-token', [AuthController::class, 'loginWithToken']);
});

// ✅ PROTECTED ROUTES - Cần Session Authentication
Route::middleware(['web', 'session.auth'])->prefix('auth')->group(function () {
    // Core auth routes - Tất cả user authenticated
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::get('/check-session', [AuthController::class, 'checkSession']);

    // User management - Tất cả user authenticated
    Route::post('/refresh-token', [AuthController::class, 'refreshToken']);
    Route::post('/change-password', [AuthController::class, 'changePassword']);
    Route::post('/update-info', [AuthController::class, 'nksUpdateUserInfo']);
    Route::get('/nks-user-info', [AuthController::class, 'nksUserInfo']);
});

// ✅ ROLE-BASED ROUTES - Cần role cụ thể
Route::middleware(['web', 'session.auth'])->group(function () {

    // ✅ Routes chỉ cho Patient
    Route::middleware('check.role:patient')->prefix('patient')->group(function () {
        // Route::get('/appointments', [PatientController::class, 'appointments']);
        // Route::get('/medical-records', [PatientController::class, 'medicalRecords']);
    });

    // ✅ Routes cho Admin
    Route::middleware('check.role:admin')->prefix('admin')->group(function () {
        // Route::get('/users', [AdminController::class, 'users']);
        // Route::get('/reports', [AdminController::class, 'reports']);
    });

    // ✅ Routes cho Staff (nurse, reception, etc.)
    Route::middleware('check.role:nurse,reception')->prefix('staff')->group(function () {
        // Route::get('/schedule', [StaffController::class, 'schedule']);
        // Route::get('/patients', [StaffController::class, 'patients']);
    });

    // ✅ Routes cho multiple roles
    Route::middleware('check.role:admin,nurse')->group(function () {
        // Route::get('/medical-data', [MedicalController::class, 'index']);
    });
});
