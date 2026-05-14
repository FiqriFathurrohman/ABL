<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes - Tera Tani
|--------------------------------------------------------------------------
*/

// Halaman Utama / Login User
Route::get('/', function () {
    return view('auth.login');
})->name('login');

/**
 * Akses Registrasi: 
 * Diletakkan di luar middleware 'guest' agar Admin tetap bisa 
 * melihat halaman ini tanpa terkena redirectUsersTo dari bootstrap/app.php.
 */
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

// Rute khusus untuk pengunjung yang BELUM login
Route::middleware('guest')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Rute khusus untuk User yang SUDAH login & SUDAH di-approve
Route::middleware(['auth'])->group(function () {
    
    // Dashboard Petani (Bukan Filament)
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // Proses Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});