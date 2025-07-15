<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Menu;

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

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/keranjang', function () {
    return view('keranjang'); // nanti kita buat keranjang.blade.php
});

Route::post('/keranjang/tambah', function (Request $request) {
    $menuId = $request->menu_id;
    $menu = Menu::find($menuId);

    if (!$menu) {
        return redirect()->back()->with('error', 'Menu tidak ditemukan.');
    }

    $keranjang = session()->get('keranjang', []);

    if (isset($keranjang[$menuId])) {
        $keranjang[$menuId]['jumlah'] += 1;
    } else {
        $keranjang[$menuId] = [
            'nama' => $menu->nama,
            'harga' => $menu->harga,
            'jumlah' => 1,
        ];
    }

    session()->put('keranjang', $keranjang);

    return redirect('/keranjang')->with('success', 'Menu berhasil ditambahkan ke keranjang!');
})->name('keranjang.tambah');

Route::get('/dashboard', function () {
    $menus = Menu::all();
    return view('dashboard', compact('menus'));
})->middleware('auth');

// Tambah jumlah item keranjang
Route::post('/keranjang/tambah-jumlah', function (Request $request) {
    $menuId = $request->menu_id;
    $keranjang = session()->get('keranjang', []);

    if (isset($keranjang[$menuId])) {
        $keranjang[$menuId]['jumlah'] += 1;
        session()->put('keranjang', $keranjang);
    }

    return redirect('/keranjang');
})->name('keranjang.tambahJumlah');

// Kurangi jumlah item keranjang
Route::post('/keranjang/kurangi-jumlah', function (Request $request) {
    $menuId = $request->menu_id;
    $keranjang = session()->get('keranjang', []);

    if (isset($keranjang[$menuId])) {
        $keranjang[$menuId]['jumlah'] -= 1;

        // Hapus item jika jumlah <= 0
        if ($keranjang[$menuId]['jumlah'] <= 0) {
            unset($keranjang[$menuId]);
        }

        session()->put('keranjang', $keranjang);
    }

    return redirect('/keranjang');
})->name('keranjang.kurangiJumlah');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/penjual/pesanan/create', [App\Http\Controllers\PesananController::class, 'create'])->name('pesanan.create');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
