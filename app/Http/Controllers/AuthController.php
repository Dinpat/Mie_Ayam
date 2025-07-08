<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $role = $request->input('role');

        if ($role === 'admin') {
            $user = Admin::where('username', $request->username)
                         ->where('password', $request->password)
                         ->first();
        } else {
            $user = Pelanggan::where('nim_nip', $request->username)
                             ->where('password', $request->password)
                             ->first();
        }

        if ($user) {
            Session::put('user', $user);
            Session::put('role', $role);
            return redirect('/admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Login gagal');
        }
        
         if ($role === 'pelanggan') {
        $user = Pelanggan::where('nim_nip', $request->username)
                         ->where('password', $request->password)
                         ->first();
        if ($user) {
            Session::put('user', $user);
            Session::put('role', 'pelanggan');
            return redirect('/pelanggan/dashboard');
        }
         } else {
            return redirect()->back()->with('error', 'Login gagal');
        }
    
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }

    
}
