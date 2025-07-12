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
                <p class="text-2xl font-bold">35</p>
                <p class="text-sm text-gray-700">Pesanan Hari Ini</p>
            </div>
            <div class="bg-yellow-100 p-4 rounded">
                <p class="text-2xl font-bold">Rp 420.000</p>
                <p class="text-sm text-gray-700">Total Penjualan</p>
            </div>
            <div class="bg-blue-100 p-4 rounded">
                <p class="text-2xl font-bold">10</p>
                <p class="text-sm text-gray-700">Diproses</p>
            </div>
            <div class="bg-purple-100 p-4 rounded">
                <p class="text-2xl font-bold">25</p>
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
                    <tr class="border-t text-center">
                        <td class="px-4 py-2">1</td>
                        <td class="px-4 py-2">Budi</td>
                        <td class="px-4 py-2">Jl. Kenanga No.12</td>
                        <td class="px-4 py-2">Mie Ayam + Es Teh</td>
                        <td class="px-4 py-2">2</td>
                        <td class="px-4 py-2">Rp 30.000</td>
                        <td class="px-4 py-2 text-green-600 font-semibold">Selesai</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="/penjual/pesanan/1/detail"
                                class="bg-blue-500 text-white px-2 py-1 rounded text-sm hover:bg-blue-600">Detail</a>
                            <form action="/penjual/pesanan/1/status" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="status" value="diproses">
                                <button type="submit"
                                    class="bg-yellow-500 text-white px-2 py-1 rounded text-sm hover:bg-yellow-600">Proses</button>
                            </form>

                            <form action="/penjual/pesanan/1/status" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="status" value="selesai">
                                <button type="submit"
                                    class="bg-green-500 text-white px-2 py-1 rounded text-sm hover:bg-green-600">Selesai</button>
                            </form>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="flex justify-end mt-6">
            <a href="/penjual/laporan"
                class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded mr-2">Laporan</a>
            <a href="/penjual/pesanan/create" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">+
                Tambah Pesanan</a>
        </div>
    </div>
</body>

</html>