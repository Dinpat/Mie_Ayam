<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function dashboard()
    {
        $menus = Menu::all(); // untuk menampilkan menu
        $pesananUser = Pesanan::where('user_id', Auth::id())->latest()->get(); // ambil pesanan milik user login

        return view('users.dashboard', compact('menus', 'pesananUser'));
    }
}


