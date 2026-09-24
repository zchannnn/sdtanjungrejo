@extends('layouts.app')
@section('title', 'Absensi Kelas '.$kelas->nama_kelas)
@section('content')

<div class="space-y-6">

<!-- Header -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

    <div>
        <div class="flex items-center gap-2 mb-1">
            <span class="w-2 h-8 bg-emerald-600 rounded-full"></span>
            <h2 class="text-xl font-bold text-gray-800">
                Absensi Kelas {{ $kelas->nama_kelas }}
            </h2>
        </div>

        <p class="text-sm text-gray-500 ml-4">
            Kelola kehadiran siswa berdasarkan tanggal.
        </p>
    </div>

    <!-- Date Filter -->
    <form method="GET" class="flex items-center gap-2 bg-white border border-gray-100 rounded-xl p-2 shadow-sm">
        <label class="text-sm font-medium text-gray-600 px-2">
            Tanggal
        </label>

        <input
            type="date"
            name="tanggal"
            value="{{ $tanggal }}"
            onchange="this.form.submit()"
            class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
        >
    </form>

</div>

<!-- Absensi Form -->
<form method="POST" action="{{ route('guru.absensi.simpan', $kelas) }}">

    @csrf

    <input type="hidden" name="tanggal" value="{{ $tanggal }}">

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <!-- Card Header -->
        <div class="px-5 py-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">

            <div>
                <h3 class="font-semibold text-gray-800">
                    Daftar Kehadiran Siswa
                </h3>

                <p class="text-xs text-gray-400 mt-1">
                    Pilih status kehadiran setiap siswa.
                </p>
            </div>

            <div class="text-xs bg-emerald-50 text-emerald-700 px-3 py-1.5 rounded-lg">
                {{ $siswas->count() }} Siswa
            </div>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-emerald-50 text-emerald-800">
                    <tr class="text-left">
                        <th class="px-5 py-3 font-semibold w-1/3">
                            Nama Siswa
                        </th>
                        <th class="px-5 py-3 font-semibold">
                            Status Kehadiran
                        </th>
                    </tr>
                </thead>

                <tbody>

                @forelse($siswas as $s)

                    <tr class="border-t border-gray-100 hover:bg-gray-50 transition">

                        <td class="px-5 py-4">

                            <div class="flex items-center gap-3">

                                <div class="w-9 h-9 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-semibold text-sm flex-shrink-0">
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

                        <td class="px-5 py-4">

                            <div class="flex flex-wrap gap-2">

                                @foreach(['Hadir','Izin','Sakit','Alpa'] as $opt)

                                    <label class="cursor-pointer">

                                        <input
                                            type="radio"
                                            name="status[{{ $s->id }}]"
                                            value="{{ $opt }}"
                                            @checked(($absensiHariIni[$s->id] ?? 'Hadir')==$opt)
                                            required
                                            class="peer sr-only"
                                        >

                                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg border border-gray-200 text-xs font-medium text-gray-600 bg-white hover:bg-gray-50 peer-checked:bg-emerald-600 peer-checked:text-white peer-checked:border-emerald-600 transition">
                                            {{ $opt }}
                                        </span>

                                    </label>

                                @endforeach

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="2" class="px-5 py-12 text-center">

                            <div class="flex flex-col items-center">

                                <div class="w-14 h-14 rounded-full bg-gray-100 flex items-center justify-center mb-3">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="w-7 h-7 text-gray-400"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor"
                                         stroke-width="1.8">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />

                                    </svg>

                                </div>

                                <p class="font-medium text-gray-500">
                                    Tidak ada siswa aktif di kelas ini.
                                </p>

                                <p class="text-xs text-gray-400 mt-1">
                                    Data siswa belum tersedia untuk kelas ini.
                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    @if($siswas->count())

        <div class="flex justify-end mt-5">

            <button
                class="inline-flex items-center gap-2 bg-emerald-600 text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:bg-emerald-700 active:bg-emerald-800 transition shadow-sm"
            >

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-4 h-4"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M5 13l4 4L19 7" />

                </svg>

                Simpan Absensi

            </button>

        </div>

    @endif

</form>

</div>

@endsection
