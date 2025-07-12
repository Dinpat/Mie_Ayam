<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Penjual;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Session;

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

        // Cek Admin
        $admin = \App\Models\Admin::where('username', $username)->first();
        if ($admin && Hash::check($password, $admin->password)) {
            Session::put('user', $admin);
            Session::put('role', 'admin');
            return redirect('/admin/dashboard');
        }

        // Cek Penjual
        $penjual = \App\Models\Penjual::where('username', $username)->first();
        if ($penjual && Hash::check($password, $penjual->password)) {
            Session::put('user', $penjual);
            Session::put('role', 'penjual');
            return redirect('/penjual/dashboard');
        }

        // Cek Pelanggan
        $pelanggan = \App\Models\Pelanggan::where('nim_nip', $username)->first();
        if ($pelanggan && Hash::check($password, $pelanggan->password)) {
            Session::put('user', $pelanggan);
            Session::put('role', $pelanggan->role); // 'mahasiswa' atau 'dosen'
            return redirect('/pelanggan/dashboard');
        }

        return back()->with('error', 'Login gagal: Username atau password salah');
    }


    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim_nip' => 'required|string|unique:pelanggan,nim_nip',
            'password' => 'required|min:6',
            'role' => 'required|in:mahasiswa,dosen',
        ]);

        $data = [
            'nama' => $request->nama,
            'nim_nip' => $request->nim_nip,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ];

        \App\Models\Pelanggan::create($data);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil, silakan login.');
    }

    // Menampilkan form login penjual
    public function showPenjualLoginForm()
    {
        return view('penjual.login');
    }

    // Proses login penjual
    public function penjualLogin(Request $request)
    {
        $user = Penjual::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user', $user);
            Session::put('role', 'penjual');
            return redirect()->route('penjual.dashboard');
        }

        return back()->with('error', 'Login gagal: Username atau password salah');
    }
}

