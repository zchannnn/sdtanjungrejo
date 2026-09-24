@extends('layouts.app')

@section('title', 'Ubah Guru')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                <a href="{{ route('admin.guru.index') }}" class="hover:text-emerald-600 transition">
                    Data Guru
                </a>
                <span>/</span>
                <span class="text-gray-700">Ubah Guru</span>
            </div>

            <h1 class="text-2xl font-bold text-gray-800">
                Ubah Data Guru
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                Perbarui informasi data guru di bawah ini.
            </p>
        </div>
    </div>

    {{-- Form Card --}}
    <form method="POST"
          action="{{ route('admin.guru.update', $guru) }}"
          class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

        @csrf
        @method('PUT')

        {{-- Card Header --}}
        <div class="px-6 py-5 border-b border-gray-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center">
                <span class="text-lg font-bold text-emerald-700">
                    {{ strtoupper(substr($guru->nama, 0, 1)) }}
                </span>
            </div>

            <div>
                <h2 class="font-semibold text-gray-800">
                    Informasi Guru
                </h2>
                <p class="text-sm text-gray-500">
                    Silakan perbarui data guru dengan benar.
                </p>
            </div>
        </div>

        {{-- Form Content --}}
        <div class="p-6 space-y-6">

            {{-- Informasi Utama --}}
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
                            value="{{ $guru->nama }}"
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
                            @foreach(['Guru','Kepala Sekolah','Wakil Kepala Sekolah','Guru Mapel','Guru Kelas','Tata Usaha'] as $j)
                                <option value="{{ $j }}" @selected($guru->jabatan == $j)>
                                    {{ $j }}
                                </option>
                            @endforeach
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
                            value="{{ $guru->id_guru }}"
                            placeholder="Contoh: GR-0001"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                   text-sm text-gray-700
                                   focus:outline-none focus:ring-2 focus:ring-emerald-500/20
                                   focus:border-emerald-500 transition"
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
                            value="{{ $guru->no_hp }}"
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
                            value="{{ $guru->alamat }}"
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
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex flex-col sm:flex-row gap-3 sm:justify-end">

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
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>
@endsection