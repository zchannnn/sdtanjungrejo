@extends('layouts.app')
@section('title', 'Jadwal Mengajar')
@section('content')

<div class="space-y-6">


<!-- Header -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Jadwal Mengajar</h2>
        <p class="text-sm text-gray-500 mt-1">
            Daftar jadwal pelajaran yang Anda ampu.
        </p>
    </div>

    <div class="flex items-center gap-2 bg-emerald-50 text-emerald-700 px-4 py-2 rounded-xl text-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        <span>Jadwal Mengajar</span>
    </div>
</div>

<!-- Table Card -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

    <!-- Table Header -->
    <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
        <div>
            <h3 class="font-semibold text-gray-800">Daftar Jadwal</h3>
            <p class="text-xs text-gray-400 mt-1">
                Jadwal pelajaran yang telah ditentukan sekolah
            </p>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-emerald-50 text-emerald-800">
                <tr class="text-left">
                    <th class="px-5 py-3 font-semibold">Hari</th>
                    <th class="px-5 py-3 font-semibold">Jam</th>
                    <th class="px-5 py-3 font-semibold">Kelas</th>
                    <th class="px-5 py-3 font-semibold">Mata Pelajaran</th>
                </tr>
            </thead>

            <tbody>
            @forelse($jadwals ?? [] as $j)
                <tr class="border-t border-gray-100 hover:bg-gray-50 transition">

                    <td class="px-5 py-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-lg bg-gray-100 text-gray-700 font-medium text-xs">
                            {{ $j->hari }}
                        </span>
                    </td>

                    <td class="px-5 py-4">
                        <div class="flex items-center gap-2 text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2" />
                                <circle cx="12" cy="12" r="9" />
                            </svg>
                            <span>
                                {{ \Carbon\Carbon::parse($j->jam_mulai)->format('H:i') }}
                                -
                                {{ \Carbon\Carbon::parse($j->jam_selesai)->format('H:i') }}
                            </span>
                        </div>
                    </td>

                    <td class="px-5 py-4">
                        <span class="font-medium text-gray-800">
                            {{ $j->kelas->nama_kelas }}
                        </span>
                    </td>

                    <td class="px-5 py-4">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <span class="font-medium text-gray-700">
                                {{ $j->mataPelajaran->nama_mapel }}
                            </span>
                        </div>
                    </td>

                </tr>

            @empty
                <tr>
                    <td colspan="4" class="px-5 py-12 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <div class="w-14 h-14 rounded-full bg-gray-100 flex items-center justify-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v11a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2z" />
                                </svg>
                            </div>
                            <p class="font-medium text-gray-500">Belum ada jadwal mengajar.</p>
                            <p class="text-xs text-gray-400 mt-1">
                                Jadwal mengajar Anda belum tersedia.
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
