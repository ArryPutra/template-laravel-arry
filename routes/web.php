<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KelolaPegawaiController;
use App\Http\Controllers\Admin\KelolaBeritaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Pegawai\DashboardController as PegawaiDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])
    ->name('welcome'); // Menampilkan halaman utama

Route::get('/login', [AuthController::class, 'login'])
    ->name('login'); // Menampilkan halaman login
Route::post('/login-post', [AuthController::class, 'authenticate'])
    ->name('login.post'); // Melakukan proses autentikasi
Route::get('/register', [AuthController::class, 'register'])
    ->name('register'); // Menampilkan halaman login
Route::post('/register-post', [AuthController::class, 'store'])
    ->name('register.post'); // Menampilkan halaman login

Route::get('/berita/{id}', [IndexController::class, 'berita'])
    ->name('berita'); // Menampilkan halaman berita

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout'); // Melakukan proses logout

    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])
            ->name('admin.dashboard')->middleware('admin'); // Menampilkan halaman dashboard
        Route::resource('kelola-pegawai', KelolaPegawaiController::class);
        Route::resource('kelola-berita', KelolaBeritaController::class);
    });
    Route::prefix('pegawai')->middleware('pegawai')->group(function () {
        Route::get('dashboard', [PegawaiDashboardController::class, 'index'])
            ->name('pegawai.dashboard');
    });
});
