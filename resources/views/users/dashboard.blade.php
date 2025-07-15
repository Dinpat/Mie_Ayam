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

        <!-- Desktop Nav -->
        <nav class="hidden md:flex space-x-2">
          <a href="#home" class="px-3 py-1 rounded-full text-sm font-medium hover:bg-red-100 text-red-700 font-semibold">Home</a>
          <a href="#about" class="px-3 py-1 rounded-full text-sm font-medium hover:bg-red-100 text-red-700 font-semibold">About</a>
          <a href="#menu" class="px-3 py-1 rounded-full text-sm font-medium hover:bg-red-100 text-red-700 font-semibold">Menu</a>
          <a href="#contact" class="px-3 py-1 rounded-full text-sm font-medium hover:bg-red-100 text-red-700 font-semibold">Contact</a>
          <a href="{{ url('/keranjang') }}" class="px-3 py-1 rounded-full text-sm font-medium hover:bg-red-100 text-red-700 font-semibold">Keranjang</a>
          <a href="{{ route('logout') }}" class="px-3 py-1 rounded-full text-sm font-medium bg-red-700 text-white font-semibold">Log Out</a>
        </nav>

        <!-- Mobile Button -->
        <button id="menu-btn" class="md:hidden focus:outline-none">
          <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>

      <!-- Mobile Menu -->
      <div id="mobile-menu" class="md:hidden hidden flex-col px-4 pb-4 space-y-2">
        <a href="#home" class="block hover:text-red-700">Home</a>
        <a href="#about" class="block hover:text-red-700">About</a>
        <a href="#menu" class="block hover:text-red-700">Menu</a>
        <a href="#contact" class="block hover:text-red-700">Contact</a>
        <a href="{{ url('/keranjang') }}" class="block hover:text-red-700">Keranjang</a>
        <a href="#" class="block hover:text-red-700">Log Out</a>
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
        Selamat datang di Mie Ayam Juara Kampus! Kami hadir untuk menjadi solusi terbaik bagi kamu para mahasiswa, dosen, dan seluruh civitas akademika yang mendambakan semangkuk mie ayam lezat tanpa perlu keluar dari lingkungan kampus yang padat aktivitas.
      </p>
    </section>

    <!-- Features Section -->
    <section id="menu" class="py-20 bg-gray-100">
      <div class="max-w-6xl mx-auto px-4">
        <h3 class="text-3xl font-bold text-center mb-12 text-red-700">Menu</h3>
        <div class="grid md:grid-cols-3 gap-10">
          <div class="bg-white p-6 rounded-2xl shadow-md">
            <img src="{{ asset('asset/1.png') }}" alt="Gambar 1">
            <h4 class="text-xl font-semibold mb-2">Mie Ayam</h4>
            <p>Mie Ayam enak dambaan mahasiswa Amikom Yogyakarta.</p>
            <form action="{{ route('keranjang.tambah') }}" method="POST">
    @csrf
    <input type="hidden" name="menu_id" value="1"> {{-- ID Menu --}}
    <button type="submit" class="w-full mt-3 bg-red-700 text-white px-4 py-2 rounded-full hover:bg-red-600">
        Beli
    </button>
</form>
          </div>
          <div class="bg-white p-6 rounded-2xl shadow-md">
            <img src="{{ asset('asset/2.png') }}" alt="Gambar 2">
            <h4 class="text-xl font-semibold mb-2">Bakso</h4>
            <p>Bakso gurih, kenyal, seger.</p>
            <form action="{{ route('keranjang.tambah') }}" method="POST">
    @csrf
    <input type="hidden" name="menu_id" value="1"> {{-- ID Menu --}}
    <button type="submit" class="w-full mt-3 bg-red-700 text-white px-4 py-2 rounded-full hover:bg-red-600">
        Beli
    </button>
</form>
          </div>
          <div class="bg-white p-6 rounded-2xl shadow-md">
            <img src="{{ asset('asset/3.png') }}" alt="Gambar 3">
            <h4 class="text-xl font-semibold mb-2">Mie Ayam Bakso</h4>
            <p>Paket komplit, Mie Ayam + Bakso.</p>
            <form action="{{ route('keranjang.tambah') }}" method="POST">
    @csrf
    <input type="hidden" name="menu_id" value="1"> {{-- ID Menu --}}
    <button type="submit" class="w-full mt-3 bg-red-700 text-white px-4 py-2 rounded-full hover:bg-red-600">
        Beli
    </button>
</form>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white text-center">
      <h3 class="text-3xl font-bold text-red-700 mb-4">Contact</h3>
      <p class="max-w-2xl mx-auto text-gray-600">Need help? Have questions? Reach out to us anytime.</p>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-200 py-6 mt-10 text-center text-gray-600">
      <p>&copy; 2025 MyWebsite. All rights reserved.</p>
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
</html>