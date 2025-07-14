<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login'); // arahkan ke halaman login langsung
});

// Admin Dashboard
Route::get('/penjual/dashboard', function () {
    return view('penjual.dashboard');
})->name('penjual.dashboard');

// Penjual Dashboard
Route::get('/penjual/dashboard', function () {
    return view('penjual.dashboard');
})->name('penjual.dashboard');

Route::get('/users/dashboard', function () {
    return view('users.dashboard');
})->name('users.dashboard');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/penjual/pesanan/create', [App\Http\Controllers\PesananController::class, 'create'])->name('pesanan.create');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
