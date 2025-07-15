<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout - Mie Ayam</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">
    <div class="max-w-3xl mx-auto py-12 px-6">
        <h1 class="text-4xl font-bold text-red-700 mb-6 text-center">Checkout</h1>

        {{-- QRIS Section --}}
        <div class="bg-white p-6 rounded-xl shadow-md mb-8">
            <h2 class="text-xl font-semibold mb-4 text-red-600">Scan QRIS untuk Pembayaran:</h2>
            <div class="flex justify-center mb-4">
                <img src="{{ asset('asset/qris.jpeg') }}" alt="QRIS" class="w-64 rounded-md shadow" />
            </div>

            {{-- Form --}}
            <form action="{{ route('checkout.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label for="lokasi_pesanan" class="block font-medium text-gray-700 mb-1">Lokasi Pesanan:</label>
                    <input type="text" id="lokasi_pesanan" name="lokasi_pesanan" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:border-red-400" required>
                </div>

                <div>
                    <label for="bukti_pembayaran" class="block font-medium text-gray-700 mb-1">Upload Bukti Pembayaran (QRIS):</label>
                    <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*" class="w-full border border-gray-300 rounded-md p-2 bg-white" required>
                </div>

                {{-- Ringkasan Pesanan --}}
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mt-6">
                    <h3 class="text-lg font-semibold mb-2 text-red-700">Ringkasan Pesanan</h3>
                    <ul class="space-y-1 mb-2">
                        @foreach($keranjang as $item)
                            <li>
                                {{ $item['nama'] }} (x{{ $item['jumlah'] }}) - Rp{{ number_format($item['harga'], 0, ',', '.') }}
                            </li>
                        @endforeach
                    </ul>
                    <p class="font-semibold mt-2">Total: Rp{{ number_format($total, 0, ',', '.') }}</p>
                </div>

                <div class="text-center mt-6">
                    <button type="submit" class="bg-red-700 text-white px-6 py-2 rounded-full hover:bg-red-600 transition">
                        Kirim Pesanan
                    </button>
                </div>
            </form>
        </div>

        <div class="text-center">
            <a href="{{ url('/keranjang') }}" class="text-sm text-red-600 hover:underline">← Kembali ke Keranjang</a>
        </div>
    </div>
</body>
</html>
