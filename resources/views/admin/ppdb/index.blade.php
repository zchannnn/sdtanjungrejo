@extends('layouts.app')

@section('title', 'PPDB Online')

@section('content')

<div class="space-y-6">

    <!-- ================= HEADER ================= -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <div>
            <p class="text-sm text-emerald-600 font-medium">
                Administrasi Sekolah
            </p>

            <h1 class="text-2xl font-bold text-gray-800 mt-1">
                PPDB Online
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Kelola data pendaftaran calon siswa baru.
            </p>
        </div>

        <a href="{{ route('ppdb.create') }}"
           target="_blank"
           class="inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-5 py-2.5 rounded-xl transition shadow-sm">

            <svg class="w-5 h-5"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
            </svg>

            Form Pendaftaran Publik
        </a>

    </div>


    <!-- ================= STATISTIK ================= -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

        <!-- Menunggu -->
        <div class="bg-white rounded-2xl border border-yellow-100 shadow-sm p-5">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-500">
                        Menunggu
                    </p>

                    <p class="text-3xl font-bold text-yellow-600 mt-1">
                        {{ $pendaftars->where('status', 'Menunggu')->count() }}
                    </p>

                    <p class="text-xs text-gray-400 mt-1">
                        Pendaftaran perlu diproses
                    </p>
                </div>

                <div class="w-12 h-12 rounded-xl bg-yellow-50 text-yellow-600 flex items-center justify-center">

                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>

                </div>

            </div>

        </div>


        <!-- Diterima -->
        <div class="bg-white rounded-2xl border border-green-100 shadow-sm p-5">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-500">
                        Diterima
                    </p>

                    <p class="text-3xl font-bold text-green-600 mt-1">
                        {{ $pendaftars->where('status', 'Diterima')->count() }}
                    </p>

                    <p class="text-xs text-gray-400 mt-1">
                        Calon siswa diterima
                    </p>
                </div>

                <div class="w-12 h-12 rounded-xl bg-green-50 text-green-600 flex items-center justify-center">

                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>

                </div>

            </div>

        </div>


        <!-- Ditolak -->
        <div class="bg-white rounded-2xl border border-red-100 shadow-sm p-5">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-500">
                        Ditolak
                    </p>

                    <p class="text-3xl font-bold text-red-600 mt-1">
                        {{ $pendaftars->where('status', 'Ditolak')->count() }}
                    </p>

                    <p class="text-xs text-gray-400 mt-1">
                        Pendaftaran ditolak
                    </p>
                </div>

                <div class="w-12 h-12 rounded-xl bg-red-50 text-red-600 flex items-center justify-center">

                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>

                </div>

            </div>

        </div>

    </div>


    <!-- ================= FILTER ================= -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div>
                <h2 class="font-bold text-gray-800">
                    Daftar Pendaftar
                </h2>

                <p class="text-xs text-gray-500 mt-1">
                    Lihat dan kelola seluruh pendaftaran siswa baru.
                </p>
            </div>

            <form method="GET" class="flex items-center gap-2">

                <label for="status" class="text-sm text-gray-500">
                    Status:
                </label>

                <select
                    name="status"
                    id="status"
                    onchange="this.form.submit()"
                    class="border border-gray-200 rounded-xl px-4 py-2 text-sm bg-gray-50 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">

                    <option value="">
                        Semua Status
                    </option>

                    <option value="Menunggu"
                        @selected(request('status') == 'Menunggu')>
                        Menunggu
                    </option>

                    <option value="Diterima"
                        @selected(request('status') == 'Diterima')>
                        Diterima
                    </option>

                    <option value="Ditolak"
                        @selected(request('status') == 'Ditolak')>
                        Ditolak
                    </option>

                </select>

            </form>

        </div>

    </div>


    <!-- ================= TABLE ================= -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-emerald-50 border-b border-emerald-100">

                    <tr class="text-left text-emerald-800">

                        <th class="px-5 py-4 font-semibold">
                            Calon Siswa
                        </th>

                        <th class="px-5 py-4 font-semibold">
                            Kelas
                        </th>

                        <th class="px-5 py-4 font-semibold">
                            Orang Tua
                        </th>

                        <th class="px-5 py-4 font-semibold">
                            No. HP
                        </th>

                        <th class="px-5 py-4 font-semibold">
                            Status
                        </th>

                        <th class="px-5 py-4 font-semibold text-right">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100">

                @forelse($pendaftars as $p)

                    <tr class="hover:bg-gray-50 transition">

                        <!-- Calon Siswa -->
                        <td class="px-5 py-4">

                            <div class="flex items-center gap-3">

                                <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold">

                                    {{ strtoupper(substr($p->nama_calon_siswa, 0, 1)) }}

                                </div>

                                <div>

                                    <p class="font-semibold text-gray-800">
                                        {{ $p->nama_calon_siswa }}
                                    </p>

                                    <p class="text-xs text-gray-400 mt-0.5">
                                        {{ $p->jenis_kelamin }}
                                    </p>

                                </div>

                            </div>

                        </td>


                        <!-- Kelas -->
                        <td class="px-5 py-4">

                            <span class="inline-flex items-center px-3 py-1 rounded-lg bg-gray-100 text-gray-700 text-xs font-medium">

                                Kelas {{ $p->kelas_dituju }}

                            </span>

                        </td>


                        <!-- Orang Tua -->
                        <td class="px-5 py-4 text-gray-600">

                            {{ $p->nama_ayah ?? $p->nama_ibu ?? '-' }}

                        </td>


                        <!-- No HP -->
                        <td class="px-5 py-4">

                            <span class="text-gray-600">
                                {{ $p->no_hp_ortu }}
                            </span>

                        </td>


                        <!-- Status -->
                        <td class="px-5 py-4">

                            @if($p->status == 'Diterima')

                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-green-100 text-green-700 text-xs font-semibold">

                                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>

                                    Diterima

                                </span>

                            @elseif($p->status == 'Ditolak')

                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-red-100 text-red-700 text-xs font-semibold">

                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span>

                                    Ditolak

                                </span>

                            @else

                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-yellow-100 text-yellow-700 text-xs font-semibold">

                                    <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full"></span>

                                    Menunggu

                                </span>

                            @endif

                        </td>


                        <!-- Aksi -->
                        <td class="px-5 py-4 text-right">

                            @if($p->status == 'Menunggu')

                                <div class="flex justify-end items-center gap-2">

                                    <!-- Terima -->
                                    <form
                                        action="{{ route('admin.ppdb.terima', $p) }}"
                                        method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Terima pendaftaran {{ $p->nama_calon_siswa }}? Data akan otomatis masuk ke Data Siswa.')">

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100 font-medium text-xs transition">

                                            <svg class="w-4 h-4"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M5 13l4 4L19 7"/>

                                            </svg>

                                            Terima

                                        </button>

                                    </form>


                                    <!-- Tolak -->
                                    <form
                                        action="{{ route('admin.ppdb.tolak', $p) }}"
                                        method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Tolak pendaftaran {{ $p->nama_calon_siswa }}?')">

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 font-medium text-xs transition">

                                            <svg class="w-4 h-4"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M6 18L18 6M6 6l12 12"/>

                                            </svg>

                                            Tolak

                                        </button>

                                    </form>

                                </div>

                            @else

                                <!-- Hapus -->
                                <form
                                    action="{{ route('admin.ppdb.destroy', $p) }}"
                                    method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Hapus data pendaftar ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg bg-gray-50 text-red-600 hover:bg-red-50 font-medium text-xs transition">

                                        <svg class="w-4 h-4"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>

                                        </svg>

                                        Hapus

                                    </button>

                                </form>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="px-5 py-12 text-center">

                            <div class="flex flex-col items-center">

                                <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mb-4">

                                    <svg class="w-8 h-8 text-gray-400"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>

                                    </svg>

                                </div>

                                <p class="font-medium text-gray-600">
                                    Belum ada pendaftar
                                </p>

                                <p class="text-sm text-gray-400 mt-1">
                                    Data pendaftaran siswa baru akan muncul di sini.
                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>


    <!-- ================= PAGINATION ================= -->
    @if($pendaftars->hasPages())

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm px-5 py-4">

            {{ $pendaftars->links() }}

        </div>

    @endif

</div>

@endsection