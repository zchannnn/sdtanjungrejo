@extends('layouts.app')

@section('title', 'Mata Pelajaran')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Mata Pelajaran</h1>
            <p class="text-sm text-gray-500 mt-1">
                Kelola daftar mata pelajaran yang digunakan dalam sistem.
            </p>
        </div>

        <div class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700
                    px-4 py-2.5 rounded-xl text-sm font-medium w-fit">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="1.8">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M12 6.75v10.5M6.75 12h10.5"/>
            </svg>
            {{ $mapels->total() }} Mata Pelajaran
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Data Mata Pelajaran --}}
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

            {{-- Card Header --}}
            <div class="px-6 py-5 border-b border-gray-100 flex items-center gap-4">
                <div class="w-11 h-11 rounded-xl bg-emerald-100
                            flex items-center justify-center text-emerald-700">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-6 h-6"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M12 6.75V21m0-14.25C10.93 5.58 9.44 5 7.75 5H4.5A1.5 1.5 0 003 6.5v11A1.5 1.5 0 004.5 19h3.25c1.69 0 3.18.58 4.25 1.75m0-14.25C13.07 5.58 14.56 5 16.25 5h3.25A1.5 1.5 0 0121 6.5v11a1.5 1.5 0 01-1.5 1.5h-3.25c-1.69 0-3.18.58-4.25 1.75"/>
                    </svg>
                </div>

                <div>
                    <h2 class="text-base font-semibold text-gray-800">
                        Daftar Mata Pelajaran
                    </h2>
                    <p class="text-sm text-gray-500">
                        Data mata pelajaran yang tersedia.
                    </p>
                </div>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr class="text-left text-gray-500">
                            <th class="px-6 py-4 font-medium">
                                Kode
                            </th>

                            <th class="px-6 py-4 font-medium">
                                Nama Mata Pelajaran
                            </th>

                            <th class="px-6 py-4 font-medium text-right">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse($mapels as $m)
                        <tr class="border-b border-gray-100 last:border-0 hover:bg-gray-50/70 transition">

                            {{-- Kode --}}
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-3 py-1.5
                                             rounded-lg bg-gray-100 text-gray-700
                                             font-medium text-xs">
                                    {{ $m->kode }}
                                </span>
                            </td>

                            {{-- Nama Mapel --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-lg bg-emerald-50
                                                flex items-center justify-center
                                                text-emerald-600 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-4 h-4"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="1.8">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M12 6.75V21m0-14.25C10.93 5.58 9.44 5 7.75 5H4.5A1.5 1.5 0 003 6.5v11A1.5 1.5 0 004.5 19h3.25c1.69 0 3.18.58 4.25 1.75m0-14.25C13.07 5.58 14.56 5 16.25 5h3.25A1.5 1.5 0 0121 6.5v11a1.5 1.5 0 01-1.5 1.5h-3.25c-1.69 0-3.18.58-4.25 1.75"/>
                                        </svg>
                                    </div>

                                    <span class="font-medium text-gray-800">
                                        {{ $m->nama_mapel }}
                                    </span>
                                </div>
                            </td>

                            {{-- Aksi --}}
                            <td class="px-6 py-4 text-right">
                                <form
                                    action="{{ route('admin.mapel.destroy', $m) }}"
                                    method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Hapus mapel ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="inline-flex items-center gap-1.5
                                               px-3 py-2 rounded-lg
                                               text-xs font-medium
                                               text-red-600 bg-red-50
                                               hover:bg-red-100 transition"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-4 h-4"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="1.8">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M6 7h12M9 7V5.5A1.5 1.5 0 0110.5 4h3A1.5 1.5 0 0115 5.5V7m-7 0 .7 12.1a1 1 0 001 .9h4.6a1 1 0 001-.9L16 7M10 11v5m4-5v5"/>
                                        </svg>

                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-12 text-center">

                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-14 h-14 rounded-2xl bg-gray-100
                                                flex items-center justify-center
                                                text-gray-400 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-7 h-7"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="1.5">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M12 6.75V21m0-14.25C10.93 5.58 9.44 5 7.75 5H4.5A1.5 1.5 0 003 6.5v11A1.5 1.5 0 004.5 19h3.25c1.69 0 3.18.58 4.25 1.75m0-14.25C13.07 5.58 14.56 5 16.25 5h3.25A1.5 1.5 0 0121 6.5v11a1.5 1.5 0 01-1.5 1.5h-3.25c-1.69 0-3.18.58-4.25 1.75"/>
                                        </svg>
                                    </div>

                                    <p class="text-sm font-medium text-gray-600">
                                        Belum ada mata pelajaran
                                    </p>

                                    <p class="text-xs text-gray-400 mt-1">
                                        Tambahkan mata pelajaran melalui form di samping.
                                    </p>
                                </div>

                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $mapels->links() }}
            </div>

        </div>

        {{-- Tambah Mata Pelajaran --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden h-fit">

            {{-- Card Header --}}
            <div class="px-6 py-5 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-emerald-100
                                flex items-center justify-center text-emerald-700">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 5v14m-7-7h14"/>
                        </svg>
                    </div>

                    <div>
                        <h3 class="font-semibold text-gray-800">
                            Tambah Mata Pelajaran
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Masukkan data mapel baru.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Form --}}
            <form
                method="POST"
                action="{{ route('admin.mapel.store') }}"
                class="p-6 space-y-5"
            >
                @csrf

                {{-- Kode --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Kode
                    </label>

                    <input
                        type="text"
                        name="kode"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3
                               text-sm text-gray-700
                               focus:outline-none focus:ring-2
                               focus:ring-emerald-100
                               focus:border-emerald-500 transition"
                        placeholder="Contoh: MTK"
                        required
                    >
                </div>

                {{-- Nama Mapel --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Mapel
                    </label>

                    <input
                        type="text"
                        name="nama_mapel"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3
                               text-sm text-gray-700
                               focus:outline-none focus:ring-2
                               focus:ring-emerald-100
                               focus:border-emerald-500 transition"
                        placeholder="Contoh: Matematika"
                        required
                    >
                </div>

                {{-- Submit --}}
                <button
                    type="submit"
                    class="w-full inline-flex items-center justify-center gap-2
                           bg-emerald-600 text-white px-4 py-3 rounded-xl
                           text-sm font-medium hover:bg-emerald-700
                           shadow-sm transition"
                >
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-4 h-4"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M12 5v14m-7-7h14"/>
                    </svg>

                    Simpan
                </button>

            </form>
        </div>

    </div>

</div>
@endsection