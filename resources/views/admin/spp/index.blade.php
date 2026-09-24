@extends('layouts.app')

@section('title', 'Pembayaran SPP')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-sm text-gray-500 mb-1">
                <span>Admin</span>
                <span>/</span>
                <span class="text-emerald-600 font-medium">Pembayaran SPP</span>
            </div>

            <h1 class="text-2xl font-bold text-gray-800">
                Pembayaran SPP
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Kelola tagihan dan status pembayaran SPP siswa.
            </p>
        </div>

        <div class="flex items-center gap-2 bg-emerald-50 text-emerald-700 px-4 py-2.5 rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6v12m-3-3h6m5 3V9a2 2 0 00-2-2h-2.5a2 2 0 01-2-1.2L12.8 4H8a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2z" />
            </svg>

            <span class="text-sm font-semibold">
                Data Pembayaran
            </span>
        </div>
    </div>


    {{-- Main Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Data Pembayaran --}}
        <div class="lg:col-span-2 space-y-4">

            {{-- Filter --}}
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">

                <div class="flex items-center gap-2 mb-4">
                    <div class="w-9 h-9 rounded-xl bg-emerald-50 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 text-emerald-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L15 12.414V19a1 1 0 01-.553.894l-4 2A1 1 0 019 21v-8.586L3.293 6.707A1 1 0 013 6V4z" />
                        </svg>
                    </div>

                    <div>
                        <h2 class="font-semibold text-gray-800">
                            Filter Pembayaran
                        </h2>
                        <p class="text-xs text-gray-500">
                            Cari data berdasarkan status atau bulan.
                        </p>
                    </div>
                </div>

                <form method="GET" class="grid grid-cols-1 sm:grid-cols-3 gap-3">

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">
                            Status
                        </label>

                        <select name="status"
                            class="w-full border border-gray-200 rounded-xl px-3 py-2.5 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-emerald-100
                                   focus:border-emerald-500 bg-white">
                            <option value="">Semua Status</option>

                            <option value="Lunas"
                                @selected(request('status') == 'Lunas')>
                                Lunas
                            </option>

                            <option value="Belum Lunas"
                                @selected(request('status') == 'Belum Lunas')>
                                Belum Lunas
                            </option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">
                            Bulan
                        </label>

                        <input type="text"
                            name="bulan"
                            value="{{ request('bulan') }}"
                            placeholder="Filter bulan..."
                            class="w-full border border-gray-200 rounded-xl px-3 py-2.5 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-emerald-100
                                   focus:border-emerald-500">
                    </div>

                    <div class="flex items-end">
                        <button
                            class="w-full bg-emerald-600 hover:bg-emerald-700 text-white
                                   px-4 py-2.5 rounded-xl text-sm font-medium
                                   transition flex items-center justify-center gap-2">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 4h18M6 9h12M10 14h4M11 19h2" />
                            </svg>

                            Filter Data
                        </button>
                    </div>

                </form>
            </div>


            {{-- Table --}}
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

                {{-- Table Header --}}
                <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
                    <div>
                        <h2 class="font-semibold text-gray-800">
                            Daftar Tagihan SPP
                        </h2>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Data pembayaran SPP siswa
                        </p>
                    </div>

                    <div class="flex items-center gap-2 bg-gray-50 px-3 py-1.5 rounded-lg">
                        <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                        <span class="text-xs font-medium text-gray-600">
                            {{ $pembayarans->total() }} Data
                        </span>
                    </div>
                </div>


                {{-- Responsive Table --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">

                        <thead class="bg-gray-50 border-b border-gray-100">
                            <tr class="text-left text-xs uppercase tracking-wide text-gray-500">

                                <th class="px-5 py-3.5 font-semibold">
                                    Siswa
                                </th>

                                <th class="px-4 py-3.5 font-semibold">
                                    Periode
                                </th>

                                <th class="px-4 py-3.5 font-semibold">
                                    Jumlah
                                </th>

                                <th class="px-4 py-3.5 font-semibold">
                                    Status
                                </th>

                                <th class="px-5 py-3.5 font-semibold text-right">
                                    Aksi
                                </th>

                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">

                        @forelse($pembayarans as $p)

                            <tr class="hover:bg-gray-50/70 transition">

                                {{-- Siswa --}}
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">

                                        <div class="w-9 h-9 rounded-full bg-emerald-100
                                                    text-emerald-700 flex items-center
                                                    justify-center font-semibold text-sm">
                                            {{ strtoupper(substr($p->siswa->nama, 0, 1)) }}
                                        </div>

                                        <div>
                                            <p class="font-medium text-gray-800">
                                                {{ $p->siswa->nama }}
                                            </p>

                                            <p class="text-xs text-gray-400">
                                                Data SPP Siswa
                                            </p>
                                        </div>

                                    </div>
                                </td>


                                {{-- Bulan --}}
                                <td class="px-4 py-4">
                                    <div class="flex items-center gap-2 text-gray-700">

                                        <div class="w-8 h-8 rounded-lg bg-gray-100
                                                    flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4 text-gray-500"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.8">
                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M6.75 3v2.25M17.25 3v2.25M3.75 9h16.5M5.25 5.25h13.5A2.25 2.25 0 0121 7.5v11.25A2.25 2.25 0 0118.75 21H5.25A2.25 2.25 0 013 18.75V7.5a2.25 2.25 0 012.25-2.25z" />
                                            </svg>
                                        </div>

                                        <span>
                                            {{ $p->bulan }} {{ $p->tahun }}
                                        </span>

                                    </div>
                                </td>


                                {{-- Jumlah --}}
                                <td class="px-4 py-4">
                                    <span class="font-semibold text-gray-800">
                                        Rp{{ number_format($p->jumlah,0,',','.') }}
                                    </span>
                                </td>


                                {{-- Status --}}
                                <td class="px-4 py-4">

                                    @if($p->status == 'Lunas')

                                        <span class="inline-flex items-center gap-1.5
                                                     px-2.5 py-1 rounded-full
                                                     bg-emerald-100 text-emerald-700
                                                     text-xs font-semibold">

                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            Lunas

                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-1.5
                                                     px-2.5 py-1 rounded-full
                                                     bg-red-100 text-red-700
                                                     text-xs font-semibold">

                                            <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                            Belum Lunas

                                        </span>

                                    @endif

                                </td>


                                {{-- Aksi --}}
                                <td class="px-5 py-4 text-right">

                                    <div class="flex items-center justify-end gap-2">

                                        @if($p->status != 'Lunas')

                                            <form action="{{ route('admin.spp.lunas', $p) }}"
                                                method="POST"
                                                class="inline">

                                                @csrf
                                                @method('PATCH')

                                                <button
                                                    class="inline-flex items-center gap-1.5
                                                           px-3 py-1.5 rounded-lg
                                                           bg-emerald-50 text-emerald-700
                                                           hover:bg-emerald-100
                                                           text-xs font-semibold transition">

                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-3.5 h-3.5"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>

                                                    Tandai Lunas
                                                </button>

                                            </form>

                                        @endif


                                        <form action="{{ route('admin.spp.destroy', $p) }}"
                                            method="POST"
                                            class="inline"
                                            onsubmit="return confirm('Hapus tagihan ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="inline-flex items-center gap-1.5
                                                       px-3 py-1.5 rounded-lg
                                                       bg-red-50 text-red-600
                                                       hover:bg-red-100
                                                       text-xs font-semibold transition">

                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-3.5 h-3.5"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M6 7h12M10 11v6M14 11v6M9 7V4h6v3m-8 0l1 13h8l1-13" />
                                                </svg>

                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="px-5 py-12 text-center">

                                    <div class="flex flex-col items-center">

                                        <div class="w-14 h-14 rounded-2xl bg-gray-100
                                                    flex items-center justify-center mb-3">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-7 h-7 text-gray-400"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.5">
                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M12 6v6l4 2m5-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>

                                        </div>

                                        <p class="font-medium text-gray-600">
                                            Belum ada data pembayaran
                                        </p>

                                        <p class="text-xs text-gray-400 mt-1">
                                            Data tagihan SPP akan tampil di sini.
                                        </p>

                                    </div>

                                </td>
                            </tr>

                        @endforelse

                        </tbody>

                    </table>
                </div>


                {{-- Pagination --}}
                <div class="px-5 py-4 border-t border-gray-100">
                    {{ $pembayarans->links() }}
                </div>

            </div>

        </div>


        {{-- Form Buat Tagihan --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 h-fit">

            {{-- Form Header --}}
            <div class="flex items-center gap-3 pb-4 border-b border-gray-100">

                <div class="w-11 h-11 rounded-xl bg-emerald-100
                            flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-emerald-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>

                </div>

                <div>
                    <h3 class="font-semibold text-gray-800">
                        Buat Tagihan SPP
                    </h3>

                    <p class="text-xs text-gray-500 mt-0.5">
                        Tambahkan tagihan baru untuk siswa.
                    </p>
                </div>

            </div>


            {{-- Form --}}
            <form method="POST"
                action="{{ route('admin.spp.store') }}"
                class="space-y-4 mt-5">

                @csrf


                {{-- Siswa --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Siswa
                    </label>

                    <select name="siswa_id"
                        class="w-full border border-gray-200 rounded-xl px-3 py-2.5
                               text-sm bg-white
                               focus:outline-none focus:ring-2 focus:ring-emerald-100
                               focus:border-emerald-500"
                        required>

                        @foreach($siswaList as $s)
                            <option value="{{ $s->id }}">
                                {{ $s->nama }}
                            </option>
                        @endforeach

                    </select>
                </div>


                {{-- Bulan --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Bulan
                    </label>

                    <input
                        name="bulan"
                        placeholder="Contoh: Agustus"
                        class="w-full border border-gray-200 rounded-xl px-3 py-2.5
                               text-sm
                               focus:outline-none focus:ring-2 focus:ring-emerald-100
                               focus:border-emerald-500"
                        required>
                </div>


                {{-- Tahun --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Tahun
                    </label>

                    <input
                        type="number"
                        name="tahun"
                        value="{{ date('Y') }}"
                        class="w-full border border-gray-200 rounded-xl px-3 py-2.5
                               text-sm
                               focus:outline-none focus:ring-2 focus:ring-emerald-100
                               focus:border-emerald-500"
                        required>
                </div>


                {{-- Jumlah --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Jumlah (Rp)
                    </label>

                    <div class="relative">

                        <span class="absolute left-3 top-1/2 -translate-y-1/2
                                     text-sm font-medium text-gray-400">
                            Rp
                        </span>

                        <input
                            type="number"
                            name="jumlah"
                            class="w-full border border-gray-200 rounded-xl
                                   pl-10 pr-3 py-2.5 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-emerald-100
                                   focus:border-emerald-500"
                            required>

                    </div>
                </div>


                {{-- Button --}}
                <button
                    class="w-full bg-emerald-600 hover:bg-emerald-700
                           text-white px-4 py-2.5 rounded-xl text-sm
                           font-semibold transition flex items-center
                           justify-center gap-2 mt-2">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>

                    Buat Tagihan
                </button>

            </form>

        </div>

    </div>

</div>

@endsection