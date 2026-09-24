@extends('layouts.public')

@section('title', 'Pendaftaran Siswa Baru')

@section('content')

<div class="min-h-screen bg-gray-50 px-5 py-10 sm:py-14">

    <div class="max-w-3xl mx-auto">

        <!-- Header -->
        <div class="text-center mb-8">

            <div class="inline-flex items-center justify-center w-14 h-14
                        bg-emerald-100 text-emerald-700 rounded-2xl mb-4">

                <svg class="w-7 h-7" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M5 10v5c0 1 3.134 3 7 3s7-2 7-3v-5" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M21 9v6" />
                </svg>

            </div>

            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">
                Formulir Pendaftaran Siswa Baru
            </h1>

            <p class="text-sm sm:text-base text-gray-500 mt-2 max-w-xl mx-auto leading-6">
                Isi data calon siswa dan orang tua/wali dengan benar.
                Tim sekolah akan menghubungi Anda setelah data diverifikasi.
            </p>

        </div>

        <!-- Error -->
        @if($errors->any())

            <div class="mb-6 bg-red-50 border border-red-200 rounded-2xl p-4">

                <div class="flex items-start gap-3">

                    <div class="w-9 h-9 rounded-xl bg-red-100 text-red-600
                                flex items-center justify-center shrink-0">

                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 9v4m0 4h.01M10.29 3.86l-7.82 14a2 2 0 001.74 3h15.58a2 2 0 001.74-3l-7.82-14a2 2 0 00-3.42 0z" />
                        </svg>

                    </div>

                    <div>
                        <p class="font-semibold text-red-800 text-sm">
                            Terdapat kesalahan pada data
                        </p>

                        <ul class="list-disc list-inside text-sm text-red-700 mt-1 space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>

            </div>

        @endif

        <!-- Form -->
        <form
            method="POST"
            action="{{ route('ppdb.store') }}"
            class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden"
        >

            @csrf

            <!-- Data Calon Siswa -->
            <div class="p-6 sm:p-8">

                <div class="flex items-center gap-3 mb-6">

                    <div class="w-10 h-10 rounded-xl bg-emerald-100
                                text-emerald-700 flex items-center justify-center">

                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>

                    </div>

                    <div>
                        <h2 class="font-bold text-gray-800">
                            Data Calon Siswa
                        </h2>

                        <p class="text-xs text-gray-500 mt-0.5">
                            Lengkapi informasi calon siswa
                        </p>
                    </div>

                </div>

                <!-- Nama -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Nama Lengkap Calon Siswa
                    </label>

                    <input
                        name="nama_calon_siswa"
                        value="{{ old('nama_calon_siswa') }}"
                        required
                        placeholder="Masukkan nama lengkap"
                        class="w-full border-gray-200 rounded-xl px-4 py-3
                               text-sm text-gray-800
                               focus:border-emerald-500 focus:ring-emerald-500
                               placeholder:text-gray-400"
                    >
                </div>

                <!-- Jenis Kelamin & Kelas -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mt-5">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Jenis Kelamin
                        </label>

                        <select
                            name="jenis_kelamin"
                            required
                            class="w-full border-gray-200 rounded-xl px-4 py-3
                                   text-sm text-gray-700
                                   focus:border-emerald-500 focus:ring-emerald-500"
                        >
                            <option value="">- Pilih -</option>
                            <option value="L" @selected(old('jenis_kelamin') == 'L')>
                                Laki-laki
                            </option>
                            <option value="P" @selected(old('jenis_kelamin') == 'P')>
                                Perempuan
                            </option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Mendaftar ke Kelas
                        </label>

                        <select
                            name="kelas_dituju"
                            required
                            class="w-full border-gray-200 rounded-xl px-4 py-3
                                   text-sm text-gray-700
                                   focus:border-emerald-500 focus:ring-emerald-500"
                        >
                            @for($i = 1; $i <= 6; $i++)
                                <option
                                    value="{{ $i }}"
                                    @selected(old('kelas_dituju') == $i)
                                >
                                    Kelas {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>

                </div>

                <!-- Tempat & Tanggal Lahir -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mt-5">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Tempat Lahir
                        </label>

                        <input
                            name="tempat_lahir"
                            value="{{ old('tempat_lahir') }}"
                            placeholder="Contoh: Medan"
                            class="w-full border-gray-200 rounded-xl px-4 py-3
                                   text-sm text-gray-800
                                   focus:border-emerald-500 focus:ring-emerald-500
                                   placeholder:text-gray-400"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Tanggal Lahir
                        </label>

                        <input
                            type="date"
                            name="tanggal_lahir"
                            value="{{ old('tanggal_lahir') }}"
                            class="w-full border-gray-200 rounded-xl px-4 py-3
                                   text-sm text-gray-800
                                   focus:border-emerald-500 focus:ring-emerald-500"
                        >
                    </div>

                </div>

                <!-- Asal Sekolah -->
                <div class="mt-5">

                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Asal Sekolah (TK/RA)
                    </label>

                    <input
                        name="asal_sekolah"
                        value="{{ old('asal_sekolah') }}"
                        placeholder="Masukkan nama TK/RA"
                        class="w-full border-gray-200 rounded-xl px-4 py-3
                               text-sm text-gray-800
                               focus:border-emerald-500 focus:ring-emerald-500
                               placeholder:text-gray-400"
                    >

                </div>

                <!-- Alamat -->
                <div class="mt-5">

                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Alamat Lengkap
                    </label>

                    <input
                        name="alamat"
                        value="{{ old('alamat') }}"
                        placeholder="Masukkan alamat lengkap"
                        class="w-full border-gray-200 rounded-xl px-4 py-3
                               text-sm text-gray-800
                               focus:border-emerald-500 focus:ring-emerald-500
                               placeholder:text-gray-400"
                    >

                </div>

            </div>

            <!-- Data Orang Tua -->
            <div class="border-t border-gray-100 p-6 sm:p-8 bg-gray-50/50">

                <div class="flex items-center gap-3 mb-6">

                    <div class="w-10 h-10 rounded-xl bg-emerald-100
                                text-emerald-700 flex items-center justify-center">

                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>

                    </div>

                    <div>
                        <h2 class="font-bold text-gray-800">
                            Data Orang Tua / Wali
                        </h2>

                        <p class="text-xs text-gray-500 mt-0.5">
                            Informasi untuk keperluan komunikasi
                        </p>
                    </div>

                </div>

                <!-- Ayah & Ibu -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Nama Ayah
                        </label>

                        <input
                            name="nama_ayah"
                            value="{{ old('nama_ayah') }}"
                            placeholder="Masukkan nama ayah"
                            class="w-full border-gray-200 rounded-xl px-4 py-3
                                   text-sm text-gray-800
                                   focus:border-emerald-500 focus:ring-emerald-500
                                   placeholder:text-gray-400"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Nama Ibu
                        </label>

                        <input
                            name="nama_ibu"
                            value="{{ old('nama_ibu') }}"
                            placeholder="Masukkan nama ibu"
                            class="w-full border-gray-200 rounded-xl px-4 py-3
                                   text-sm text-gray-800
                                   focus:border-emerald-500 focus:ring-emerald-500
                                   placeholder:text-gray-400"
                        >
                    </div>

                </div>

                <!-- HP & Email -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mt-5">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            No HP / WhatsApp Aktif
                        </label>

                        <input
                            name="no_hp_ortu"
                            value="{{ old('no_hp_ortu') }}"
                            required
                            placeholder="Contoh: 081234567890"
                            class="w-full border-gray-200 rounded-xl px-4 py-3
                                   text-sm text-gray-800
                                   focus:border-emerald-500 focus:ring-emerald-500
                                   placeholder:text-gray-400"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Email
                            <span class="text-gray-400 font-normal">(opsional)</span>
                        </label>

                        <input
                            type="email"
                            name="email_ortu"
                            value="{{ old('email_ortu') }}"
                            placeholder="Contoh: nama@email.com"
                            class="w-full border-gray-200 rounded-xl px-4 py-3
                                   text-sm text-gray-800
                                   focus:border-emerald-500 focus:ring-emerald-500
                                   placeholder:text-gray-400"
                        >
                    </div>

                </div>

            </div>

            <!-- Submit -->
            <div class="p-6 sm:p-8 border-t border-gray-100">

                <button
                    type="submit"
                    class="w-full bg-emerald-600 hover:bg-emerald-700
                           text-white py-3.5 rounded-xl font-semibold
                           flex items-center justify-center gap-2
                           shadow-sm hover:shadow-md
                           transition duration-200"
                >

                    <svg
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-5"
                        />
                    </svg>

                    Kirim Pendaftaran

                </button>

                <p class="text-center text-xs text-gray-400 mt-3">
                    Pastikan seluruh data yang dimasukkan sudah benar sebelum dikirim.
                </p>

            </div>

        </form>

    </div>

</div>

@endsection