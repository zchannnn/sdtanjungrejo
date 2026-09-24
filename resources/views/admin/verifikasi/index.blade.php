@extends('layouts.app')

@section('title', 'Verifikasi Akun')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <div>
            <div class="flex items-center gap-2 text-sm text-gray-500 mb-1">
                <span>Admin</span>
                <span>/</span>
                <span class="text-emerald-600 font-medium">Verifikasi Akun</span>
            </div>

            <h1 class="text-2xl font-bold text-gray-800">
                Verifikasi Akun
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Kelola verifikasi akun guru dan orang tua yang baru mendaftar.
            </p>
        </div>

        <div class="flex items-center gap-2 bg-emerald-50 text-emerald-700
                    px-4 py-2.5 rounded-xl">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.8">
                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

            <span class="text-sm font-semibold">
                Verifikasi Pengguna
            </span>

        </div>

    </div>


    {{-- Informasi --}}
    <div class="bg-emerald-50 border border-emerald-100 rounded-2xl p-4">

        <div class="flex items-start gap-3">

            <div class="w-9 h-9 shrink-0 rounded-xl bg-white
                        flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 text-emerald-600"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M13 16h-1v-4h-1m1-4h.01M12 21a9 9 0 100-18 9 9 0 000 18z" />
                </svg>

            </div>

            <div>
                <p class="text-sm font-semibold text-emerald-800">
                    Proses Verifikasi
                </p>

                <p class="text-xs text-emerald-700 mt-0.5 leading-5">
                    Kirim kode OTP kepada akun yang belum terverifikasi.
                    Pengguna kemudian dapat memasukkan kode tersebut untuk menyelesaikan proses verifikasi.
                </p>
            </div>

        </div>

    </div>


    {{-- ========================= --}}
    {{-- AKUN GURU --}}
    {{-- ========================= --}}

    <div class="space-y-4">

        <div class="flex items-center justify-between">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-xl bg-emerald-50
                            flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-emerald-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 19a6 6 0 00-12 0m6-8a4 4 0 100-8 4 4 0 000 8zm6-3h3m-1.5-1.5V9.5" />
                    </svg>

                </div>

                <div>
                    <h2 class="font-semibold text-gray-800">
                        Akun Guru Menunggu Verifikasi
                    </h2>

                    <p class="text-xs text-gray-500 mt-0.5">
                        Daftar akun guru yang belum menyelesaikan verifikasi.
                    </p>
                </div>

            </div>

            <span class="hidden sm:inline-flex items-center gap-1.5
                         bg-gray-50 text-gray-600 px-3 py-1.5
                         rounded-lg text-xs font-medium">

                <span class="w-2 h-2 bg-yellow-400 rounded-full"></span>

                {{ $guruBelumVerifikasi->count() }} Akun

            </span>

        </div>


        {{-- Table Guru --}}
        <div class="bg-white rounded-2xl border border-gray-100
                    shadow-sm overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full text-sm">

                    <thead class="bg-gray-50 border-b border-gray-100">

                        <tr class="text-left text-xs uppercase tracking-wide text-gray-500">

                            <th class="px-5 py-3.5 font-semibold">
                                Nama
                            </th>

                            <th class="px-4 py-3.5 font-semibold">
                                Email
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

                    @forelse($guruBelumVerifikasi as $u)

                        <tr class="hover:bg-gray-50/70 transition">

                            {{-- Nama --}}
                            <td class="px-5 py-4">

                                <div class="flex items-center gap-3">

                                    <div class="w-9 h-9 rounded-full bg-emerald-100
                                                text-emerald-700 flex items-center
                                                justify-center font-semibold text-sm">

                                        {{ strtoupper(substr($u->guru->nama ?? $u->name, 0, 1)) }}

                                    </div>

                                    <div>
                                        <p class="font-medium text-gray-800">
                                            {{ $u->guru->nama ?? $u->name }}
                                        </p>

                                        <p class="text-xs text-gray-400">
                                            Akun Guru
                                        </p>
                                    </div>

                                </div>

                            </td>


                            {{-- Email --}}
                            <td class="px-4 py-4">

                                <div class="flex items-center gap-2 text-gray-600">

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
                                                d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>

                                    </div>

                                    <span>
                                        {{ $u->email }}
                                    </span>

                                </div>

                            </td>


                            {{-- Status --}}
                            <td class="px-4 py-4">

                                @if($u->otp_code && $u->otp_expires_at && $u->otp_expires_at->isFuture())

                                    <div class="space-y-1">

                                        <span class="inline-flex items-center gap-1.5
                                                     text-xs px-2.5 py-1
                                                     bg-blue-100 text-blue-700
                                                     rounded-full font-medium">

                                            <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>

                                            Menunggu kode dimasukkan

                                        </span>

                                        <span class="text-xs text-gray-400 block">
                                            Berlaku sampai
                                            {{ $u->otp_expires_at->format('H:i') }}
                                        </span>

                                    </div>

                                @else

                                    <span class="inline-flex items-center gap-1.5
                                                 text-xs px-2.5 py-1
                                                 bg-yellow-100 text-yellow-700
                                                 rounded-full font-medium">

                                        <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full"></span>

                                        Belum diproses

                                    </span>

                                @endif

                            </td>


                            {{-- Aksi --}}
                            <td class="px-5 py-4">

                                <div class="flex items-center justify-end gap-2">

                                    <form
                                        action="{{ route('admin.verifikasi.verifikasi', $u) }}"
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
                                                    d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>

                                            {{ $u->otp_code ? 'Kirim Ulang Kode' : 'Kirim Kode OTP' }}

                                        </button>

                                    </form>


                                    <form
                                        action="{{ route('admin.verifikasi.tolak', $u) }}"
                                        method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Tolak & hapus akun ini?')">

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

                                            Tolak

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="px-5 py-12 text-center">

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
                                                d="M15 19a6 6 0 00-12 0m6-8a4 4 0 100-8 4 4 0 000 8zm6-3h3m-1.5-1.5V9.5" />
                                        </svg>

                                    </div>

                                    <p class="font-medium text-gray-600">
                                        Tidak ada akun guru yang menunggu verifikasi.
                                    </p>

                                    <p class="text-xs text-gray-400 mt-1">
                                        Semua akun guru sudah diproses.
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


    {{-- ========================= --}}
    {{-- AKUN ORANG TUA --}}
    {{-- ========================= --}}

    <div class="space-y-4">

        <div class="flex items-center justify-between">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-xl bg-emerald-50
                            flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-emerald-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m7-10a4 4 0 100-8 4 4 0 000 8zm7-1v6m3-3h-6" />
                    </svg>

                </div>

                <div>
                    <h2 class="font-semibold text-gray-800">
                        Akun Orang Tua Menunggu Verifikasi
                    </h2>

                    <p class="text-xs text-gray-500 mt-0.5">
                        Daftar akun orang tua yang belum menyelesaikan verifikasi.
                    </p>
                </div>

            </div>

            <span class="hidden sm:inline-flex items-center gap-1.5
                         bg-gray-50 text-gray-600 px-3 py-1.5
                         rounded-lg text-xs font-medium">

                <span class="w-2 h-2 bg-yellow-400 rounded-full"></span>

                {{ $ortuBelumVerifikasi->count() }} Akun

            </span>

        </div>


        {{-- Table Orang Tua --}}
        <div class="bg-white rounded-2xl border border-gray-100
                    shadow-sm overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full text-sm">

                    <thead class="bg-gray-50 border-b border-gray-100">

                        <tr class="text-left text-xs uppercase tracking-wide text-gray-500">

                            <th class="px-5 py-3.5 font-semibold">
                                Nama Akun
                            </th>

                            <th class="px-4 py-3.5 font-semibold">
                                Email
                            </th>

                            <th class="px-4 py-3.5 font-semibold">
                                Anak
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

                    @forelse($ortuBelumVerifikasi as $u)

                        <tr class="hover:bg-gray-50/70 transition">

                            {{-- Nama --}}
                            <td class="px-5 py-4">

                                <div class="flex items-center gap-3">

                                    <div class="w-9 h-9 rounded-full bg-emerald-100
                                                text-emerald-700 flex items-center
                                                justify-center font-semibold text-sm">

                                        {{ strtoupper(substr($u->name, 0, 1)) }}

                                    </div>

                                    <div>
                                        <p class="font-medium text-gray-800">
                                            {{ $u->name }}
                                        </p>

                                        <p class="text-xs text-gray-400">
                                            Akun Orang Tua
                                        </p>
                                    </div>

                                </div>

                            </td>


                            {{-- Email --}}
                            <td class="px-4 py-4">

                                <div class="flex items-center gap-2 text-gray-600">

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
                                                d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>

                                    </div>

                                    <span>
                                        {{ $u->email }}
                                    </span>

                                </div>

                            </td>


                            {{-- Anak --}}
                            <td class="px-4 py-4">

                                <div class="flex items-center gap-2">

                                    <div class="w-8 h-8 rounded-lg bg-blue-50
                                                flex items-center justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 text-blue-500"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="1.8">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15 19a6 6 0 00-12 0m6-8a4 4 0 100-8 4 4 0 000 8zm6-3h3m-1.5-1.5V9.5" />
                                        </svg>

                                    </div>

                                    <span class="text-gray-700">
                                        {{ $u->siswa->nama ?? '-' }}
                                    </span>

                                </div>

                            </td>


                            {{-- Status --}}
                            <td class="px-4 py-4">

                                @if($u->otp_code && $u->otp_expires_at && $u->otp_expires_at->isFuture())

                                    <div class="space-y-1">

                                        <span class="inline-flex items-center gap-1.5
                                                     text-xs px-2.5 py-1
                                                     bg-blue-100 text-blue-700
                                                     rounded-full font-medium">

                                            <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>

                                            Menunggu kode dimasukkan

                                        </span>

                                        <span class="text-xs text-gray-400 block">
                                            Berlaku sampai
                                            {{ $u->otp_expires_at->format('H:i') }}
                                        </span>

                                    </div>

                                @else

                                    <span class="inline-flex items-center gap-1.5
                                                 text-xs px-2.5 py-1
                                                 bg-yellow-100 text-yellow-700
                                                 rounded-full font-medium">

                                        <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full"></span>

                                        Belum diproses

                                    </span>

                                @endif

                            </td>


                            {{-- Aksi --}}
                            <td class="px-5 py-4">

                                <div class="flex items-center justify-end gap-2">

                                    <form
                                        action="{{ route('admin.verifikasi.verifikasi', $u) }}"
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
                                                    d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>

                                            {{ $u->otp_code ? 'Kirim Ulang Kode' : 'Kirim Kode OTP' }}

                                        </button>

                                    </form>


                                    <form
                                        action="{{ route('admin.verifikasi.tolak', $u) }}"
                                        method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Tolak & hapus akun ini? Data siswa tetap ada, hanya akun login-nya yang dihapus.')">

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

                                            Tolak

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
                                                d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m7-10a4 4 0 100-8 4 4 0 000 8zm7-1v6m3-3h-6" />
                                        </svg>

                                    </div>

                                    <p class="font-medium text-gray-600">
                                        Tidak ada akun orang tua yang menunggu verifikasi.
                                    </p>

                                    <p class="text-xs text-gray-400 mt-1">
                                        Semua akun orang tua sudah diproses.
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

</div>

@endsection