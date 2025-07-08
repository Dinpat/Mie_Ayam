<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Pelanggan</title>
</head>
<body>
    <h1>Halo, {{ session('user')->nama }} 👋</h1>

    <p>Anda login sebagai: <strong>{{ session('user')->role }}</strong></p>

    <ul>
        <li><a href="{{ url('/menu') }}">Lihat Menu Mie Ayam</a></li>
        <li><a href="{{ url('/pesan') }}">Lakukan Pemesanan</a></li>
        <li><a href="{{ url('/status') }}">Lihat Status Pesanan</a></li>
        <li><a href="{{ url('/logout') }}">Logout</a></li>
    </ul>
</body>
</html>
