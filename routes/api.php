<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CaregiverController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\AiChatController;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Get all caregivers (public - anyone can browse)
Route::get('/caregivers', [CaregiverController::class, 'index']);
Route::get('/caregivers/{id}', [CaregiverController::class, 'show']);
Route::get('/caregivers/{id}/availability', [CaregiverController::class, 'availability']);

// Protected routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    
    // Appointments
    Route::get('/appointments', [AppointmentController::class, 'index']);
    Route::post('/appointments', [AppointmentController::class, 'store']);
    Route::get('/appointments/{id}', [AppointmentController::class, 'show']);
    Route::patch('/appointments/{id}', [AppointmentController::class, 'update']);
    Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy']);
    
    // Payments
    Route::post('/payments/intent', [PaymentController::class, 'createIntent']);
    Route::get('/payments', [PaymentController::class, 'index']);
    
    // AI Chat
    Route::post('/ai/chat', [AiChatController::class, 'chat']);
    Route::get('/ai/history', [AiChatController::class, 'history']);
    Route::delete('/ai/history', [AiChatController::class, 'clear']);
});

// Stripe webhook (no auth - Stripe signs the request)
Route::post('/payments/webhook', [PaymentController::class, 'webhook']);

// Test route
Route::get('/test', function () {
    return response()->json([
        'message' => 'CareConnect API is working!',
        'timestamp' => now(),
        'version' => '1.0.0'
    ]);
});