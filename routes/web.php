<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CaregiverController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AiAssistantController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Landing page
Route::get('/', fn() => view('landing'))->name('home');

// Static / legal pages
Route::get('/about',   fn() => view('about'))->name('about');
Route::get('/pricing', fn() => view('pricing'))->name('pricing');
Route::get('/terms',   fn() => view('terms'))->name('terms');
Route::get('/privacy', fn() => view('privacy'))->name('privacy');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

// Login
Route::get('/login',  [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Register
Route::get('/register',  [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Logout (POST for security — use a form with @csrf in your blade)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Password reset
Route::get('/forgot-password', fn() => view('auth.forgot-password'))->name('password.request');

// Social / M-Pesa auth (add controllers when implementing)
Route::get('/auth/google',          fn() => redirect('/register'))->name('auth.google');
Route::get('/auth/google/callback', fn() => redirect('/dashboard'))->name('auth.google.callback');

/*
|--------------------------------------------------------------------------
| Authenticated Routes (require login)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Dashboard / Home
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ── Caregivers ──────────────────────────────────────────────────────
    Route::prefix('caregivers')->name('caregivers.')->group(function () {
        Route::get('/',                        [CaregiverController::class, 'index'])->name('index');
        Route::get('/{caregiver}',             [CaregiverController::class, 'show'])->name('show');
        Route::get('/{caregiver}/rebook',      [CaregiverController::class, 'rebook'])->name('rebook');
        Route::post('/{caregiver}/favourite',  [CaregiverController::class, 'toggleFavourite'])->name('favourite');
    });

    // ── Appointments ────────────────────────────────────────────────────
    Route::prefix('appointments')->name('appointments.')->group(function () {
        Route::get('/',           [AppointmentController::class, 'index'])->name('index');
        Route::get('/book',       [AppointmentController::class, 'create'])->name('create');
        Route::post('/',          [AppointmentController::class, 'store'])->name('store');
        Route::get('/{appointment}',        [AppointmentController::class, 'show'])->name('show');
        Route::patch('/{appointment}/cancel',[AppointmentController::class, 'cancel'])->name('cancel');
    });

    // ── Payments & Billing ──────────────────────────────────────────────
    Route::prefix('payments')->name('payments.')->group(function () {
        Route::get('/',          [PaymentController::class, 'index'])->name('index');
        Route::get('/topup',     [PaymentController::class, 'topup'])->name('topup');
        Route::post('/topup',    [PaymentController::class, 'processTopup'])->name('topup.process');
        Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
        // M-Pesa STK push callback (called by Safaricom — no auth middleware needed below)
    });

    // ── Reviews ─────────────────────────────────────────────────────────
    Route::prefix('reviews')->name('reviews.')->group(function () {
        Route::get('/',                    [ReviewController::class, 'index'])->name('index');
        Route::post('/{appointment}',      [ReviewController::class, 'store'])->name('store');
    });

    // ── AI Assistant ────────────────────────────────────────────────────
    Route::prefix('ai-assistant')->name('ai.')->group(function () {
        Route::get('/',    [AiAssistantController::class, 'index'])->name('index');
        Route::post('/chat', [AiAssistantController::class, 'chat'])->name('chat');
    });

    // ── Settings ────────────────────────────────────────────────────────
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/',             [SettingsController::class, 'index'])->name('index');
        Route::patch('/profile',    [SettingsController::class, 'updateProfile'])->name('profile');
        Route::patch('/location',   [SettingsController::class, 'updateLocation'])->name('location');
        Route::patch('/password',   [SettingsController::class, 'updatePassword'])->name('password');
        Route::patch('/notifications', [SettingsController::class, 'updateNotifications'])->name('notifications');
    });

    // ── Help ─────────────────────────────────────────────────────────────
    Route::get('/help', fn() => view('help'))->name('help');

});

/*
|--------------------------------------------------------------------------
| Caregiver-Only Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:caregiver'])->prefix('my-profile')->name('caregiver.')->group(function () {
    Route::get('/',             [CaregiverController::class, 'editProfile'])->name('profile');
    Route::patch('/',           [CaregiverController::class, 'updateProfile'])->name('profile.update');
    Route::get('/availability', [CaregiverController::class, 'availability'])->name('availability');
    Route::patch('/availability',[CaregiverController::class, 'updateAvailability'])->name('availability.update');
    Route::get('/earnings',     [CaregiverController::class, 'earnings'])->name('earnings');
});

/*
|--------------------------------------------------------------------------
| Webhook Routes (no auth, no CSRF — add to VerifyCsrfToken $except)
|--------------------------------------------------------------------------
*/

Route::prefix('webhooks')->name('webhooks.')->group(function () {
    Route::post('/mpesa/callback', [PaymentController::class, 'mpesaCallback'])->name('mpesa');
});
?>