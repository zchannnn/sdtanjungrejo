<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Beranda')  - SD Tanjung Rejo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body{font-family:'Inter',sans-serif}</style>
</head>
<body class="bg-gray-50 text-gray-800">
    <header class="bg-emerald-800 text-white sticky top-0 z-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-5 py-4 flex items-center justify-between gap-2">
            <a href="{{ route('home') }}" class="font-bold text-base sm:text-lg flex-shrink-0">SD Tanjung Rejo</a>
            <nav class="flex items-center gap-2 sm:gap-5 text-xs sm:text-sm">
                <a href="{{ route('home') }}" class="hover:text-emerald-200 whitespace-nowrap">Beranda</a>
                <a href="{{ route('ppdb.create') }}" class="hover:text-emerald-200 whitespace-nowrap">PPDB</a>
                <a href="{{ route('login') }}" class="bg-white text-emerald-800 px-3 sm:px-4 py-1.5 rounded-lg font-medium hover:bg-emerald-100 whitespace-nowrap">Login</a>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-emerald-900 text-emerald-200 text-sm mt-16">
        <div class="max-w-6xl mx-auto px-5 py-8">
            <p class="font-semibold text-white">SD Tanjung Rejo</p>
            <p class="mt-1">Jl. Tanjung Rejo, Medan, Sumatera Utara</p>
            <p class="mt-1">Telp: (+62) 813-7847-0434 &bull; Email: www.sdtanjungrejo.my.id</p>
            <p class="mt-4 text-xs text-emerald-400">&copy; {{ date('Y') }} SD Tanjung Rejo. Sistem Administrasi Sekolah.</p>
        </div>
    </footer>
</body>
</html>
