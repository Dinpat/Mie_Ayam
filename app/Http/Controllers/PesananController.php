<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function updateStatus($id, Request $request)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = $request->input('status');
        $pesanan->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
    }
    //
    public function index()
    {
        $keranjang = session()->get('keranjang', []);
        $total = 0;

        foreach ($keranjang as $item) {
            $total += $item['harga'] * $item['jumlah'];
        }

        return view('checkout.checkout', compact('keranjang', 'total'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $request->validate([
            'lokasi_pesanan' => 'required|string|max:255',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $keranjang = session()->get('keranjang', []);
        if (empty($keranjang)) {
            return redirect()->back()->with('error', 'Keranjang masih kosong.');
        }

        $total = 0;
        foreach ($keranjang as $item) {
            $total += $item['harga'] * $item['jumlah'];
        }

        $filePath = $request->file('bukti_pembayaran')->store('bukti', 'public');

        Pesanan::create([
            'user_id' => Auth::id(),
            'status_pesanan' => 'pending',
            'lokasi_pesanan' => $request->lokasi_pesanan,
            'status_pembayaran' => 'sudah dibayar',
            'bukti_pembayaran' => $filePath,
            'total_bayar' => $total,
        ]);

        session()->forget('keranjang');

        return redirect()->route('users.dashboard')->with('success', 'Pesanan berhasil dikirim!');
    }

    public function dashboardPenjual()
    {
        $pesananList = \App\Models\Pesanan::with(['user', 'detailPesanan.menu'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('penjual.dashboard', compact('pesananList'));
    }

    public function halamanUtama()
    {
        $menus = Menu::all();

        $pesananUser = Pesanan::where('user_id', Auth::id())
            ->where('status_pesanan', '!=', 'selesai') // filter: hanya yg belum selesai
            ->orderBy('created_at', 'desc')
            ->get();

        return view('beranda', compact('menus', 'pesananUser'));
    }

    public function riwayatPesanan()
    {
        $riwayat = Pesanan::where('user_id', Auth::id())
            ->where('status_pesanan', 'selesai') // filter: hanya yg selesai
            ->orderBy('created_at', 'desc')
            ->get();

        return view('riwayat', compact('riwayat'));
    }

    // app/Http/Controllers/PesananController.php
public function getPesananUser()
{
    $pesanan = \App\Models\Pesanan::where('user_id', auth()->id())
                ->latest()
                ->get();

    return response()->json($pesanan);
}

}
