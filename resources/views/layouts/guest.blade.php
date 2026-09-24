<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased bg-gray-50">

    <div class="min-h-screen flex items-center justify-center px-4 py-8">

        <div class="w-full max-w-md">

            {{-- Logo / Brand --}}
            <div class="flex flex-col items-center mb-6">

                <a href="/"
                    class="w-16 h-16 rounded-2xl bg-emerald-600
                           flex items-center justify-center shadow-lg
                           shadow-emerald-100 transition hover:bg-emerald-700">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8 text-white"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 14l9-5-9-5-9 5 9 5z" />

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5 12v5.5C5 19.43 8.134 21 12 21s7-1.57 7-3.5V12" />

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 9v6" />

                    </svg>

                </a>

                <h1 class="mt-4 text-xl font-bold text-gray-800">
                    Sistem Informasi Sekolah
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    SD Al-Wasliyah Tanjung Rejo
                </p>

            </div>


            {{-- Guest Card --}}
            <div class="bg-white rounded-2xl border border-gray-100
                        shadow-sm overflow-hidden">

                {{-- Top Accent --}}
                <div class="h-1.5 bg-emerald-600"></div>

                <div class="px-6 py-6 sm:px-8 sm:py-7">

                    {{ $slot }}

                </div>

            </div>


            {{-- Footer --}}
            <p class="text-center text-xs text-gray-400 mt-6">
                © {{ date('Y') }} SD Al-Wasliyah Tanjung Rejo
            </p>

        </div>

    </div>

</body>

</html>