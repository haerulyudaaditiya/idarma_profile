<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <div class="container mx-auto py-16 px-4 text-center">
        <h1 class="text-3xl font-bold mb-4">Halo, {{ Auth::user()->name }} 👋</h1>

        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-6 rounded shadow mb-6">
            <h2 class="text-xl font-semibold mb-2">Halaman ini belum tersedia</h2>
            <p>Saat ini, halaman beranda untuk pengguna masih dalam tahap pengembangan.</p>
            <p class="mt-2">Silakan kembali lagi nanti atau hubungi admin jika ada pertanyaan.</p>
        </div>

        <!-- Tombol Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
                Logout
            </button>
        </form>
    </div>

</body>
</html>
