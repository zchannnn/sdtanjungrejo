@extends('layouts.app')

@section('title', 'Data Kelas')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Data Kelas
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Kelola data kelas, wali kelas, dan tahun ajaran.
            </p>
        </div>

        <a
            href="{{ route('admin.kelas.create') }}"
            class="inline-flex items-center justify-center gap-2
                   bg-emerald-600 text-white
                   px-4 py-2.5 rounded-xl
                   text-sm font-medium
                   hover:bg-emerald-700
                   shadow-sm transition"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 4v16m8-8H4"
                />
            </svg>

            Tambah Kelas
        </a>

    </div>


    {{-- Table Card --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

        {{-- Card Header --}}
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">

            <div>
                <h2 class="font-semibold text-gray-800">
                    Daftar Kelas
                </h2>

                <p class="text-xs text-gray-400 mt-1">
                    Daftar kelas yang terdaftar dalam sistem.
                </p>
            </div>

            <div class="w-10 h-10 rounded-xl bg-emerald-50
                        flex items-center justify-center">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 text-emerald-600"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3 21h18"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 21V5l7-3 7 3v16"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 9h1M14 9h1M9 13h1M14 13h1M9 17h1M14 17h1"
                    />
                </svg>

            </div>

        </div>


        {{-- Table --}}
        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-gray-50 border-b border-gray-100">

                    <tr class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">

                        <th class="px-6 py-4">
                            Nama Kelas
                        </th>

                        <th class="px-6 py-4">
                            Tingkat
                        </th>

                        <th class="px-6 py-4">
                            Wali Kelas
                        </th>

                        <th class="px-6 py-4">
                            Tahun Ajaran
                        </th>

                        <th class="px-6 py-4 text-right">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100">

                    @forelse($kelas as $k)

                        <tr class="hover:bg-gray-50/70 transition">

                            {{-- Nama Kelas --}}
                            <td class="px-6 py-4">

                                <div class="flex items-center gap-3">

                                    <div
                                        class="w-10 h-10 rounded-xl
                                               bg-emerald-100
                                               flex items-center justify-center
                                               text-emerald-700 font-bold"
                                    >
                                        {{ strtoupper(substr($k->nama_kelas, 0, 1)) }}
                                    </div>

                                    <div>
                                        <p class="font-semibold text-gray-800">
                                            {{ $k->nama_kelas }}
                                        </p>

                                        <p class="text-xs text-gray-400">
                                            Kelas
                                        </p>
                                    </div>

                                </div>

                            </td>


                            {{-- Tingkat --}}
                            <td class="px-6 py-4">

                                <span
                                    class="inline-flex items-center
                                           px-2.5 py-1 rounded-lg
                                           bg-blue-50 text-blue-700
                                           text-xs font-medium"
                                >
                                    Tingkat {{ $k->tingkat }}
                                </span>

                            </td>


                            {{-- Wali Kelas --}}
                            <td class="px-6 py-4">

                                <div class="flex items-center gap-2">

                                    <div
                                        class="w-8 h-8 rounded-full
                                               bg-gray-100
                                               flex items-center justify-center
                                               text-gray-500 text-xs font-semibold"
                                    >
                                        {{ $k->waliKelas ? strtoupper(substr($k->waliKelas->nama, 0, 1)) : '-' }}
                                    </div>

                                    <span class="text-gray-700">
                                        {{ $k->waliKelas?->nama ?? '-' }}
                                    </span>

                                </div>

                            </td>


                            {{-- Tahun Ajaran --}}
                            <td class="px-6 py-4">

                                <span
                                    class="inline-flex items-center gap-1.5
                                           text-gray-600"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-4 h-4 text-gray-400"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >
                                        <rect
                                            x="3"
                                            y="4"
                                            width="18"
                                            height="18"
                                            rx="2"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            d="M16 2v4M8 2v4M3 10h18"
                                        />
                                    </svg>

                                    {{ $k->tahunAjaran?->nama ?? '-' }}
                                </span>

                            </td>


                            {{-- Aksi --}}
                            <td class="px-6 py-4">

                                <div class="flex items-center justify-end gap-2">

                                    {{-- Ubah --}}
                                    <a
                                        href="{{ route('admin.kelas.edit', $k) }}"
                                        class="inline-flex items-center gap-1.5
                                               px-3 py-1.5 rounded-lg
                                               text-xs font-medium
                                               text-emerald-700
                                               bg-emerald-50
                                               hover:bg-emerald-100
                                               transition"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="1.8"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M11 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5"
                                            />

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"
                                            />
                                        </svg>

                                        Ubah
                                    </a>


                                    {{-- Hapus --}}
                                    <form
                                        action="{{ route('admin.kelas.destroy', $k) }}"
                                        method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Hapus kelas ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="inline-flex items-center gap-1.5
                                                   px-3 py-1.5 rounded-lg
                                                   text-xs font-medium
                                                   text-red-600
                                                   bg-red-50
                                                   hover:bg-red-100
                                                   transition"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.8"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M3 6h18"
                                                />

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M8 6V4h8v2"
                                                />

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M19 6l-1 14H6L5 6"
                                                />

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M10 11v5M14 11v5"
                                                />
                                            </svg>

                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="px-6 py-12 text-center"
                            >

                                <div class="flex flex-col items-center">

                                    <div
                                        class="w-14 h-14 rounded-2xl
                                               bg-gray-100
                                               flex items-center justify-center
                                               mb-3"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-7 h-7 text-gray-400"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="1.5"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M3 21h18"
                                            />

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M5 21V5l7-3 7 3v16"
                                            />
                                        </svg>
                                    </div>

                                    <p class="font-medium text-gray-600">
                                        Belum ada data kelas
                                    </p>

                                    <p class="text-sm text-gray-400 mt-1">
                                        Silakan tambahkan data kelas terlebih dahulu.
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
    <div class="pt-1">
        {{ $kelas->links() }}
    </div>

</div>
@endsection