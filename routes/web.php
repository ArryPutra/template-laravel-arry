<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KelolaPegawaiController;
use App\Http\Controllers\Admin\KelolaBeritaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']); // Menampilkan halaman utama

Route::get('/login', [AuthController::class, 'login'])
    ->name('login'); // Menampilkan halaman login
Route::post('/login-post', [AuthController::class, 'authenticate'])
    ->name('login.post'); // Melakukan proses autentikasi
Route::get('/register', [AuthController::class, 'register'])
    ->name('register'); // Menampilkan halaman login
Route::post('/register-post', [AuthController::class, 'store'])
    ->name('register.post'); // Menampilkan halaman login

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout'); // Melakukan proses logout

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard'); // Menampilkan halaman dashboard
    Route::resource('/admin/kelola-pegawai', KelolaPegawaiController::class);
    Route::resource('/admin/kelola-berita', KelolaBeritaController::class);
});
