@extends('layouts.app')

@section('title', 'Dashboard Guru')

@section('content')

<div class="space-y-6">

<!-- Welcome -->
<div class="bg-gradient-to-r from-emerald-700 to-emerald-600 rounded-2xl p-6 text-white shadow-sm">
    <div class="flex items-center justify-between gap-4">
        <div>
            <p class="text-emerald-100 text-sm mb-1">Selamat datang 👋</p>
            <h1 class="text-2xl font-bold">Dashboard Guru</h1>
            <p class="text-emerald-100 text-sm mt-1">
                Kelola aktivitas mengajar dan kelas wali Anda dari sini.
            </p>
        </div>

        <div class="hidden sm:flex w-14 h-14 rounded-2xl bg-white/15 items-center justify-center">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                    d="M12 14l9-5-9-5-9 5 9 5z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                    d="M5 10v5c0 1 3.134 3 7 3s7-2 7-3v-5"/>
            </svg>
        </div>
    </div>
</div>

<!-- Statistik -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">
                    Absensi Diinput Hari Ini
                </p>

                <p class="text-3xl font-bold text-emerald-700 mt-2">
                    {{ $absensiHariIni }}
                </p>

                <p class="text-xs text-gray-400 mt-1">
                    Data absensi yang sudah diinput
                </p>
            </div>

            <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700
                        flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M9 11l3 3L22 4"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">
                    Kelas yang Diwalikan
                </p>

                <p class="text-3xl font-bold text-emerald-700 mt-2">
                    {{ $kelasWali?->count() ?? 0 }}
                </p>

                <p class="text-xs text-gray-400 mt-1">
                    Kelas yang menjadi tanggung jawab Anda
                </p>
            </div>

            <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700
                        flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
        </div>
    </div>

</div>

<!-- Jadwal Hari Ini -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

    <div class="p-5 border-b border-gray-100">
        <div class="flex items-center gap-3">

            <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700
                        flex items-center justify-center">

                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                </svg>

            </div>

            <div>
                <h3 class="font-semibold text-gray-800">
                    Jadwal Mengajar Hari Ini
                </h3>

                <p class="text-xs text-gray-400 mt-0.5">
                    Daftar jadwal mengajar Anda hari ini
                </p>
            </div>

        </div>
    </div>

    <div class="overflow-x-auto">

        @if($jadwalHariIni && $jadwalHariIni->count())

            <table class="w-full text-sm">

                <thead class="bg-gray-50 text-gray-500 text-left">
                    <tr>
                        <th class="px-5 py-3 font-medium">Jam</th>
                        <th class="px-5 py-3 font-medium">Kelas</th>
                        <th class="px-5 py-3 font-medium">Mata Pelajaran</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($jadwalHariIni as $j)

                    <tr class="border-t border-gray-100 hover:bg-gray-50/70 transition">

                        <td class="px-5 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center gap-2
                                         text-emerald-700 font-medium">

                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M12 6v6l4 2"/>
                                    <circle cx="12" cy="12" r="9"
                                        stroke-width="1.8"/>
                                </svg>

                                {{ \Carbon\Carbon::parse($j->jam_mulai)->format('H:i') }}
                                -
                                {{ \Carbon\Carbon::parse($j->jam_selesai)->format('H:i') }}

                            </span>
                        </td>

                        <td class="px-5 py-4">
                            <span class="inline-flex px-2.5 py-1 rounded-lg
                                         bg-gray-100 text-gray-700 text-xs font-medium">
                                {{ $j->kelas->nama_kelas }}
                            </span>
                        </td>

                        <td class="px-5 py-4 text-gray-700">
                            {{ $j->mataPelajaran->nama_mapel }}
                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        @else

            <div class="p-8 text-center">

                <div class="w-12 h-12 mx-auto rounded-full bg-gray-100
                            text-gray-400 flex items-center justify-center">

                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                    </svg>

                </div>

                <p class="text-sm text-gray-500 mt-3">
                    Tidak ada jadwal mengajar hari ini.
                </p>

            </div>

        @endif

    </div>

</div>

<!-- Kelas Wali -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

    <div class="p-5 border-b border-gray-100">

        <div class="flex items-center gap-3">

            <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700
                        flex items-center justify-center">

                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>

                </svg>

            </div>

            <div>
                <h3 class="font-semibold text-gray-800">
                    Kelas yang Anda Walikan
                </h3>

                <p class="text-xs text-gray-400 mt-0.5">
                    Kelola absensi dan nilai siswa
                </p>
            </div>

        </div>

    </div>

    <div class="divide-y divide-gray-100">

        @forelse($kelasWali ?? [] as $k)

            <div class="p-5 flex flex-col sm:flex-row sm:items-center
                        justify-between gap-4 hover:bg-gray-50/70 transition">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-gray-100
                                flex items-center justify-center
                                text-gray-600 font-semibold text-sm">

                        {{ $k->tingkat }}

                    </div>

                    <div>
                        <p class="font-medium text-gray-800">
                            {{ $k->nama_kelas }}
                        </p>

                        <p class="text-xs text-gray-400 mt-0.5">
                            {{ $k->siswas->count() }} siswa
                        </p>
                    </div>

                </div>

                <div class="flex gap-2">

                    <a
                        href="{{ route('guru.absensi.form', $k) }}"
                        class="inline-flex items-center justify-center gap-1.5
                               text-xs font-medium
                               bg-emerald-600 text-white
                               px-3.5 py-2 rounded-lg
                               hover:bg-emerald-700 transition"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 11l3 3L22 4"/>
                        </svg>

                        Isi Absensi
                    </a>

                    <a
                        href="{{ route('guru.nilai.form', $k) }}"
                        class="inline-flex items-center justify-center gap-1.5
                               text-xs font-medium
                               bg-emerald-50 text-emerald-700
                               px-3.5 py-2 rounded-lg
                               hover:bg-emerald-100 transition"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z"/>
                        </svg>

                        Input Nilai
                    </a>

                </div>

            </div>

        @empty

            <div class="p-8 text-center">

                <div class="w-12 h-12 mx-auto rounded-full bg-gray-100
                            text-gray-400 flex items-center justify-center">

                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>

                    </svg>

                </div>

                <p class="text-sm text-gray-500 mt-3">
                    Anda belum menjadi wali kelas manapun.
                </p>

            </div>

        @endforelse

    </div>

</div>

</div>

@endsection
