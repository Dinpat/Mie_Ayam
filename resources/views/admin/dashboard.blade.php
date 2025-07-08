<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
</head>
<body>
    <h1>Selamat datang, Admin!</h1>

    <p>Anda login sebagai: <strong>{{ session('user')->username }}</strong></p>

    <ul>
        <li><a href="{{ url('/menu') }}">Kelola Menu</a></li>
        <li><a href="{{ url('/pengguna') }}">Kelola Pengguna</a></li>
        <li><a href="{{ url('/pesanan') }}">Kelola Pesanan</a></li>
        <li><a href="{{ url('/logout') }}">Logout</a></li>
    </ul>
</body>
</html>
