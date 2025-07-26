<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mie Ayam Amikom Yogyakarta</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800">
  <!-- Header -->
  <header class="bg-white shadow-md fixed w-full z-10 top-0">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-red-700">Mie Ayam Pak Rahmat</h1>
      <nav class="hidden md:flex space-x-2">
        <a href="#home" class="px-3 py-1 rounded-full text-sm font-medium hover:bg-red-100 text-red-700 font-semibold">Home</a>
        <a href="#about" class="px-3 py-1 rounded-full text-sm font-medium hover:bg-red-100 text-red-700 font-semibold">About</a>
        <a href="#menu" class="px-3 py-1 rounded-full text-sm font-medium hover:bg-red-100 text-red-700 font-semibold">Menu</a>
        <a href="#pesanan" class="px-3 py-1 rounded-full text-sm font-medium hover:bg-red-100 text-red-700 font-semibold">Pesanan</a>
        <a href="#contact" class="px-3 py-1 rounded-full text-sm font-medium hover:bg-red-100 text-red-700 font-semibold">Contact</a>
        <a href="{{ url('/keranjang') }}" class="px-3 py-1 rounded-full text-sm font-medium hover:bg-red-100 text-red-700 font-semibold">Keranjang</a>
        <a href="{{ route('logout') }}" class="px-3 py-1 rounded-full text-sm font-medium bg-red-700 text-white font-semibold">Log Out</a>
      </nav>
      <button id="menu-btn" class="md:hidden focus:outline-none">
        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
          <path d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
    <div id="mobile-menu" class="md:hidden hidden flex-col px-4 pb-4 space-y-2">
      <a href="#home" class="block hover:text-red-700">Home</a>
      <a href="#about" class="block hover:text-red-700">About</a>
      <a href="#menu" class="block hover:text-red-700">Menu</a>
      <a href="#pesanan" class="block hover:text-red-700">Pesanan</a>
      <a href="#contact" class="block hover:text-red-700">Contact</a>
      <a href="{{ url('/keranjang') }}" class="block hover:text-red-700">Keranjang</a>
      <a href="{{ route('logout') }}" class="block hover:text-red-700">Log Out</a>
    </div>
  </header>

  <!-- Hero Section -->
  <section id="home" class="text-center py-32 bg-[url('{{ asset('asset/banner.webp') }}')] bg-no-repeat bg-cover text-white">
    <div class="max-w-4xl mx-auto px-4">
      <h2 class="text-4xl md:text-5xl font-bold mb-6">Selamat Datang di Website Mie Ayam Pak Rahmat</h2>
      <p class="text-lg md:text-xl mb-8">Pesan darimana saja dan Siap Kami Antar</p>
      <a href="#about" class="bg-white text-red-700 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition">Get Started</a>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="py-20 bg-white text-center">
    <h3 class="text-3xl font-bold text-red-700 mb-4">About</h3>
    <p class="max-w-2xl mx-auto text-gray-600">
      Selamat datang di Mie Ayam Juara Kampus! Kami hadir untuk menjadi solusi terbaik bagi kamu para mahasiswa, dosen,
      dan seluruh civitas akademika yang mendambakan semangkuk mie ayam lezat tanpa perlu keluar dari lingkungan kampus
      yang padat aktivitas.
    </p>
  </section>

  <!-- Menu Section -->
  <section id="menu" class="py-20 bg-gray-100">
    <div class="max-w-6xl mx-auto px-4">
      <h3 class="text-3xl font-bold text-center mb-12 text-red-700">Menu</h3>
      <div class="grid md:grid-cols-3 gap-10">
        @foreach($menus as $menu)
        <div class="bg-white p-6 rounded-2xl shadow-md">
          <img src="{{ asset('asset/' . $loop->iteration . '.png') }}" alt="{{ $menu->nama }}" class="rounded-2xl">
          <h4 class="text-xl font-semibold mb-2">{{ $menu->nama }}</h4>
          <p>{{ $menu->deskripsi }}</p>
          <p class="text-red-700 font-semibold mt-2">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
          <form action="{{ route('keranjang.tambah') }}" method="POST">
            @csrf
            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
            <button type="submit" class="w-full mt-3 bg-red-700 text-white px-4 py-2 rounded-full hover:bg-red-600">Beli</button>
          </form>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  @extends('layouts.app')

@section('content')

  {{-- Status Pesanan Aktif --}}
    <div class="mb-10">
        <h2 class="text-lg font-semibold mb-3 text-gray-700 border-b pb-2">Status Pesanan Aktif</h2>
        <div id="pesananAktif" class="grid gap-3"></div>
    </div>


    {{-- Riwayat Pesanan --}}
    <div>
        <h2 class="text-lg font-semibold mb-3 text-gray-700 border-b pb-2">Riwayat Pesanan</h2>
        <div id="riwayatPesanan" class="grid gap-3"></div>
    </div>
</div>

  <!-- Contact Section -->
  <section id="contact" class="py-20 bg-white text-center">
    <h3 class="text-3xl font-bold text-red-700 mb-4">Contact</h3>
    <p class="max-w-2xl mx-auto text-gray-600">Terima pesanan acara, hubungi 089999999999</p>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-200 py-6 mt-10 text-center text-gray-600">
    <p>&copy; 2025 Mie Ayam Park Rahmat by tim 14. All rights reserved.</p>
  </footer>

  <!-- Scripts -->
  <script>
    const menuBtn = document.getElementById("menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");
    menuBtn.addEventListener("click", () => {
      mobileMenu.classList.toggle("hidden");
    });
  </script>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function fetchPesanan() {
        $.ajax({
            url: '/api/pesanan-user',
            type: 'GET',
            success: function (data) {
                let aktifHtml = '';
                let riwayatHtml = '';

                data.forEach(pesanan => {
                    const isSelesai = pesanan.status_pesanan === 'selesai';
                    const warnaStatus = isSelesai ? 'text-green-600 bg-green-100' : 'text-yellow-600 bg-yellow-100';
                    const ikon = isSelesai ? '✅' : '⏳';

                    const html = `
                        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition text-sm">
                            <div class="flex justify-between items-center mb-2">
                                <div class="text-xs text-gray-500">${new Date(pesanan.created_at).toLocaleString()}</div>
                                <div class="px-2 py-0.5 rounded text-xs font-semibold ${warnaStatus}">
                                    ${ikon} ${pesanan.status_pesanan.toUpperCase()}
                                </div>
                            </div>
                            <div class="text-gray-700 space-y-1">
                                <p><span class="font-medium">Lokasi:</span> ${pesanan.lokasi_pesanan}</p>
                                <p><span class="font-medium">Total:</span> Rp ${pesanan.total_bayar.toLocaleString()}</p>
                            </div>
                        </div>`;

                    if (isSelesai) {
                        riwayatHtml += html;
                    } else {
                        aktifHtml += html;
                    }
                });

                $('#pesananAktif').html(aktifHtml || '<p class="text-gray-500 italic">Tidak ada pesanan aktif.</p>');
                $('#riwayatPesanan').html(riwayatHtml || '<p class="text-gray-500 italic">Belum ada riwayat pesanan.</p>');
            },
            error: function () {
                alert('Gagal memuat data pesanan.');
            }
        });
    }

    $(document).ready(function () {
        fetchPesanan();
        setInterval(fetchPesanan, 10000);
    });
</script>
</html>