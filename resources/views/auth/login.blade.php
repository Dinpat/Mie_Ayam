<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow w-full max-w-sm">
        <h2 class="text-xl font-bold text-center mb-4">Login Pengguna</h2>

        @extends('layouts.app')

        @section('content')
            {{-- Notifikasi error atau success --}}
            @if (session('error'))
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input type="text" name="username" required
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <button type="submit"
                    class="w-full bg-red-600 hover:bg-blue-700 text-white py-2 rounded transition duration-150">
                    Login
                </button>
                <div class="text-center mt-4">
                    <p class="text-sm">Belum punya akun?
                        <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar di sini</a>
                    </p>
                </div>
            </form>
        </div>
        </div>
    @endsection

</body>

</html>
