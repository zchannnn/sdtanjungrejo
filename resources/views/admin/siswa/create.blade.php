
@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div>
        <div class="flex items-center gap-2 text-sm text-gray-400 mb-2">
            <a href="{{ route('admin.siswa.index') }}"
               class="hover:text-emerald-600 transition">
                Data Siswa
            </a>
            <span>/</span>
            <span>Tambah Siswa</span>
        </div>

        <h1 class="text-2xl font-bold text-gray-800">
            Tambah Siswa
        </h1>

        <p class="text-sm text-gray-500 mt-1">
            Tambahkan data siswa baru ke dalam sistem sekolah.
        </p>
    </div>

    {{-- Form --}}
    <form
        method="POST"
        action="{{ route('admin.siswa.store') }}"
        class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden"
    >

        @csrf

        <div class="p-6 space-y-7">

            {{-- Data Dasar --}}
            <div>

                <div class="flex items-center gap-2 mb-4">
                    <div class="w-1 h-5 bg-emerald-500 rounded-full"></div>

                    <div>
                        <h3 class="font-semibold text-gray-800">
                            Data Dasar
                        </h3>

                        <p class="text-xs text-gray-400 mt-0.5">
                            Informasi utama siswa
                        </p>
                    </div>
                </div>

                <div class="space-y-4">

                    {{-- Nama --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Nama Lengkap
                        </label>

                        <input
                            name="nama"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                   text-sm text-gray-700
                                   placeholder-gray-400
                                   focus:outline-none focus:ring-2
                                   focus:ring-emerald-100
                                   focus:border-emerald-500
                                   transition"
                            placeholder="Masukkan nama lengkap siswa"
                            required
                        >
                    </div>

                    {{-- NISN + Jenis Kelamin --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                NISN
                            </label>

                            <input
                                name="nisn"
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                       text-sm text-gray-700
                                       placeholder-gray-400
                                       focus:outline-none focus:ring-2
                                       focus:ring-emerald-100
                                       focus:border-emerald-500
                                       transition"
                                placeholder="10 digit (opsional)"
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Jenis Kelamin
                            </label>

                            <select
                                name="jenis_kelamin"
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                       text-sm text-gray-700 bg-white
                                       focus:outline-none focus:ring-2
                                       focus:ring-emerald-100
                                       focus:border-emerald-500
                                       transition"
                                required
                            >
                                <option value="L">
                                    Laki-laki
                                </option>

                                <option value="P">
                                    Perempuan
                                </option>
                            </select>
                        </div>

                    </div>

                    {{-- Kelas --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Kelas
                        </label>

                        <select
                            name="kelas_id"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                   text-sm text-gray-700 bg-white
                                   focus:outline-none focus:ring-2
                                   focus:ring-emerald-100
                                   focus:border-emerald-500
                                   transition"
                        >
                            <option value="">
                                - Pilih Kelas -
                            </option>

                            @foreach($kelasList as $k)
                                <option value="{{ $k->id }}">
                                    {{ $k->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>

            {{-- Data Kelahiran --}}
            <div class="border-t border-gray-100 pt-7">

                <div class="flex items-center gap-2 mb-4">

                    <div class="w-1 h-5 bg-emerald-500 rounded-full"></div>

                    <div>
                        <h3 class="font-semibold text-gray-800">
                            Data Kelahiran
                        </h3>

                        <p class="text-xs text-gray-400 mt-0.5">
                            Informasi tempat dan tanggal lahir
                        </p>
                    </div>

                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Tempat Lahir
                        </label>

                        <input
                            name="tempat_lahir"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                   text-sm text-gray-700
                                   placeholder-gray-400
                                   focus:outline-none focus:ring-2
                                   focus:ring-emerald-100
                                   focus:border-emerald-500
                                   transition"
                            placeholder="Contoh: Medan"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Tanggal Lahir
                        </label>

                        <input
                            type="date"
                            name="tanggal_lahir"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                   text-sm text-gray-700
                                   focus:outline-none focus:ring-2
                                   focus:ring-emerald-100
                                   focus:border-emerald-500
                                   transition"
                        >
                    </div>

                </div>

            </div>

            {{-- Alamat --}}
            <div class="border-t border-gray-100 pt-7">

                <div class="flex items-center gap-2 mb-4">

                    <div class="w-1 h-5 bg-emerald-500 rounded-full"></div>

                    <div>
                        <h3 class="font-semibold text-gray-800">
                            Alamat
                        </h3>

                        <p class="text-xs text-gray-400 mt-0.5">
                            Informasi tempat tinggal siswa
                        </p>
                    </div>

                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Alamat Lengkap
                    </label>

                    <textarea
                        name="alamat"
                        rows="3"
                        placeholder="Masukkan alamat lengkap siswa"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                               text-sm text-gray-700 placeholder-gray-400
                               resize-none
                               focus:outline-none focus:ring-2
                               focus:ring-emerald-100
                               focus:border-emerald-500
                               transition"
                    ></textarea>
                </div>

            </div>

            {{-- Data Orang Tua --}}
            <div class="border-t border-gray-100 pt-7">

                <div class="flex items-center gap-2 mb-4">

                    <div class="w-1 h-5 bg-emerald-500 rounded-full"></div>

                    <div>
                        <h3 class="font-semibold text-gray-800">
                            Data Orang Tua
                        </h3>

                        <p class="text-xs text-gray-400 mt-0.5">
                            Informasi orang tua atau wali siswa
                        </p>
                    </div>

                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Nama Orang Tua
                        </label>

                        <input
                            name="nama_ortu"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                   text-sm text-gray-700
                                   placeholder-gray-400
                                   focus:outline-none focus:ring-2
                                   focus:ring-emerald-100
                                   focus:border-emerald-500
                                   transition"
                            placeholder="Masukkan nama orang tua"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            No. HP Orang Tua
                        </label>

                        <input
                            name="no_hp_ortu"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                   text-sm text-gray-700
                                   placeholder-gray-400
                                   focus:outline-none focus:ring-2
                                   focus:ring-emerald-100
                                   focus:border-emerald-500
                                   transition"
                            placeholder="Contoh: 081234567890"
                        >
                    </div>

                </div>

            </div>

            {{-- Akun Orang Tua --}}
            <div class="border-t border-gray-100 pt-7">

                <div class="flex items-center gap-2 mb-4">

                    <div class="w-1 h-5 bg-emerald-500 rounded-full"></div>

                    <div>
                        <h3 class="font-semibold text-gray-800">
                            Akun Login Orang Tua
                        </h3>

                        <p class="text-xs text-gray-400 mt-0.5">
                            Opsional untuk memberikan akses login kepada orang tua
                        </p>
                    </div>

                </div>

                <div class="bg-gray-50 border border-gray-100 rounded-xl p-4">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Email Ortu
                            </label>

                            <input
                                type="email"
                                name="email_ortu"
                                class="w-full border border-gray-200 rounded-xl
                                       px-4 py-2.5 text-sm text-gray-700
                                       bg-white placeholder-gray-400
                                       focus:outline-none focus:ring-2
                                       focus:ring-emerald-100
                                       focus:border-emerald-500
                                       transition"
                                placeholder="email@example.com"
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password_ortu"
                                class="w-full border border-gray-200 rounded-xl
                                       px-4 py-2.5 text-sm text-gray-700
                                       bg-white placeholder-gray-400
                                       focus:outline-none focus:ring-2
                                       focus:ring-emerald-100
                                       focus:border-emerald-500
                                       transition"
                                placeholder="Masukkan password"
                            >
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Footer --}}
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100
                    flex flex-col-reverse sm:flex-row sm:justify-end gap-2">

            <a
                href="{{ route('admin.siswa.index') }}"
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
                Simpan Siswa
            </button>

        </div>

    </form>

</div>

@endsection
