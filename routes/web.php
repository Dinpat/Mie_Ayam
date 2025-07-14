<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login'); // arahkan ke halaman login langsung
});

// Admin Dashboard
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Penjual Dashboard
Route::get('/penjual/dashboard', function () {
    return view('penjual.dashboard');
})->name('penjual.dashboard');

Route::get('/pelanggan/dashboard', function () {
    return view('pelanggan.dashboard');
})->name('pelanggan.dashboard');

Route::get('/penjual/dashboard', function () {
    return view('penjual.dashboard');
})->name('penjual.dashboard');

//

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/penjual/pesanan/create', [App\Http\Controllers\PesananController::class, 'create'])->name('pesanan.create');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
