<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tidak Ditemukan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="text-center p-10 bg-white shadow-lg rounded-lg">
        <h1 class="text-4xl font-bold text-red-500">404</h1>
        <h2 class="text-2xl font-semibold mt-2">Oops! Halaman tidak ditemukan</h2>
        <p class="text-gray-600 mt-2">Maaf, halaman yang Anda cari tidak tersedia atau telah dipindahkan.</p>
        <a href="{{ url('/') }}" class="mt-4 inline-block bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
            Kembali ke Beranda
        </a>
    </div>
</body>
</html>
