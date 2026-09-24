@extends('layouts.app')

@section('title', 'Jadwal Pelajaran')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Jadwal Pelajaran</h1>
            <p class="text-sm text-gray-500 mt-1">
                Kelola jadwal pelajaran, guru pengajar, dan waktu pembelajaran.
            </p>
        </div>

        <div class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700
                    px-4 py-2.5 rounded-xl text-sm font-medium w-fit">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="1.8">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z"/>
            </svg>
            {{ $jadwals->total() }} Jadwal
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Daftar Jadwal --}}
        <div class="lg:col-span-2 space-y-4">

            {{-- Filter --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                <form method="GET" class="flex flex-col sm:flex-row sm:items-center gap-3">

                    <div class="flex items-center gap-2 text-sm font-medium text-gray-700">
                        <div class="w-9 h-9 rounded-lg bg-emerald-50
                                    flex items-center justify-center text-emerald-600">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-4 h-4"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M3 6h18M6 12h12M10 18h4"/>
                            </svg>
                        </div>

                        <span>Filter Kelas</span>
                    </div>

                    <select
                        name="kelas_id"
                        onchange="this.form.submit()"
                        class="sm:w-64 border border-gray-200 rounded-xl px-4 py-2.5
                               text-sm text-gray-700 bg-white
                               focus:outline-none focus:ring-2
                               focus:ring-emerald-100 focus:border-emerald-500
                               transition"
                    >
                        <option value="">Semua Kelas</option>

                        @foreach($kelasList as $k)
                            <option value="{{ $k->id }}"
                                @selected(request('kelas_id')==$k->id)>
                                {{ $k->nama_kelas }}
                            </option>
                        @endforeach
                    </select>

                </form>
            </div>

            {{-- Table Card --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                {{-- Card Header --}}
                <div class="px-6 py-5 border-b border-gray-100 flex items-center gap-4">
                    <div class="w-11 h-11 rounded-xl bg-emerald-100
                                flex items-center justify-center text-emerald-700">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-6 h-6"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-base font-semibold text-gray-800">
                            Daftar Jadwal
                        </h2>
                        <p class="text-sm text-gray-500">
                            Jadwal pelajaran yang telah terdaftar.
                        </p>
                    </div>
                </div>

                {{-- Table --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">

                        <thead class="bg-gray-50 border-b border-gray-100">
                            <tr class="text-left text-gray-500">
                                <th class="px-6 py-4 font-medium">Kelas</th>
                                <th class="px-6 py-4 font-medium">Hari</th>
                                <th class="px-6 py-4 font-medium">Jam</th>
                                <th class="px-6 py-4 font-medium">Mapel</th>
                                <th class="px-6 py-4 font-medium">Guru</th>
                                <th class="px-6 py-4 font-medium text-right">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                        @forelse($jadwals as $j)

                            <tr class="border-b border-gray-100 last:border-0
                                       hover:bg-gray-50/70 transition">

                                {{-- Kelas --}}
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-3 py-1.5
                                                 rounded-lg bg-emerald-50
                                                 text-emerald-700 font-medium text-xs">
                                        {{ $j->kelas->nama_kelas }}
                                    </span>
                                </td>

                                {{-- Hari --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2 text-gray-700">
                                        <div class="w-8 h-8 rounded-lg bg-gray-100
                                                    flex items-center justify-center
                                                    text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="w-4 h-4"
                                                 fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor"
                                                 stroke-width="1.8">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                                            </svg>
                                        </div>

                                        <span class="font-medium">
                                            {{ $j->hari }}
                                        </span>
                                    </div>
                                </td>

                                {{-- Jam --}}
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5
                                                 text-gray-600 whitespace-nowrap">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-4 h-4 text-gray-400"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="1.8">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z"/>
                                        </svg>

                                        {{ \Carbon\Carbon::parse($j->jam_mulai)->format('H:i') }}
                                        -
                                        {{ \Carbon\Carbon::parse($j->jam_selesai)->format('H:i') }}
                                    </span>
                                </td>

                                {{-- Mapel --}}
                                <td class="px-6 py-4">
                                    <span class="font-medium text-gray-800">
                                        {{ $j->mataPelajaran->nama_mapel }}
                                    </span>
                                </td>

                                {{-- Guru --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-full bg-emerald-100
                                                    flex items-center justify-center
                                                    text-xs font-semibold text-emerald-700">
                                            {{ strtoupper(substr($j->guru->nama, 0, 1)) }}
                                        </div>

                                        <span class="text-gray-700">
                                            {{ $j->guru->nama }}
                                        </span>
                                    </div>
                                </td>

                                {{-- Aksi --}}
                                <td class="px-6 py-4 text-right">
                                    <form
                                        action="{{ route('admin.jadwal.destroy', $j) }}"
                                        method="POST"
                                        onsubmit="return confirm('Hapus jadwal ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="inline-flex items-center gap-1.5
                                                   px-3 py-2 rounded-lg
                                                   text-xs font-medium
                                                   text-red-600 bg-red-50
                                                   hover:bg-red-100 transition"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="w-4 h-4"
                                                 fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor"
                                                 stroke-width="1.8">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M6 7h12M9 7V5.5A1.5 1.5 0 0110.5 4h3A1.5 1.5 0 0115 5.5V7m-7 0 .7 12.1a1 1 0 001 .9h4.6a1 1 0 001-.9L16 7M10 11v5m4-5v5"/>
                                            </svg>

                                            Hapus
                                        </button>
                                    </form>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">

                                    <div class="flex flex-col items-center justify-center">
                                        <div class="w-14 h-14 rounded-2xl bg-gray-100
                                                    flex items-center justify-center
                                                    text-gray-400 mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="w-7 h-7"
                                                 fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor"
                                                 stroke-width="1.5">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                                            </svg>
                                        </div>

                                        <p class="text-sm font-medium text-gray-600">
                                            Belum ada jadwal pelajaran
                                        </p>

                                        <p class="text-xs text-gray-400 mt-1">
                                            Tambahkan jadwal melalui form di samping.
                                        </p>
                                    </div>

                                </td>
                            </tr>

                        @endforelse
                        </tbody>

                    </table>
                </div>

                {{-- Pagination --}}
                <div class="px-6 py-4 border-t border-gray-100">
                    {{ $jadwals->links() }}
                </div>

            </div>
        </div>

        {{-- Tambah Jadwal --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100
                    overflow-hidden h-fit">

            {{-- Card Header --}}
            <div class="px-6 py-5 border-b border-gray-100">
                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-emerald-100
                                flex items-center justify-center text-emerald-700">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 5v14m-7-7h14"/>
                        </svg>
                    </div>

                    <div>
                        <h3 class="font-semibold text-gray-800">
                            Tambah Jadwal
                        </h3>

                        <p class="text-xs text-gray-500 mt-0.5">
                            Masukkan jadwal pelajaran baru.
                        </p>
                    </div>

                </div>
            </div>

            {{-- Form --}}
            <form
                method="POST"
                action="{{ route('admin.jadwal.store') }}"
                class="p-6 space-y-5"
            >
                @csrf

                {{-- Kelas --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Kelas
                    </label>

                    <select
                        name="kelas_id"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3
                               text-sm text-gray-700 bg-white
                               focus:outline-none focus:ring-2
                               focus:ring-emerald-100
                               focus:border-emerald-500 transition"
                        required
                    >
                        <option value="">- Pilih Kelas -</option>

                        @foreach($kelasList as $k)
                            <option value="{{ $k->id }}">
                                {{ $k->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Mata Pelajaran --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Mata Pelajaran
                    </label>

                    <select
                        name="mata_pelajaran_id"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3
                               text-sm text-gray-700 bg-white
                               focus:outline-none focus:ring-2
                               focus:ring-emerald-100
                               focus:border-emerald-500 transition"
                        required
                    >
                        <option value="">- Pilih Mapel -</option>

                        @foreach($mapels as $m)
                            <option value="{{ $m->id }}">
                                {{ $m->nama_mapel }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Guru --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Guru Pengajar
                    </label>

                    <select
                        name="guru_id"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3
                               text-sm text-gray-700 bg-white
                               focus:outline-none focus:ring-2
                               focus:ring-emerald-100
                               focus:border-emerald-500 transition"
                        required
                    >
                        <option value="">- Pilih Guru -</option>

                        @foreach($gurus as $g)
                            <option value="{{ $g->id }}">
                                {{ $g->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Hari --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Hari
                    </label>

                    <select
                        name="hari"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3
                               text-sm text-gray-700 bg-white
                               focus:outline-none focus:ring-2
                               focus:ring-emerald-100
                               focus:border-emerald-500 transition"
                        required
                    >
                        @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $h)
                            <option value="{{ $h }}">
                                {{ $h }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Jam --}}
                <div class="grid grid-cols-2 gap-3">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Jam Mulai
                        </label>

                        <input
                            type="time"
                            name="jam_mulai"
                            class="w-full border border-gray-200 rounded-xl px-3 py-3
                                   text-sm text-gray-700
                                   focus:outline-none focus:ring-2
                                   focus:ring-emerald-100
                                   focus:border-emerald-500 transition"
                            required
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Jam Selesai
                        </label>

                        <input
                            type="time"
                            name="jam_selesai"
                            class="w-full border border-gray-200 rounded-xl px-3 py-3
                                   text-sm text-gray-700
                                   focus:outline-none focus:ring-2
                                   focus:ring-emerald-100
                                   focus:border-emerald-500 transition"
                            required
                        >
                    </div>

                </div>

                {{-- Submit --}}
                <button
                    type="submit"
                    class="w-full inline-flex items-center justify-center gap-2
                           bg-emerald-600 text-white px-4 py-3 rounded-xl
                           text-sm font-medium hover:bg-emerald-700
                           shadow-sm transition"
                >
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-4 h-4"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M12 5v14m-7-7h14"/>
                    </svg>

                    Simpan
                </button>

            </form>
        </div>

    </div>
</div>
@endsection