<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PenjualController extends Controller
{
   public function dashboard()
{
    $pesananHariIni = Pesanan::whereDate('created_at', today())->count();
    $totalPenjualan = Pesanan::where('status_pembayaran', 'sudah bayar')->sum('total_bayar');
    $jumlahDiproses = Pesanan::where('status_pesanan', 'diproses')->count();
    $jumlahSelesai = Pesanan::where('status_pesanan', 'selesai')->count();
    $pesanans = Pesanan::with(['user', 'detailPesanan.menu'])->latest()->get();

    return view('penjual.dashboard', compact(
        'pesananHariIni', 'totalPenjualan', 'jumlahDiproses', 'jumlahSelesai', 'pesanans'
    ));
}


    public function ubahStatus(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status_pesanan = $request->status;
        $pesanan->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diubah.');
    }
}
