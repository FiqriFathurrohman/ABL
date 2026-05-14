<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PetaniAuthController; // WAJIB ADA
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// Redirection awal (opsional)
Route::get('/', function () {
    return redirect()->route('login');
});

// --- Authentication Routes ---
// Login
Route::get('/login', [PetaniAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [PetaniAuthController::class, 'login']);
Route::post('/logout', [PetaniAuthController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [PetaniAuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [PetaniAuthController::class, 'register']);

// --- Email Verification Routes ---
Route::get('/email/verify', function () {
    return view('auth.verify-email'); 
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

// --- Protected Routes (Hanya untuk yang sudah login & verif email) ---
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index'); // Sesuaikan dengan view dashboard kamu
    })->name('dashboard');
});