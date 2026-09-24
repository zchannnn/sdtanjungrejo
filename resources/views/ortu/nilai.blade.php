@extends('layouts.app')

@section('title', 'Nilai & Rapor')

@section('content')

<div class="space-y-5">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Nilai & Rapor</h1>
            <p class="text-sm text-gray-500 mt-1">
                Lihat nilai akademik dan rapor anak.
            </p>
        </div>
    </div>

    @if($anak)

        {{-- Tombol Rapor --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-4 flex justify-end">
            <a href="{{ route('rapor.cetak', $anak) }}"
               class="inline-flex items-center gap-2 bg-emerald-600 text-white px-4 py-2.5 rounded-xl text-sm font-medium hover:bg-emerald-700 transition">

                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h6l5 5v11a2 2 0 01-2 2z"/>
                </svg>

                Unduh Rapor (PDF)
            </a>
        </div>

        @forelse($nilais ?? [] as $mapel => $items)

            {{-- Nilai per Mata Pelajaran --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="px-5 py-4 border-b border-gray-100 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>

                    <div>
                        <h3 class="font-semibold text-gray-800">
                            {{ $mapel }}
                        </h3>
                        <p class="text-xs text-gray-400">
                            Nilai mata pelajaran
                        </p>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">

                        <thead class="bg-gray-50 text-gray-500 text-left">
                            <tr>
                                <th class="px-5 py-3 font-semibold">Jenis</th>
                                <th class="px-5 py-3 font-semibold">Nilai</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($items as $n)
                            <tr class="border-t border-gray-100 hover:bg-emerald-50/30 transition">

                                <td class="px-5 py-4">
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-gray-100 text-gray-600 text-xs font-medium">
                                        {{ $n->jenis }}
                                    </span>
                                </td>

                                <td class="px-5 py-4">
                                    <span class="font-bold text-emerald-700">
                                        {{ $n->nilai }}
                                    </span>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>

            </div>

        @empty

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-10 text-center">

                <div class="w-14 h-14 mx-auto rounded-full bg-gray-100 text-gray-400 flex items-center justify-center mb-4">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>

                <p class="text-sm font-medium text-gray-600">
                    Belum ada nilai pada semester ini.
                </p>

            </div>

        @endforelse

    @else

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-10 text-center">

            <div class="w-14 h-14 mx-auto rounded-full bg-gray-100 text-gray-400 flex items-center justify-center mb-4">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m9-8a4 4 0 100-8 4 4 0 000 8zm7-4v6m3-3h-6"/>
                </svg>
            </div>

            <p class="text-sm font-medium text-gray-600">
                Akun Anda belum terhubung dengan data siswa.
            </p>

        </div>

    @endif

</div>

@endsection