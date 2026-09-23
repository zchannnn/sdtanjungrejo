<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menunggu Verifikasi - SD Tanjung Rejo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body{font-family:'Inter',sans-serif}</style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">
    <div class="bg-white rounded-2xl shadow-sm p-8 max-w-md w-full text-center">
        <div class="w-16 h-16 bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center mx-auto text-3xl">&#9203;</div>
        <h1 class="text-xl font-bold mt-5">Akun Anda Sedang Menunggu Verifikasi</h1>
        <p class="text-gray-500 text-sm mt-3 leading-relaxed">
            Terima kasih sudah login, {{ auth()->user()->name }}. Untuk alasan keamanan, akun
            <strong>{{ ucfirst(auth()->user()->getRoleNames()->first()) }}</strong> baru perlu diverifikasi
            terlebih dahulu oleh pihak sekolah sebelum bisa mengakses sistem.
        </p>
        <p class="text-gray-500 text-sm mt-3">
            Silakan hubungi pihak sekolah (Admin) untuk mempercepat proses verifikasi, atau tunggu konfirmasi.
        </p>
        <form method="POST" action="{{ route('logout') }}" class="mt-6">
            @csrf
            <button class="text-sm text-red-600 hover:underline">Keluar</button>
        </form>
    </div>
</body>
</html>
