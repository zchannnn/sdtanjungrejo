@extends('layouts.app')

@section('title', 'Absensi Anak')

@section('content')

<div class="space-y-5">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Absensi Anak</h1>
        <p class="text-sm text-gray-500 mt-1">
            Lihat riwayat kehadiran anak di sekolah.
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
                    <h2 class="font-semibold text-gray-800">Riwayat Absensi</h2>
                    <p class="text-xs text-gray-400">
                        Data kehadiran anak
                    </p>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-500 text-left">
                    <tr>
                        <th class="p-4 font-semibold">Tanggal</th>
                        <th class="p-4 font-semibold">Status</th>
                        <th class="p-4 font-semibold">Keterangan</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($absensis ?? [] as $a)
                    <tr class="border-t border-gray-100 hover:bg-emerald-50/30 transition">

                        <td class="p-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2h10z"/>
                                    </svg>
                                </div>

                                <span class="font-medium text-gray-700">
                                    {{ $a->tanggal->translatedFormat('d M Y') }}
                                </span>
                            </div>
                        </td>

                        <td class="p-4">
                            <span class="text-xs font-semibold px-3 py-1.5 rounded-full
                                {{ $a->status=='Hadir' ? 'bg-green-100 text-green-700' : ($a->status=='Alpa' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                                {{ $a->status }}
                            </span>
                        </td>

                        <td class="p-4 text-gray-500">
                            {{ $a->keterangan ?? '-' }}
                        </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="3" class="p-10 text-center">
                            <div class="flex flex-col items-center">

                                <div class="w-12 h-12 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center mb-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2h10z"/>
                                    </svg>
                                </div>

                                <p class="text-sm font-medium text-gray-600">
                                    Belum ada data absensi.
                                </p>

                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div>
        {{ $absensis?->links() }}
    </div>

</div>

@endsection