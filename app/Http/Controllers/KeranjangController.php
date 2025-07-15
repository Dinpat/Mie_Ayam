<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = session()->get('keranjang', []);
        return view('keranjang.keranjang', compact('keranjang'));
    }

    public function tambah(Request $request)
    {
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

        return redirect()->route('keranjang.keranjang')->with('success', 'Menu berhasil ditambahkan ke keranjang!');
    }

    public function tambahJumlah(Request $request)
    {
        $id = $request->menu_id;
        $keranjang = session()->get('keranjang', []);

        if (isset($keranjang[$id])) {
            $keranjang[$id]['jumlah'] += 1;
            session()->put('keranjang', $keranjang);
        }

        return redirect()->route('keranjang.keranjang');
    }

    public function kurangiJumlah(Request $request)
    {
        $id = $request->menu_id;
        $keranjang = session()->get('keranjang', []);

        if (isset($keranjang[$id])) {
            $keranjang[$id]['jumlah']--;

            if ($keranjang[$id]['jumlah'] <= 0) {
                unset($keranjang[$id]);
            }

            session()->put('keranjang', $keranjang);
        }

        return redirect()->route('keranjang.keranjang');
    }

    public function hapus($id)
    {
        $keranjang = session()->get('keranjang', []);

        if (isset($keranjang[$id])) {
            unset($keranjang[$id]);
            session()->put('keranjang', $keranjang);
        }

        return redirect()->route('keranjang.keranjang')->with('success', 'Item berhasil dihapus.');
    }

}

