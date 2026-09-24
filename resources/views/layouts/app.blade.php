<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Sistem Administrasi') - SD Tanjung Rejo</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-scroll::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,.15);
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

<div class="flex min-h-screen relative">

    {{-- Overlay Mobile --}}
    <div
        id="sidebar-overlay"
        onclick="toggleSidebar()"
        class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-20 md:hidden">
    </div>


    {{-- ========================================================= --}}
    {{-- SIDEBAR --}}
    {{-- ========================================================= --}}
    <aside
        id="sidebar"
        class="w-64 bg-emerald-800 text-white flex-shrink-0
               fixed md:static inset-y-0 left-0 z-30
               -translate-x-full md:translate-x-0
               transition-transform duration-200
               overflow-y-auto sidebar-scroll">

        {{-- Logo / Brand --}}
        <div class="px-5 py-5 border-b border-emerald-700/70">

            <div class="flex items-center justify-between">

                <div class="flex items-center gap-3">

                    {{-- Icon Sekolah --}}
                    <div class="w-10 h-10 rounded-xl bg-white/10
                                flex items-center justify-center
                                border border-white/10">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 text-white"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 14l9-5-9-5-9 5 9 5z"/>

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M5 12v4.5c0 .8 3.1 3.5 7 3.5s7-2.7 7-3.5V12"/>

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21 9v6"/>
                        </svg>

                    </div>

                    <div>
                        <h1 class="font-bold text-base leading-tight">
                            SD Tanjung Rejo
                        </h1>

                        <p class="text-emerald-200 text-[11px] mt-1">
                            Sistem Administrasi
                        </p>
                    </div>

                </div>

                {{-- Close Mobile --}}
                <button
                    onclick="toggleSidebar()"
                    class="md:hidden text-emerald-200 hover:text-white
                           text-2xl leading-none">

                    &times;

                </button>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- NAVIGATION --}}
        {{-- ========================================================= --}}
        <nav class="p-3 space-y-1 text-sm">

            @auth

                {{-- ================================================= --}}
                {{-- ADMIN --}}
                {{-- ================================================= --}}
                @if(auth()->user()->hasRole('admin'))

                    <p class="px-3 pt-2 pb-2 text-[10px] font-semibold
                              text-emerald-300 uppercase tracking-wider">
                        Menu Utama
                    </p>

                    {{-- Dashboard --}}
                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl
                               transition
                               {{ request()->routeIs('admin.dashboard')
                                    ? 'bg-white text-emerald-800 shadow-sm'
                                    : 'text-emerald-50 hover:bg-emerald-700' }}">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5 flex-shrink-0"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M3 12l9-9 9 9"/>
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M5 10v10h14V10"/>
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 20v-6h6v6"/>
                        </svg>

                        <span>Dashboard</span>
                    </a>


                    {{-- Data Siswa --}}
                    <a
                        href="{{ route('admin.siswa.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl
                               transition
                               {{ request()->routeIs('admin.siswa.*')
                                    ? 'bg-white text-emerald-800 shadow-sm'
                                    : 'text-emerald-50 hover:bg-emerald-700' }}">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5 flex-shrink-0"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/>

                            <circle cx="9" cy="7" r="4"/>

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M22 21v-2a4 4 0 00-3-3.87"/>

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M16 3.13a4 4 0 010 7.75"/>
                        </svg>

                        <span>Data Siswa</span>
                    </a>


                    {{-- Data Guru --}}
                    <a
                        href="{{ route('admin.guru.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl
                               transition
                               {{ request()->routeIs('admin.guru.*')
                                    ? 'bg-white text-emerald-800 shadow-sm'
                                    : 'text-emerald-50 hover:bg-emerald-700' }}">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5 flex-shrink-0"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">

                            <circle cx="12" cy="7" r="4"/>

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M5.5 21a6.5 6.5 0 0113 0"/>
                        </svg>

                        <span>Data Guru</span>
                    </a>


                    {{-- Data Kelas --}}
                    <a
                        href="{{ route('admin.kelas.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl
                               transition
                               {{ request()->routeIs('admin.kelas.*')
                                    ? 'bg-white text-emerald-800 shadow-sm'
                                    : 'text-emerald-50 hover:bg-emerald-700' }}">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5 flex-shrink-0"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M3 21h18"/>
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M5 21V5l7-3 7 3v16"/>
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 9h1M14 9h1M9 13h1M14 13h1M9 17h1M14 17h1"/>
                        </svg>

                        <span>Data Kelas</span>
                    </a>


                    {{-- Mata Pelajaran --}}
                    <a
                        href="{{ route('admin.mapel.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl
                               transition
                               {{ request()->routeIs('admin.mapel.*')
                                    ? 'bg-white text-emerald-800 shadow-sm'
                                    : 'text-emerald-50 hover:bg-emerald-700' }}">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5 flex-shrink-0"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M4 19.5A2.5 2.5 0 016.5 17H20"/>
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/>
                        </svg>

                        <span>Mata Pelajaran</span>
                    </a>


                    {{-- Jadwal --}}
                    <a
                        href="{{ route('admin.jadwal.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl
                               transition
                               {{ request()->routeIs('admin.jadwal.*')
                                    ? 'bg-white text-emerald-800 shadow-sm'
                                    : 'text-emerald-50 hover:bg-emerald-700' }}">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5 flex-shrink-0"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">

                            <rect x="3" y="4" width="18" height="18" rx="2"/>
                            <path stroke-linecap="round"
                                  d="M16 2v4M8 2v4M3 10h18"/>
                        </svg>

                        <span>Jadwal Pelajaran</span>
                    </a>


                    {{-- Tahun Ajaran --}}
                    <a
                        href="{{ route('admin.tahunajaran.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl
                               transition
                               {{ request()->routeIs('admin.tahunajaran.*')
                                    ? 'bg-white text-emerald-800 shadow-sm'
                                    : 'text-emerald-50 hover:bg-emerald-700' }}">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5 flex-shrink-0"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 6v6l4 2"/>
                            <circle cx="12" cy="12" r="9"/>
                        </svg>

                        <span>Tahun Ajaran</span>
                    </a>


                    {{-- SPP --}}
                    <a
                        href="{{ route('admin.spp.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl
                               transition
                               {{ request()->routeIs('admin.spp.*')
                                    ? 'bg-white text-emerald-800 shadow-sm'
                                    : 'text-emerald-50 hover:bg-emerald-700' }}">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5 flex-shrink-0"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">

                            <rect x="3" y="5" width="18" height="14" rx="2"/>
                            <path stroke-linecap="round"
                                  d="M3 10h18"/>
                            <path stroke-linecap="round"
                                  d="M7 15h4"/>
                        </svg>

                        <span>Pembayaran SPP</span>
                    </a>


                    {{-- Pengumuman --}}
                    <a
                        href="{{ route('admin.pengumuman.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl
                               transition
                               {{ request()->routeIs('admin.pengumuman.*')
                                    ? 'bg-white text-emerald-800 shadow-sm'
                                    : 'text-emerald-50 hover:bg-emerald-700' }}">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5 flex-shrink-0"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M18 8a6 6 0 00-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"/>
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M10 21h4"/>
                        </svg>

                        <span>Pengumuman</span>
                    </a>


                    {{-- Section Administrasi --}}
                    <p class="px-3 pt-5 pb-2 text-[10px] font-semibold
                              text-emerald-300 uppercase tracking-wider">
                        Administrasi
                    </p>


                    {{-- PPDB --}}
                    <a
                        href="{{ route('admin.ppdb.index') }}"
                        class="flex items-center justify-between px-3 py-2.5 rounded-xl
                               transition
                               {{ request()->routeIs('admin.ppdb.*')
                                    ? 'bg-white text-emerald-800 shadow-sm'
                                    : 'text-emerald-50 hover:bg-emerald-700' }}">

                        <div class="flex items-center gap-3">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5 flex-shrink-0"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M4 19.5A2.5 2.5 0 016.5 17H20"/>
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/>
                            </svg>

                            <span>PPDB Online</span>

                        </div>

                        @php
                            $jumlahMenunggu = \App\Models\PendaftaranPpdb::where('status','Menunggu')->count()
                        @endphp

                        @if($jumlahMenunggu > 0)
                            <span class="text-[10px] font-semibold
                                         bg-red-500 text-white
                                         rounded-full min-w-5 h-5
                                         flex items-center justify-center px-1.5">
                                {{ $jumlahMenunggu }}
                            </span>
                        @endif

                    </a>


                    {{-- Verifikasi --}}
                    <a
                        href="{{ route('admin.verifikasi.index') }}"
                        class="flex items-center justify-between px-3 py-2.5 rounded-xl
                               transition
                               {{ request()->routeIs('admin.verifikasi.*')
                                    ? 'bg-white text-emerald-800 shadow-sm'
                                    : 'text-emerald-50 hover:bg-emerald-700' }}">

                        <div class="flex items-center gap-3">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5 flex-shrink-0"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M9 12l2 2 4-4"/>

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M12 3l7 4v5c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V7l7-4z"/>
                            </svg>

                            <span>Verifikasi Akun</span>

                        </div>

                        @php
                            $jumlahBelumVerifikasi = \App\Models\User::where('is_verified', false)->count()
                        @endphp

                        @if($jumlahBelumVerifikasi > 0)
                            <span class="text-[10px] font-semibold
                                         bg-red-500 text-white
                                         rounded-full min-w-5 h-5
                                         flex items-center justify-center px-1.5">
                                {{ $jumlahBelumVerifikasi }}
                            </span>
                        @endif

                    </a>


                {{-- ================================================= --}}
                {{-- GURU --}}
                {{-- ================================================= --}}
                @elseif(auth()->user()->hasRole('guru'))

                    <p class="px-3 pt-2 pb-2 text-[10px] font-semibold
                              text-emerald-300 uppercase tracking-wider">
                        Menu Guru
                    </p>

                    <a
                        href="{{ route('guru.dashboard') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl
                               {{ request()->routeIs('guru.dashboard')
                                    ? 'bg-white text-emerald-800 shadow-sm'
                                    : 'text-emerald-50 hover:bg-emerald-700' }}">

                        <span>Dashboard</span>
                    </a>

                    <a
                        href="{{ route('guru.jadwal.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl
                               {{ request()->routeIs('guru.jadwal.*')
                                    ? 'bg-white text-emerald-800 shadow-sm'
                                    : 'text-emerald-50 hover:bg-emerald-700' }}">

                        <span>Jadwal Mengajar</span>
                    </a>

                    <a
                        href="{{ route('guru.pengumuman.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl
                               {{ request()->routeIs('guru.pengumuman.*')
                                    ? 'bg-white text-emerald-800 shadow-sm'
                                    : 'text-emerald-50 hover:bg-emerald-700' }}">

                        <span>Pengumuman</span>
                    </a>

                    <p class="px-3 pt-5 pb-2 text-[10px] font-semibold
                              text-emerald-300 uppercase tracking-wider">
                        Kelas Wali
                    </p>

                    @foreach(auth()->user()->guru?->kelasWali ?? [] as $k)

                        <a
                            href="{{ route('guru.absensi.form', $k) }}"
                            class="block px-3 py-2.5 rounded-xl
                                   text-emerald-50 hover:bg-emerald-700 transition">

                            Absensi {{ $k->nama_kelas }}

                        </a>

                        <a
                            href="{{ route('guru.nilai.form', $k) }}"
                            class="block px-3 py-2.5 rounded-xl
                                   text-emerald-50 hover:bg-emerald-700 transition">

                            Nilai {{ $k->nama_kelas }}

                        </a>

                    @endforeach


                {{-- ================================================= --}}
                {{-- ORANG TUA --}}
                {{-- ================================================= --}}
                @elseif(auth()->user()->hasRole('ortu'))

                    <p class="px-3 pt-2 pb-2 text-[10px] font-semibold
                              text-emerald-300 uppercase tracking-wider">
                        Menu Orang Tua
                    </p>

                    <a
                        href="{{ route('ortu.dashboard') }}"
                        class="block px-3 py-2.5 rounded-xl
                               {{ request()->routeIs('ortu.dashboard')
                                    ? 'bg-white text-emerald-800 shadow-sm'
                                    : 'text-emerald-50 hover:bg-emerald-700' }}">

                        Dashboard
                    </a>

                    <a
                        href="{{ route('ortu.absensi.index') }}"
                        class="block px-3 py-2.5 rounded-xl
                               {{ request()->routeIs('ortu.absensi.*')
                                    ? 'bg-white text-emerald-800 shadow-sm'
                                    : 'text-emerald-50 hover:bg-emerald-700' }}">

                        Absensi Anak
                    </a>

                    <a
                        href="{{ route('ortu.nilai.index') }}"
                        class="block px-3 py-2.5 rounded-xl
                               {{ request()->routeIs('ortu.nilai.*')
                                    ? 'bg-white text-emerald-800 shadow-sm'
                                    : 'text-emerald-50 hover:bg-emerald-700' }}">

                        Nilai & Rapor
                    </a>

                    <a
                        href="{{ route('ortu.jadwal.index') }}"
                        class="block px-3 py-2.5 rounded-xl
                               {{ request()->routeIs('ortu.jadwal.*')
                                    ? 'bg-white text-emerald-800 shadow-sm'
                                    : 'text-emerald-50 hover:bg-emerald-700' }}">

                        Jadwal Pelajaran
                    </a>

                    <a
                        href="{{ route('ortu.spp.index') }}"
                        class="block px-3 py-2.5 rounded-xl
                               {{ request()->routeIs('ortu.spp.*')
                                    ? 'bg-white text-emerald-800 shadow-sm'
                                    : 'text-emerald-50 hover:bg-emerald-700' }}">

                        Pembayaran SPP
                    </a>

                    <a
                        href="{{ route('ortu.pengumuman.index') }}"
                        class="block px-3 py-2.5 rounded-xl
                               {{ request()->routeIs('ortu.pengumuman.*')
                                    ? 'bg-white text-emerald-800 shadow-sm'
                                    : 'text-emerald-50 hover:bg-emerald-700' }}">

                        Pengumuman
                    </a>

                @endif

            @endauth

        </nav>


        {{-- Sidebar Bottom --}}
        @auth
        <div class="p-3 mt-4">

            <div class="rounded-xl bg-emerald-900/50 border border-emerald-700/50 p-3">

                <div class="flex items-center gap-3">

                    <div class="w-9 h-9 rounded-full bg-white
                                flex items-center justify-center
                                text-emerald-700 font-bold text-sm">

                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                    </div>

                    <div class="min-w-0">

                        <p class="text-sm font-semibold text-white truncate">
                            {{ auth()->user()->name }}
                        </p>

                        <p class="text-[11px] text-emerald-300 truncate">
                            {{ ucfirst(auth()->user()->getRoleNames()->first()) }}
                        </p>

                    </div>

                </div>

            </div>

        </div>
        @endauth

    </aside>


    {{-- ========================================================= --}}
    {{-- MAIN CONTENT --}}
    {{-- ========================================================= --}}
    <div class="flex-1 flex flex-col min-w-0">


        {{-- Header --}}
        <header
            class="bg-white border-b border-gray-100
                   px-4 md:px-6 py-3.5
                   flex items-center justify-between gap-3
                   sticky top-0 z-10">

            <div class="flex items-center gap-3 min-w-0">

                {{-- Mobile Menu --}}
                <button
                    onclick="toggleSidebar()"
                    class="md:hidden w-9 h-9 rounded-lg
                           flex items-center justify-center
                           text-gray-600 hover:bg-gray-100
                           transition flex-shrink-0"
                    aria-label="Buka menu">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>

                </button>


                <div class="min-w-0">

                    <h2 class="font-semibold text-lg text-gray-800 truncate">
                        @yield('title', 'Dashboard')
                    </h2>

                    <p class="hidden md:block text-xs text-gray-400 mt-0.5">
                        Sistem Administrasi SD Tanjung Rejo
                    </p>

                </div>

            </div>


            {{-- User Header --}}
            @auth

            <div class="flex items-center gap-2 md:gap-3 flex-shrink-0">

                <div class="hidden sm:block text-right">

                    <p class="text-sm font-medium text-gray-700 leading-tight">
                        {{ auth()->user()->name }}
                    </p>

                    <p class="text-[11px] text-gray-400">
                        {{ ucfirst(auth()->user()->getRoleNames()->first()) }}
                    </p>

                </div>


                {{-- Avatar --}}
                <div
                    class="w-9 h-9 rounded-full
                           bg-emerald-100 text-emerald-700
                           flex items-center justify-center
                           font-semibold text-sm">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>


                {{-- Logout --}}
                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button
                        class="w-9 h-9 rounded-lg
                               flex items-center justify-center
                               text-gray-400 hover:text-red-600
                               hover:bg-red-50 transition"
                        title="Keluar">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4"/>

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M10 17l5-5-5-5"/>

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15 12H3"/>
                        </svg>

                    </button>

                </form>

            </div>

            @endauth

        </header>


        {{-- ========================================================= --}}
        {{-- CONTENT --}}
        {{-- ========================================================= --}}
        <main class="p-4 md:p-6 flex-1">


            {{-- Success --}}
            @if(session('success'))

                <div
                    class="mb-5 px-4 py-3.5
                           bg-emerald-50 border border-emerald-100
                           text-emerald-700 rounded-xl
                           text-sm flex items-center gap-3">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 flex-shrink-0"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5 13l4 4L19 7"/>
                    </svg>

                    <span>{{ session('success') }}</span>

                </div>

            @endif


            {{-- Errors --}}
            @if($errors->any())

                <div
                    class="mb-5 px-4 py-3.5
                           bg-red-50 border border-red-100
                           text-red-700 rounded-xl text-sm">

                    <div class="flex items-center gap-2 mb-2 font-medium">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 9v3m0 4h.01M5.07 19h13.86a2 2 0 001.73-3L13.73 4a2 2 0 00-3.46 0L3.34 16a2 2 0 001.73 3z"/>
                        </svg>

                        <span>
                            Terjadi kesalahan:
                        </span>

                    </div>

                    <ul class="list-disc list-inside space-y-1">

                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif


            @yield('content')

        </main>

    </div>

</div>


{{-- ========================================================= --}}
{{-- SIDEBAR SCRIPT --}}
{{-- ========================================================= --}}
<script>
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');

    sidebar.classList.toggle('-translate-x-full');
    overlay.classList.toggle('hidden');
}
</script>

</body>
</html>