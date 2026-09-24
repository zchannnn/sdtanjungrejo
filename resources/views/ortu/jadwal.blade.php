@extends('layouts.app')

@section('title', 'Jadwal Pelajaran')

@section('content')

<div class="space-y-5">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Jadwal Pelajaran</h1>
        <p class="text-sm text-gray-500 mt-1">
            Lihat jadwal pelajaran anak di sekolah.
        </p>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

        <div class="px-5 py-4 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2h10z"/>
                    </svg>
                </div>

                <div>
                    <h2 class="font-semibold text-gray-800">Jadwal Mingguan</h2>
                    <p class="text-xs text-gray-400">
                        Jadwal mata pelajaran dan guru
                    </p>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-500 text-left">
                    <tr>
                        <th class="p-4 font-semibold">Hari</th>
                        <th class="p-4 font-semibold">Jam</th>
                        <th class="p-4 font-semibold">Mata Pelajaran</th>
                        <th class="p-4 font-semibold">Guru</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($jadwals ?? [] as $j)
                    <tr class="border-t border-gray-100 hover:bg-emerald-50/30 transition">

                        <td class="p-4">
                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-emerald-50 text-emerald-700 text-xs font-semibold">
                                {{ $j->hari }}
                            </span>
                        </td>

                        <td class="p-4 text-gray-600 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-lg bg-gray-100 text-gray-500 flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>

                                <span>
                                    {{ \Carbon\Carbon::parse($j->jam_mulai)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($j->jam_selesai)->format('H:i') }}
                                </span>
                            </div>
                        </td>

                        <td class="p-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>

                                <span class="font-medium text-gray-700">
                                    {{ $j->mataPelajaran->nama_mapel }}
                                </span>
                            </div>
                        </td>

                        <td class="p-4 text-gray-600">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-gray-100 text-gray-500 flex items-center justify-center text-xs font-semibold">
                                    {{ strtoupper(substr($j->guru->nama, 0, 1)) }}
                                </div>

                                <span>
                                    {{ $j->guru->nama }}
                                </span>
                            </div>
                        </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="4" class="p-10 text-center">
                            <div class="flex flex-col items-center">

                                <div class="w-12 h-12 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center mb-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                            d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2h10z"/>
                                    </svg>
                                </div>

                                <p class="text-sm font-medium text-gray-600">
                                    Jadwal belum tersedia.
                                </p>

                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>

@endsection