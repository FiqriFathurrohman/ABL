<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FinanceController;

/*
|--------------------------------------------------------------------------
| Livewire Custom Asset Routes
|--------------------------------------------------------------------------
*/
Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
// Redirect root ke halaman login TANIHUB
Route::get('/', function () {
    return redirect()->route('login');
});

// Auth Routes (Login & Logout)
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
});

/*
|--------------------------------------------------------------------------
| Protected Admin Routes (Middleware: Auth)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // 1. Dashboard Utama (Statistik & Visualisasi Map)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // 2. Manajemen Pengguna (Verifikasi & Database)
    Route::prefix('manajemen-akun')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('akun.index');
        
        // Aksi Verifikasi untuk Petani dan User
        Route::post('/approve/{id}', [UserController::class, 'approve'])->name('akun.approve');
        Route::post('/reject/{id}', [UserController::class, 'reject'])->name('akun.reject');
    });

    // 3. Laporan Keuangan (Fee Admin 4% & Kas Tanam 6%)
    Route::get('/laporan-keuangan', [FinanceController::class, 'index'])->name('finance.index');

    // 4. Data Master (Placeholder untuk pengembangan selanjutnya)
    Route::prefix('data-master')->group(function () {
        Route::get('/komoditas', function() { return "Halaman Kategori Komoditas"; })->name('master.komoditas');
        Route::get('/wilayah', function() { return "Halaman Wilayah/Provinsi"; })->name('master.wilayah');
    });

});