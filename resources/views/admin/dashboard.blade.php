@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

<div class="space-y-6">

    <!-- ================= HEADER ================= -->
    <div>
        <p class="text-sm text-emerald-600 font-semibold">
            Sistem Administrasi Sekolah
        </p>

        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mt-1">
            Dashboard Admin
        </h1>

        <p class="text-sm text-gray-500 mt-2">
            Selamat datang! Pantau dan kelola data SD Tanjung Rejo melalui dashboard ini.
        </p>
    </div>


    <!-- ================= STATISTIK ================= -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

        <!-- Total Siswa -->
        <div class="group bg-white rounded-2xl border border-gray-100 shadow-sm p-5 hover:shadow-md transition">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-sm text-gray-500">
                        Total Siswa Aktif
                    </p>

                    <p class="text-3xl font-extrabold text-gray-800 mt-2">
                        {{ $totalSiswa }}
                    </p>

                    <p class="text-xs text-emerald-600 font-medium mt-2">
                        Siswa terdaftar
                    </p>
                </div>

                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:bg-emerald-100 transition">

                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 005.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>

                    </svg>

                </div>

            </div>

        </div>


        <!-- Total Guru -->
        <div class="group bg-white rounded-2xl border border-gray-100 shadow-sm p-5 hover:shadow-md transition">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-sm text-gray-500">
                        Total Guru
                    </p>

                    <p class="text-3xl font-extrabold text-gray-800 mt-2">
                        {{ $totalGuru }}
                    </p>

                    <p class="text-xs text-blue-600 font-medium mt-2">
                        Tenaga pengajar
                    </p>
                </div>

                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">

                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 14l9-5-9-5-9 5 9 5z"/>

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 14l6.16-3.42M12 14v6"/>

                    </svg>

                </div>

            </div>

        </div>


        <!-- Total Kelas -->
        <div class="group bg-white rounded-2xl border border-gray-100 shadow-sm p-5 hover:shadow-md transition">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-sm text-gray-500">
                        Total Kelas
                    </p>

                    <p class="text-3xl font-extrabold text-gray-800 mt-2">
                        {{ $totalKelas }}
                    </p>

                    <p class="text-xs text-purple-600 font-medium mt-2">
                        Kelas tersedia
                    </p>
                </div>

                <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">

                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 19.5A2.5 2.5 0 016.5 17H20"/>

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/>

                    </svg>

                </div>

            </div>

        </div>


        <!-- Tunggakan SPP -->
        <div class="group bg-white rounded-2xl border border-red-100 shadow-sm p-5 hover:shadow-md transition">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-sm text-gray-500">
                        Tunggakan SPP
                    </p>

                    <p class="text-3xl font-extrabold text-red-600 mt-2">
                        {{ $tunggakanSpp }}
                    </p>

                    <p class="text-xs text-red-500 font-medium mt-2">
                        Perlu diperiksa
                    </p>
                </div>

                <div class="w-12 h-12 rounded-xl bg-red-50 text-red-600 flex items-center justify-center">

                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"/>

                    </svg>

                </div>

            </div>

        </div>

    </div>


    <!-- ================= WELCOME CARD ================= -->
    <div class="relative overflow-hidden bg-gradient-to-r from-emerald-700 to-emerald-800 rounded-2xl shadow-sm">

        <!-- Dekorasi -->
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full"></div>
        <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-white/5 rounded-full"></div>

        <div class="relative p-7 sm:p-8">

            <div class="max-w-2xl">

                <div class="w-12 h-12 bg-white/15 rounded-xl flex items-center justify-center mb-5">

                    <svg class="w-6 h-6 text-white"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 3l1.91 5.91H20l-4.95 3.6 1.9 5.89L12 14.8l-4.95 3.6 1.9-5.89L4 8.91h6.09L12 3z"/>

                    </svg>

                </div>

                <h2 class="text-xl sm:text-2xl font-bold text-white">
                    Selamat Datang di Sistem Administrasi
                </h2>

                <p class="text-emerald-100 text-sm sm:text-base leading-relaxed mt-3">
                    Gunakan menu di samping untuk mengelola berbagai kebutuhan
                    administrasi SD Tanjung Rejo, mulai dari data siswa, guru,
                    kelas, nilai, absensi, SPP, hingga pengumuman sekolah.
                </p>

            </div>

        </div>

    </div>


    <!-- ================= MENU CEPAT ================= -->
    <div>

        <div class="mb-4">

            <h2 class="text-lg font-bold text-gray-800">
                Menu Administrasi
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Kelola data sekolah dengan mudah melalui menu berikut.
            </p>

        </div>


        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">

            <!-- Siswa -->
            <a href="#"
               class="bg-white border border-gray-100 rounded-2xl p-5 text-center shadow-sm hover:shadow-md hover:-translate-y-1 transition group">

                <div class="w-12 h-12 mx-auto rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:bg-emerald-100">

                    <span class="text-xl">👨‍🎓</span>

                </div>

                <p class="text-sm font-semibold text-gray-700 mt-3">
                    Data Siswa
                </p>

            </a>


            <!-- Guru -->
            <a href="#"
               class="bg-white border border-gray-100 rounded-2xl p-5 text-center shadow-sm hover:shadow-md hover:-translate-y-1 transition group">

                <div class="w-12 h-12 mx-auto rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">

                    <span class="text-xl">👩‍🏫</span>

                </div>

                <p class="text-sm font-semibold text-gray-700 mt-3">
                    Data Guru
                </p>

            </a>


            <!-- Kelas -->
            <a href="#"
               class="bg-white border border-gray-100 rounded-2xl p-5 text-center shadow-sm hover:shadow-md hover:-translate-y-1 transition group">

                <div class="w-12 h-12 mx-auto rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">

                    <span class="text-xl">🏫</span>

                </div>

                <p class="text-sm font-semibold text-gray-700 mt-3">
                    Data Kelas
                </p>

            </a>


            <!-- Nilai -->
            <a href="#"
               class="bg-white border border-gray-100 rounded-2xl p-5 text-center shadow-sm hover:shadow-md hover:-translate-y-1 transition group">

                <div class="w-12 h-12 mx-auto rounded-xl bg-yellow-50 text-yellow-600 flex items-center justify-center">

                    <span class="text-xl">📝</span>

                </div>

                <p class="text-sm font-semibold text-gray-700 mt-3">
                    Nilai
                </p>

            </a>


            <!-- SPP -->
            <a href="#"
               class="bg-white border border-gray-100 rounded-2xl p-5 text-center shadow-sm hover:shadow-md hover:-translate-y-1 transition group">

                <div class="w-12 h-12 mx-auto rounded-xl bg-red-50 text-red-600 flex items-center justify-center">

                    <span class="text-xl">💰</span>

                </div>

                <p class="text-sm font-semibold text-gray-700 mt-3">
                    SPP
                </p>

            </a>


            <!-- Pengumuman -->
            <a href="#"
               class="bg-white border border-gray-100 rounded-2xl p-5 text-center shadow-sm hover:shadow-md hover:-translate-y-1 transition group">

                <div class="w-12 h-12 mx-auto rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center">

                    <span class="text-xl">📢</span>

                </div>

                <p class="text-sm font-semibold text-gray-700 mt-3">
                    Pengumuman
                </p>

            </a>

        </div>

    </div>

</div>

@endsection