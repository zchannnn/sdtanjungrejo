@extends('layouts.app')

@section('title', 'Tahun Ajaran')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Tahun Ajaran</h1>
            <p class="text-sm text-gray-500 mt-1">
                Kelola tahun ajaran dan semester yang digunakan dalam sistem.
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
                      d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>
            </svg>

            {{ $tahunAjarans->total() }} Tahun Ajaran
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Daftar Tahun Ajaran --}}
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm
                    border border-gray-100 overflow-hidden">

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
                              d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                    </svg>
                </div>

                <div>
                    <h2 class="text-base font-semibold text-gray-800">
                        Daftar Tahun Ajaran
                    </h2>
                    <p class="text-sm text-gray-500">
                        Data tahun ajaran dan status semester.
                    </p>
                </div>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="w-full text-sm">

                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr class="text-left text-gray-500">
                            <th class="px-6 py-4 font-medium">
                                Tahun Ajaran
                            </th>

                            <th class="px-6 py-4 font-medium">
                                Semester
                            </th>

                            <th class="px-6 py-4 font-medium">
                                Status
                            </th>

                            <th class="px-6 py-4 font-medium text-right">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse($tahunAjarans as $t)

                        <tr class="border-b border-gray-100 last:border-0
                                   hover:bg-gray-50/70 transition">

                            {{-- Tahun Ajaran --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-lg bg-emerald-50
                                                flex items-center justify-center
                                                text-emerald-600">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-4 h-4"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="1.8">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                                        </svg>
                                    </div>

                                    <span class="font-semibold text-gray-800">
                                        {{ $t->nama }}
                                    </span>
                                </div>
                            </td>

                            {{-- Semester --}}
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-3 py-1.5
                                             rounded-lg bg-gray-100 text-gray-700
                                             text-xs font-medium">
                                    {{ $t->semester }}
                                </span>
                            </td>

                            {{-- Status --}}
                            <td class="px-6 py-4">
                                @if($t->aktif)

                                    <span class="inline-flex items-center gap-1.5
                                                 text-xs px-3 py-1.5
                                                 bg-emerald-100 text-emerald-700
                                                 rounded-full font-medium">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Aktif
                                    </span>

                                @else

                                    <form
                                        action="{{ route('admin.tahunajaran.aktifkan', $t) }}"
                                        method="POST"
                                        class="inline"
                                    >
                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="inline-flex items-center gap-1.5
                                                   text-xs font-medium
                                                   text-emerald-700
                                                   bg-emerald-50
                                                   hover:bg-emerald-100
                                                   px-3 py-1.5 rounded-lg
                                                   transition"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="w-3.5 h-3.5"
                                                 fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor"
                                                 stroke-width="1.8">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M5 12h14m-7-7l7 7-7 7"/>
                                            </svg>

                                            Jadikan Aktif
                                        </button>
                                    </form>

                                @endif
                            </td>

                            {{-- Aksi --}}
                            <td class="px-6 py-4 text-right">
                                <form
                                    action="{{ route('admin.tahunajaran.destroy', $t) }}"
                                    method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Hapus tahun ajaran ini?')"
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
                            <td colspan="4" class="px-6 py-12 text-center">

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
                                                  d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                                        </svg>
                                    </div>

                                    <p class="text-sm font-medium text-gray-600">
                                        Belum ada data
                                    </p>

                                    <p class="text-xs text-gray-400 mt-1">
                                        Tambahkan tahun ajaran melalui form di samping.
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
                {{ $tahunAjarans->links() }}
            </div>

        </div>

        {{-- Tambah Tahun Ajaran --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100
                    overflow-hidden h-fit">

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
                            Tambah Tahun Ajaran
                        </h3>

                        <p class="text-xs text-gray-500 mt-0.5">
                            Masukkan tahun ajaran baru.
                        </p>
                    </div>

                </div>
            </div>

            {{-- Form --}}
            <form
                method="POST"
                action="{{ route('admin.tahunajaran.store') }}"
                class="p-6 space-y-5"
            >
                @csrf

                {{-- Nama --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama
                    </label>

                    <input
                        type="text"
                        name="nama"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3
                               text-sm text-gray-700
                               focus:outline-none focus:ring-2
                               focus:ring-emerald-100
                               focus:border-emerald-500 transition"
                        placeholder="Contoh: 2026/2027"
                        required
                    >

                    <p class="text-xs text-gray-400 mt-1.5">
                        Contoh format: 2026/2027
                    </p>
                </div>

                {{-- Semester --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Semester
                    </label>

                    <select
                        name="semester"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3
                               text-sm text-gray-700 bg-white
                               focus:outline-none focus:ring-2
                               focus:ring-emerald-100
                               focus:border-emerald-500 transition"
                        required
                    >
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                    </select>
                </div>

                {{-- Aktif --}}
                <label class="flex items-center gap-3 p-3.5 rounded-xl
                              bg-gray-50 border border-gray-100
                              cursor-pointer hover:bg-gray-100 transition">

                    <input
                        type="checkbox"
                        name="aktif"
                        value="1"
                        class="w-4 h-4 rounded border-gray-300
                               text-emerald-600 focus:ring-emerald-500"
                    >

                    <div>
                        <p class="text-sm font-medium text-gray-700">
                            Jadikan tahun ajaran aktif
                        </p>

                        <p class="text-xs text-gray-400 mt-0.5">
                            Tahun ajaran ini akan digunakan sebagai tahun aktif.
                        </p>
                    </div>

                </label>

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