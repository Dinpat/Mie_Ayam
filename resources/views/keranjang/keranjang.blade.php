<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Keranjang</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800">
  <div class="max-w-4xl mx-auto px-4 py-20 text-center">
    <h1 class="text-4xl font-bold text-red-700 mb-6">Keranjang Belanja</h1>

    @if(session('success'))
    <p class="text-green-600 mb-4">{{ session('success') }}</p>
  @endif

    @php $keranjang = session('keranjang', []); @endphp

    @if(count($keranjang) > 0)
    <table class="w-full text-left border">
      <thead class="bg-red-700 text-white">
      <tr>
        <th class="px-4 py-2">Menu</th>
        <th class="px-4 py-2">Harga</th>
        <th class="px-4 py-2">Jumlah</th>
        <th class="px-4 py-2">Subtotal</th>
      </tr>
      </thead>
      <tbody>
      @foreach($keranjang as $id => $item)
      <tr class="border-t">
      <td class="px-4 py-2">{{ $item['nama'] }}</td>
      <td class="px-4 py-2">Rp {{ number_format($item['harga']) }}</td>
      <td class="px-4 py-2">
      <div class="flex items-center justify-center gap-2">
        <form action="{{ route('keranjang.kurangiJumlah') }}" method="POST">
        @csrf
        <input type="hidden" name="menu_id" value="{{ $id }}">
        <button type="submit" class="px-2 py-1 bg-gray-300 rounded">-</button>
        </form>

        <span class="px-2">{{ $item['jumlah'] }}</span>

        <form action="{{ route('keranjang.tambahJumlah') }}" method="POST">
        @csrf
        <input type="hidden" name="menu_id" value="{{ $id }}">
        <button type="submit" class="px-2 py-1 bg-gray-300 rounded">+</button>
        </form>
      </div>
      </td>

      <td class="px-4 py-2">Rp {{ number_format($item['harga'] * $item['jumlah']) }}</td>
      </tr>
    @endforeach
      </tbody>
    </table>
  @else
    <p class="text-gray-600">Keranjang masih kosong.</p>
  @endif

    <a href="/users/dashboard"
      class="mt-6 inline-block bg-red-700 text-white px-4 py-2 rounded-full hover:bg-red-600">Kembali ke Menu</a>
    <a href="{{ route('checkout.checkout') }}"
      class="mt-6 inline-block bg-green-600 text-white px-4 py-2 rounded-full hover:bg-green-500">
      Checkout Sekarang
    </a>

  </div>
</body>

</html>