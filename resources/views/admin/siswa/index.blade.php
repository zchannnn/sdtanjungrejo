@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Data Siswa</h1>
            <p class="text-sm text-gray-500 mt-1">
                Kelola data siswa yang terdaftar di sekolah.
            </p>
        </div>

        <a href="{{ route('admin.siswa.create') }}"
           class="inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700
                  text-white px-4 py-2.5 rounded-xl text-sm font-medium shadow-sm transition">
            <span class="text-lg leading-none">+</span>
            Tambah Siswa
        </a>
    </div>

    {{-- Filter Card --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4">
        <form method="GET" class="flex flex-col md:flex-row gap-3">

            {{-- Search --}}
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m21 21-4.35-4.35m0 0A7.5 7.5 0 1 0 6.04 6.04a7.5 7.5 0 0 0 10.61 10.61Z"/>
                    </svg>
                </div>

                <input
                    type="text"
                    name="cari"
                    value="{{ request('cari') }}"
                    placeholder="Cari nama siswa..."
                    class="w-full border border-gray-200 rounded-xl pl-10 pr-4 py-2.5
                           text-sm text-gray-700 placeholder-gray-400
                           focus:outline-none focus:ring-2 focus:ring-emerald-100
                           focus:border-emerald-500 transition"
                >
            </div>

            {{-- Kelas --}}
            <select
                name="kelas_id"
                class="border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-600
                       focus:outline-none focus:ring-2 focus:ring-emerald-100
                       focus:border-emerald-500 bg-white min-w-[180px]"
            >
                <option value="">Semua Kelas</option>

                @foreach($kelasList as $k)
                    <option value="{{ $k->id }}"
                        @selected(request('kelas_id') == $k->id)>
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>

            {{-- Button --}}
            <button
                type="submit"
                class="bg-gray-800 hover:bg-gray-900 text-white px-5 py-2.5
                       rounded-xl text-sm font-medium transition"
            >
                Filter
            </button>

            @if(request('cari') || request('kelas_id'))
                <a href="{{ route('admin.siswa.index') }}"
                   class="flex items-center justify-center px-4 py-2.5
                          rounded-xl border border-gray-200 text-gray-600
                          hover:bg-gray-50 text-sm transition">
                    Reset
                </a>
            @endif

        </form>
    </div>

    {{-- Table Card --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

        {{-- Table Header --}}
        <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-gray-800">Daftar Siswa</h2>
                <p class="text-xs text-gray-400 mt-1">
                    Data siswa yang tersimpan dalam sistem
                </p>
            </div>

            <div class="bg-emerald-50 text-emerald-700 px-3 py-1.5 rounded-lg text-xs font-medium">
                {{ $siswas->total() }} Siswa
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm">

                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr class="text-left text-xs uppercase tracking-wide text-gray-500">
                        <th class="px-5 py-3.5 font-semibold">NISN</th>
                        <th class="px-4 py-3.5 font-semibold">Nama Siswa</th>
                        <th class="px-4 py-3.5 font-semibold">L/P</th>
                        <th class="px-4 py-3.5 font-semibold">Kelas</th>
                        <th class="px-4 py-3.5 font-semibold">Status</th>
                        <th class="px-5 py-3.5 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($siswas as $s)

                        <tr class="hover:bg-emerald-50/30 transition">

                            {{-- NISN --}}
                            <td class="px-5 py-4">
                                <span class="font-medium text-gray-700">
                                    {{ $s->nisn ?? '-' }}
                                </span>
                            </td>

                            {{-- Nama --}}
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-3">

                                    <div class="w-9 h-9 rounded-full bg-emerald-100
                                                text-emerald-700 flex items-center
                                                justify-center font-semibold text-sm">
                                        {{ strtoupper(substr($s->nama, 0, 1)) }}
                                    </div>

                                    <div>
                                        <p class="font-medium text-gray-800">
                                            {{ $s->nama }}
                                        </p>
                                        <p class="text-xs text-gray-400">
                                            Siswa
                                        </p>
                                    </div>

                                </div>
                            </td>

                            {{-- Jenis Kelamin --}}
                            <td class="px-4 py-4">
                                @if($s->jenis_kelamin == 'L')
                                    <span class="inline-flex items-center px-2.5 py-1
                                                 rounded-lg bg-blue-50 text-blue-700
                                                 text-xs font-medium">
                                        Laki-laki
                                    </span>
                                @elseif($s->jenis_kelamin == 'P')
                                    <span class="inline-flex items-center px-2.5 py-1
                                                 rounded-lg bg-pink-50 text-pink-700
                                                 text-xs font-medium">
                                        Perempuan
                                    </span>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>

                            {{-- Kelas --}}
                            <td class="px-4 py-4">
                                <span class="text-gray-600">
                                    {{ $s->kelas?->nama_kelas ?? '-' }}
                                </span>
                            </td>

                            {{-- Status --}}
                            <td class="px-4 py-4">
                                @if($s->status == 'Aktif')
                                    <span class="inline-flex items-center gap-1.5
                                                 px-2.5 py-1 rounded-full
                                                 bg-emerald-50 text-emerald-700
                                                 text-xs font-medium">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Aktif
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5
                                                 px-2.5 py-1 rounded-full
                                                 bg-gray-100 text-gray-600
                                                 text-xs font-medium">
                                        <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                                        {{ $s->status }}
                                    </span>
                                @endif
                            </td>

                            {{-- Aksi --}}
                            <td class="px-5 py-4">
                                <div class="flex items-center justify-end gap-2">

                                    <a href="{{ route('admin.siswa.edit', $s) }}"
                                       class="inline-flex items-center px-3 py-1.5
                                              rounded-lg bg-emerald-50 text-emerald-700
                                              hover:bg-emerald-100 text-xs font-medium
                                              transition">
                                        Ubah
                                    </a>

                                    <form
                                        action="{{ route('admin.siswa.destroy', $s) }}"
                                        method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Hapus data siswa ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="inline-flex items-center px-3 py-1.5
                                                   rounded-lg bg-red-50 text-red-600
                                                   hover:bg-red-100 text-xs font-medium
                                                   transition"
                                        >
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="px-5 py-12 text-center">

                                <div class="flex flex-col items-center">

                                    <div class="w-14 h-14 rounded-full bg-gray-100
                                                flex items-center justify-center mb-3">
                                        <svg class="w-7 h-7 text-gray-400"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="1.5"
                                                  d="M15 19a3 3 0 1 0-6 0m9-9a6 6 0 1 1-12 0 6 6 0 0 1 12 0Z"/>
                                        </svg>
                                    </div>

                                    <p class="text-gray-600 font-medium">
                                        Belum ada data siswa
                                    </p>

                                    <p class="text-gray-400 text-xs mt-1">
                                        Data siswa yang ditambahkan akan muncul di sini.
                                    </p>

                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

        {{-- Pagination --}}
        @if($siswas->hasPages())
            <div class="px-5 py-4 border-t border-gray-100">
                {{ $siswas->links() }}
            </div>
        @endif

    </div>

</div>

@endsection