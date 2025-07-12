<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Pelanggan</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <h1>Dashboard {{ ucfirst(session('user')->role) }}</h1>
        <p>Selamat datang, {{ session('user')->nama }}</p>
        <p>Kamu login sebagai <strong>{{ ucfirst(session('user')->role) }}</strong>.</p>
    @endsection

</body>

</html>