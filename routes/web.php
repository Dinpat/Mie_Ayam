<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login'); // arahkan ke halaman login langsung
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/pelanggan/dashboard', function () {
    return view('pelanggan.dashboard');
});



Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

