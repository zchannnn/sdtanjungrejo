@extends('layouts.app')

@section('title', 'Input Nilai Kelas '.$kela->nama_kelas)

@section('content')

<div class="space-y-6">

<!-- Header -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

    <div>
        <div class="flex items-center gap-2 mb-1">
            <span class="w-2 h-8 bg-emerald-600 rounded-full"></span>
            <h2 class="text-xl font-bold text-gray-800">
                Input Nilai Kelas {{ $kela->nama_kelas }}
            </h2>
        </div>

        <p class="text-sm text-gray-500 ml-4">
            Masukkan nilai siswa berdasarkan mata pelajaran dan jenis penilaian.
        </p>
    </div>

    <div class="flex items-center gap-2 bg-emerald-50 text-emerald-700 px-4 py-2 rounded-xl text-sm">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-5 h-5"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor"
             stroke-width="2">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        <span>Penilaian Siswa</span>
    </div>

</div>

<!-- Filter -->
<form method="GET" class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">

    <div class="flex flex-col sm:flex-row sm:items-end gap-4">

        <div class="flex-1">
            <label class="text-sm font-medium text-gray-700">
                Mata Pelajaran
            </label>

            <select
                name="mata_pelajaran_id"
                onchange="this.form.submit()"
                class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 mt-1.5 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition"
            >
                @foreach($mapels as $m)
                    <option value="{{ $m->id }}" @selected($mapelId==$m->id)>
                        {{ $m->nama_mapel }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex-1">
            <label class="text-sm font-medium text-gray-700">
                Jenis Penilaian
            </label>

            <select
                name="jenis"
                onchange="this.form.submit()"
                class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 mt-1.5 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition"
            >
                @foreach(['Tugas','UTS','UAS'] as $j)
                    <option value="{{ $j }}" @selected($jenis==$j)>
                        {{ $j }}
                    </option>
                @endforeach
            </select>
        </div>

    </div>

</form>

@if(!$tahunAjaran)

    <!-- Tahun Ajaran Belum Aktif -->
    <div class="bg-yellow-50 border border-yellow-100 rounded-2xl p-5 flex items-start gap-3">

        <div class="w-10 h-10 rounded-xl bg-yellow-100 text-yellow-700 flex items-center justify-center flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="2">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M12 9v2m0 4h.01M10.29 3.86l-7.1 12.28A2 2 0 004.92 19h14.16a2 2 0 001.73-2.86l-7.1-12.28a2 2 0 00-3.42 0z" />
            </svg>
        </div>

        <div>
            <p class="font-medium text-yellow-800">
                Tahun ajaran belum aktif
            </p>

            <p class="text-sm text-yellow-700 mt-1">
                Belum ada tahun ajaran aktif. Silakan minta admin mengaktifkan tahun ajaran terlebih dahulu.
            </p>
        </div>

    </div>

@else

    <!-- Form Nilai -->
    <form method="POST" action="{{ route('guru.nilai.simpan', $kela) }}">

        @csrf

        <input type="hidden" name="mata_pelajaran_id" value="{{ $mapelId }}">
        <input type="hidden" name="jenis" value="{{ $jenis }}">

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

            <!-- Card Header -->
            <div class="px-5 py-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

                <div>
                    <h3 class="font-semibold text-gray-800">
                        Daftar Nilai Siswa
                    </h3>

                    <p class="text-xs text-gray-400 mt-1">
                        {{ $jenis }} • {{ $mapels->firstWhere('id', $mapelId)?->nama_mapel }}
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
                            <th class="px-5 py-3 font-semibold">
                                Nama Siswa
                            </th>

                            <th class="px-5 py-3 font-semibold w-48">
                                Nilai (0-100)
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

                                <div class="relative w-32">

                                    <input
                                        type="number"
                                        step="0.01"
                                        min="0"
                                        max="100"
                                        name="nilai[{{ $s->id }}]"
                                        value="{{ $nilaiSekarang[$s->id] ?? '' }}"
                                        class="border border-gray-200 rounded-xl px-3 py-2.5 pr-12 w-full text-sm font-medium focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition"
                                        placeholder="0"
                                        required
                                    >

                                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-gray-400">
                                        / 100
                                    </span>

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
                                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
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

                    Simpan Nilai

                </button>

            </div>

        @endif

    </form>

@endif


</div>

@endsection
