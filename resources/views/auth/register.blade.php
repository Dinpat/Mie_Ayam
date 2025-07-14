<!DOCTYPE html>
<html>

<head>
    <title>Register Pelanggan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow w-full max-w-sm">
        <h2 class="text-xl font-bold text-center mb-4">Form Pendaftaran Pelanggan</h2>

        @if(session('success'))
            <div style="color: green; margin-bottom: 10px;">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div style="color: red; margin-bottom: 10px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.submit') }}">
            @csrf

            <label>Nama:</label>
            <input type="text" name="nama" class="w-full mb-4 p-2 border rounded" required>

            <label>Username:</label>
            <input type="text" name="username" class="w-full mb-4 p-2 border rounded" required>

            <label>Role:</label>
            <select name="role" class="w-full mb-4 p-2 border rounded" required>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="dosen">Dosen</option>
                <option value="pengunjung">Pengunjung</option>
            </select>

            <label>Password:</label>
            <input type="password" name="password" class="w-full mb-4 p-2 border rounded" required>

            <button class="w-full bg-red-600 text-white p-2 rounded">Daftar</button>
        </form>
    </div>
</body>

</html>
