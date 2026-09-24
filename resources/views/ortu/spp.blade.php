@extends('layouts.app')

@section('title', 'Pembayaran SPP')

@section('content')

<div class="space-y-5">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Pembayaran SPP</h1>
        <p class="text-sm text-gray-500 mt-1">
            Lihat riwayat pembayaran SPP anak.
        </p>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

        <div class="px-5 py-4 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>

                <div>
                    <h2 class="font-semibold text-gray-800">Riwayat Pembayaran</h2>
                    <p class="text-xs text-gray-400">
                        Informasi pembayaran SPP
                    </p>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">

                <thead class="bg-gray-50 text-gray-500 text-left">
                    <tr>
                        <th class="p-4 font-semibold">Bulan</th>
                        <th class="p-4 font-semibold">Jumlah</th>
                        <th class="p-4 font-semibold">Status</th>
                        <th class="p-4 font-semibold">Tanggal Bayar</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($pembayarans ?? [] as $p)

                    <tr class="border-t border-gray-100 hover:bg-emerald-50/30 transition">

                        {{-- Bulan --}}
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-gray-100 text-gray-500 flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2h10z"/>
                                    </svg>
                                </div>

                                <span class="font-medium text-gray-700">
                                    {{ $p->bulan }} {{ $p->tahun }}
                                </span>
                            </div>
                        </td>

                        {{-- Jumlah --}}
                        <td class="p-4">
                            <span class="font-semibold text-gray-700">
                                Rp{{ number_format($p->jumlah,0,',','.') }}
                            </span>
                        </td>

                        {{-- Status --}}
                        <td class="p-4">
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold px-3 py-1.5 rounded-full
                                {{ $p->status=='Lunas' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">

                                <span class="w-1.5 h-1.5 rounded-full
                                    {{ $p->status=='Lunas' ? 'bg-green-500' : 'bg-red-500' }}">
                                </span>

                                {{ $p->status }}
                            </span>
                        </td>

                        {{-- Tanggal Bayar --}}
                        <td class="p-4 text-gray-500">
                            {{ $p->tanggal_bayar?->translatedFormat('d M Y') ?? '-' }}
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="p-10 text-center">

                            <div class="flex flex-col items-center">

                                <div class="w-14 h-14 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center mb-4">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>

                                <p class="text-sm font-medium text-gray-600">
                                    Belum ada data pembayaran.
                                </p>

                            </div>

                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>
        </div>

    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $pembayarans?->links() }}
    </div>

</div>

@endsection