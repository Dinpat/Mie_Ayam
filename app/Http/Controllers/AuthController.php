<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Pesanan;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $username = $request->input('username');
    $password = $request->input('password');

    $user = User::where('username', $username)->first();

    if (!$user || !Hash::check($password, $user->password)) {
        return back()->with('error', 'Login gagal: Username atau password salah');
    }

    Auth::login($user); // ✅ Ini penting

    // ✅ Bonus: Cek login berhasil
    if (Auth::check()) {
        Log::info('✅ User berhasil login:', ['id' => Auth::id(), 'username' => Auth::user()->username]);
    } else {
        Log::warning('❌ Gagal login meski Auth::login() dipanggil.');
    }

    if ($user->role === 'admin' || $user->role === 'penjual') {
        return redirect('/penjual/dashboard');
    } else {
        return redirect('/users/dashboard');
    }
}


    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:50',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,dosen,umum',
        ]);

        $data = [
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ];

        User::create($data); //sudah benar

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil, silakan login.');
    }
}

