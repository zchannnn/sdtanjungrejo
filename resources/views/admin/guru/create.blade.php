@extends('layouts.app')

@section('title', 'Tambah Guru')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    {{-- Header --}}
    <div>
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
            <a href="{{ route('admin.guru.index') }}"
               class="hover:text-emerald-600 transition">
                Data Guru
            </a>
            <span>/</span>
            <span class="text-gray-700">Tambah Guru</span>
        </div>

        <h1 class="text-2xl font-bold text-gray-800">
            Tambah Data Guru
        </h1>

        <p class="text-sm text-gray-500 mt-1">
            Tambahkan data guru baru ke dalam sistem.
        </p>
    </div>

    {{-- Form --}}
    <form method="POST"
          action="{{ route('admin.guru.store') }}"
          class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

        @csrf

        {{-- Card Header --}}
        <div class="px-6 py-5 border-b border-gray-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-emerald-600"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-4a4 4 0 11-8 0 4 4 0 018 0zM4 20a6 6 0 0112 0">
                    </path>
                </svg>
            </div>

            <div>
                <h2 class="font-semibold text-gray-800">
                    Informasi Guru
                </h2>

                <p class="text-sm text-gray-500">
                    Isi data guru dengan lengkap dan benar.
                </p>
            </div>
        </div>

        {{-- Form Content --}}
        <div class="p-6 space-y-6">

            {{-- Data Utama --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-700 mb-4 flex items-center gap-2">
                    <span class="w-1.5 h-5 bg-emerald-500 rounded-full"></span>
                    Data Utama
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- Nama --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            name="nama"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                   text-sm text-gray-700
                                   focus:outline-none focus:ring-2 focus:ring-emerald-500/20
                                   focus:border-emerald-500 transition"
                            required
                        >
                    </div>

                    {{-- Jabatan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Jabatan
                        </label>

                        <select
                            name="jabatan"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                   text-sm text-gray-700 bg-white
                                   focus:outline-none focus:ring-2 focus:ring-emerald-500/20
                                   focus:border-emerald-500 transition"
                        >
                            <option value="Guru">Guru</option>
                            <option value="Kepala Sekolah">Kepala Sekolah</option>
                            <option value="Wakil Kepala Sekolah">Wakil Kepala Sekolah</option>
                            <option value="Guru Mapel">Guru Mapel</option>
                            <option value="Guru Kelas">Guru Kelas</option>
                            <option value="Tata Usaha">Tata Usaha</option>
                        </select>
                    </div>

                    {{-- ID Guru --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            ID Guru
                        </label>

                        <input
                            type="text"
                            name="id_guru"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                   text-sm text-gray-700
                                   focus:outline-none focus:ring-2 focus:ring-emerald-500/20
                                   focus:border-emerald-500 transition"
                            placeholder="Contoh: GR-0001"
                        >

                        <p class="text-xs text-gray-400 mt-1.5">
                            Kode internal sekolah, bebas.
                        </p>
                    </div>

                </div>
            </div>

            {{-- Akun Login --}}
            <div class="pt-2">
                <h3 class="text-sm font-semibold text-gray-700 mb-4 flex items-center gap-2">
                    <span class="w-1.5 h-5 bg-emerald-500 rounded-full"></span>
                    Akun Login
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                   text-sm text-gray-700
                                   focus:outline-none focus:ring-2 focus:ring-emerald-500/20
                                   focus:border-emerald-500 transition"
                            placeholder="contoh@email.com"
                            required
                        >

                        <p class="text-xs text-gray-400 mt-1.5">
                            Email digunakan untuk login.
                        </p>
                    </div>

                    {{-- Password --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                   text-sm text-gray-700
                                   focus:outline-none focus:ring-2 focus:ring-emerald-500/20
                                   focus:border-emerald-500 transition"
                            required
                        >
                    </div>

                </div>
            </div>

            {{-- Kontak --}}
            <div class="pt-2">
                <h3 class="text-sm font-semibold text-gray-700 mb-4 flex items-center gap-2">
                    <span class="w-1.5 h-5 bg-emerald-500 rounded-full"></span>
                    Kontak & Alamat
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- No HP --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            No HP
                        </label>

                        <input
                            type="text"
                            name="no_hp"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                   text-sm text-gray-700
                                   focus:outline-none focus:ring-2 focus:ring-emerald-500/20
                                   focus:border-emerald-500 transition"
                        >
                    </div>

                    {{-- Alamat --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Alamat
                        </label>

                        <input
                            type="text"
                            name="alamat"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                   text-sm text-gray-700
                                   focus:outline-none focus:ring-2 focus:ring-emerald-500/20
                                   focus:border-emerald-500 transition"
                        >
                    </div>

                </div>
            </div>

        </div>

        {{-- Footer --}}
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100
                    flex flex-col sm:flex-row gap-3 sm:justify-end">

            <a
                href="{{ route('admin.guru.index') }}"
                class="px-5 py-2.5 rounded-xl text-sm font-medium
                       bg-white border border-gray-200 text-gray-600
                       hover:bg-gray-100 transition text-center"
            >
                Batal
            </a>

            <button
                type="submit"
                class="px-5 py-2.5 rounded-xl text-sm font-medium
                       bg-emerald-600 text-white
                       hover:bg-emerald-700
                       shadow-sm transition"
            >
                Simpan
            </button>

        </div>

    </form>

</div>
@endsection