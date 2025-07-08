{{-- <h1>Login</h1>

@if(session('error'))
  <p style="color:red">{{ session('error') }}</p>
@endif

<form method="POST" action="{{ url('/login') }}">
    @csrf
    <label>Role:</label>
    <select name="role" required>
        <option value="admin">Admin</option>
        <option value="pelanggan">Pelanggan</option>
    </select><br><br>

    <label>Username:</label>
    <input type="text" name="username" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>
<body>

    @if(session('error'))
        <p class="text-red-600 text-center mt-4">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <div class="flex justify-center items-center h-screen bg-red-700">
            <div class="w-96 p-6 shadow-lg bg-white rounded-md">
                <h1 class="text-3xl block text-center font-semibold">Login</h1>
                <hr class="mt-3">

                <!-- Role -->
                <div class="mt-3">
                    <label for="role" class="block text-base mb-2">Login Sebagai</label>
                    <select name="role" id="role" class="border w-full px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600" required>
                        <option value="admin">Admin</option>
                        <option value="pelanggan">Pelanggan</option>
                    </select>
                </div>

                <!-- Username -->
                <div class="mt-3">
                    <label for="niknim" class="block text-base mb-2">NIK/NIM</label>
                    <input type="text" id="niknim" name="username" class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600" placeholder="Masukkan NIK/NIM" required>
                </div>

                <!-- Password -->
                <div class="mt-3">
                    <label for="password" class="block text-base mb-2">Password</label>
                    <input type="password" id="password" name="password" class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600" placeholder="Masukkan Password" required>
                </div>

                <!-- Tombol Login -->
                <div class="mt-5">
                    <button type="submit" class="border-2 border-red-700 bg-red-700 text-white py-1 w-full rounded-md hover:bg-transparent hover:text-red-700 mt-6 font-semibold">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </form> 
</body>
</html>

</body>
</html>
