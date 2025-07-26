<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjual Mie Ayam</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-6xl">
        <h1 class="text-2xl font-bold text-center mb-6">Dashboard Penjual Mie Ayam</h1>

        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 mb-6 text-center">
            <div class="bg-green-100 p-4 rounded">
                <p class="text-2xl font-bold">{{ $pesananHariIni }}</p>
                <p class="text-sm text-gray-700">Pesanan Hari Ini</p>
            </div>
            <div class="bg-yellow-100 p-4 rounded">
                <p class="text-2xl font-bold">Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</p>
                <p class="text-sm text-gray-700">Total Penjualan</p>
            </div>
            <div class="bg-blue-100 p-4 rounded">
                <p class="text-2xl font-bold">{{ $jumlahDiproses }}</p>
                <p class="text-sm text-gray-700">Diproses</p>
            </div>
            <div class="bg-purple-100 p-4 rounded">
                <p class="text-2xl font-bold">{{ $jumlahSelesai }}</p>
                <p class="text-sm text-gray-700">Selesai</p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Nama Pelanggan</th>
                        <th class="px-4 py-2">Lokasi</th>
                        <th class="px-4 py-2">Menu</th>
                        <th class="px-4 py-2">Jumlah</th>
                        <th class="px-4 py-2">Total</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesanans as $pesanan)
                        <tr class="border-t text-center">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $pesanan->user->nama ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $pesanan->lokasi_pesanan }}</td>
                            <td class="px-4 py-2">
                                @foreach($pesanan->detailPesanan as $detail)
                                    {{ $detail->menu->nama_menu ?? '-' }} ({{ $detail->jumlah }})<br>
                                @endforeach
                            </td>
                            <td class="px-4 py-2">
                                {{ $pesanan->detailPesanan->sum('jumlah') }}
                            </td>
                            <td class="px-4 py-2">
                                Rp {{ number_format($pesanan->total_bayar, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-2 font-semibold
                                    @if($pesanan->status_pesanan == 'selesai') text-green-600
                                    @elseif($pesanan->status_pesanan == 'diproses') text-yellow-600
                                    @else text-gray-700
                                    @endif">
                                {{ ucfirst($pesanan->status_pesanan) }}
                            </td>
                            <td class="px-4 py-2 space-y-1">
                                <a href="{{ url('/penjual/pesanan/' . $pesanan->id . '/detail') }}"
                                    class="bg-blue-500 text-white px-2 py-1 rounded text-sm hover:bg-blue-600 inline-block">Detail</a>

                                @if($pesanan->status_pesanan === 'pending')
                                    <form action="{{ url('/penjual/pesanan/' . $pesanan->id . '/status') }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        <input type="hidden" name="status" value="diproses">
                                        <button type="submit"
                                            class="bg-yellow-500 text-white px-2 py-1 rounded text-sm hover:bg-yellow-600">Proses</button>
                                    </form>
                                @endif

                                @if($pesanan->status_pesanan !== 'selesai')
                                    <form action="{{ url('/penjual/pesanan/' . $pesanan->id . '/status') }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        <input type="hidden" name="status" value="selesai">
                                        <button type="submit"
                                            class="bg-green-500 text-white px-2 py-1 rounded text-sm hover:bg-green-600">Selesai</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-gray-500">Belum ada pesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="flex justify-end mt-6">
            <a href="{{ url('/penjual/laporan') }}"
                class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded">Laporan</a>
        </div>
    </div>
</body>

</html>