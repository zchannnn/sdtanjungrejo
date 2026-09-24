@extends('layouts.app')

@section('title', 'Data Guru')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Data Guru
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Kelola data guru yang terdaftar di sekolah.
            </p>
        </div>

        <a
            href="{{ route('admin.guru.create') }}"
            class="inline-flex items-center justify-center gap-2
                   bg-emerald-600 hover:bg-emerald-700
                   text-white px-4 py-2.5 rounded-xl
                   text-sm font-medium shadow-sm transition"
        >
            <span class="text-lg leading-none">+</span>
            Tambah Guru
        </a>

    </div>

    {{-- Table Card --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

        {{-- Card Header --}}
        <div class="px-5 py-4 border-b border-gray-100
                    flex items-center justify-between">

            <div>
                <h2 class="font-semibold text-gray-800">
                    Daftar Guru
                </h2>

                <p class="text-xs text-gray-400 mt-1">
                    Data guru yang tersimpan dalam sistem
                </p>
            </div>

            <div class="bg-emerald-50 text-emerald-700
                        px-3 py-1.5 rounded-lg
                        text-xs font-medium">
                {{ $gurus->total() }} Guru
            </div>

        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-gray-50 border-b border-gray-100">

                    <tr class="text-left text-xs uppercase
                               tracking-wide text-gray-500">

                        <th class="px-5 py-3.5 font-semibold">
                            ID Guru
                        </th>

                        <th class="px-4 py-3.5 font-semibold">
                            Nama Guru
                        </th>

                        <th class="px-4 py-3.5 font-semibold">
                            Email
                        </th>

                        <th class="px-4 py-3.5 font-semibold">
                            No. HP
                        </th>

                        <th class="px-5 py-3.5 font-semibold text-right">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($gurus as $g)

                        <tr class="hover:bg-emerald-50/30 transition">

                            {{-- ID Guru --}}
                            <td class="px-5 py-4">

                                <span class="inline-flex items-center
                                             px-2.5 py-1 rounded-lg
                                             bg-gray-100 text-gray-600
                                             text-xs font-medium">
                                    {{ $g->id_guru ?? '-' }}
                                </span>

                            </td>

                            {{-- Nama --}}
                            <td class="px-4 py-4">

                                <div class="flex items-center gap-3">

                                    <div class="w-9 h-9 rounded-full
                                                bg-emerald-100
                                                text-emerald-700
                                                flex items-center
                                                justify-center
                                                font-semibold text-sm">

                                        {{ strtoupper(substr($g->nama, 0, 1)) }}

                                    </div>

                                    <div>
                                        <p class="font-medium text-gray-800">
                                            {{ $g->nama }}
                                        </p>

                                        <p class="text-xs text-gray-400">
                                            Guru
                                        </p>
                                    </div>

                                </div>

                            </td>

                            {{-- Email --}}
                            <td class="px-4 py-4">

                                <div class="flex items-center gap-2">

                                    <div class="w-7 h-7 rounded-lg
                                                bg-blue-50 text-blue-600
                                                flex items-center justify-center">

                                        <svg
                                            class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.8"
                                                d="M3 8l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"
                                            />
                                        </svg>

                                    </div>

                                    <span class="text-gray-600">
                                        {{ $g->user->email }}
                                    </span>

                                </div>

                            </td>

                            {{-- No HP --}}
                            <td class="px-4 py-4">

                                @if($g->no_hp)

                                    <div class="flex items-center gap-2">

                                        <div class="w-7 h-7 rounded-lg
                                                    bg-emerald-50
                                                    text-emerald-600
                                                    flex items-center
                                                    justify-center">

                                            <svg
                                                class="w-4 h-4"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M6.6 2.8l3.1 1.4a1.5 1.5 0 01.8 1.8l-1 2.8a1.5 1.5 0 01-1.6.9l-1.2-.2a12.4 12.4 0 006.8 6.8l-.2-1.2a1.5 1.5 0 01.9-1.6l2.8-1a1.5 1.5 0 011.8.8l1.4 3.1a1.5 1.5 0 01-.3 1.7l-1.3 1.3c-.6.6-1.5.9-2.4.7C9.2 19 5 14.8 3.7 7.8c-.2-.9.1-1.8.7-2.4l1.3-1.3c.5-.5 1.2-.6 1.9-.3z"
                                                />
                                            </svg>

                                        </div>

                                        <span class="text-gray-600">
                                            {{ $g->no_hp }}
                                        </span>

                                    </div>

                                @else

                                    <span class="text-gray-400">
                                        -
                                    </span>

                                @endif

                            </td>

                            {{-- Aksi --}}
                            <td class="px-5 py-4">

                                <div class="flex items-center justify-end gap-2">

                                    <a
                                        href="{{ route('admin.guru.edit', $g) }}"
                                        class="inline-flex items-center
                                               px-3 py-1.5 rounded-lg
                                               bg-emerald-50
                                               text-emerald-700
                                               hover:bg-emerald-100
                                               text-xs font-medium
                                               transition"
                                    >
                                        Ubah
                                    </a>

                                    <form
                                        action="{{ route('admin.guru.destroy', $g) }}"
                                        method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Hapus akun guru ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="inline-flex items-center
                                                   px-3 py-1.5 rounded-lg
                                                   bg-red-50 text-red-600
                                                   hover:bg-red-100
                                                   text-xs font-medium
                                                   transition"
                                        >
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

                                    <div class="w-14 h-14 rounded-full
                                                bg-gray-100
                                                flex items-center
                                                justify-center mb-3">

                                        <svg
                                            class="w-7 h-7 text-gray-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M17 20a4 4 0 00-8 0m12-7a3 3 0 11-6 0 3 3 0 016 0zM9 13a3 3 0 11-6 0 3 3 0 016 0z"
                                            />
                                        </svg>

                                    </div>

                                    <p class="text-gray-600 font-medium">
                                        Belum ada data guru
                                    </p>

                                    <p class="text-gray-400 text-xs mt-1">
                                        Data guru yang ditambahkan akan muncul di sini.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- Pagination --}}
        @if($gurus->hasPages())

            <div class="px-5 py-4 border-t border-gray-100">
                {{ $gurus->links() }}
            </div>

        @endif

    </div>

</div>

@endsection
