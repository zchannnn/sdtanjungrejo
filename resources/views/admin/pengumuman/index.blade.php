@extends('layouts.app')

@section('title', 'Pengumuman')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-sm text-gray-500 mb-1">
                <span>Admin</span>
                <span>/</span>
                <span class="text-emerald-600 font-medium">Pengumuman</span>
            </div>

            <h1 class="text-2xl font-bold text-gray-800">
                Pengumuman
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Kelola informasi dan pengumuman untuk warga sekolah.
            </p>
        </div>

        <div class="flex items-center gap-2 bg-emerald-50 text-emerald-700 px-4 py-2.5 rounded-xl">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.8">
                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M19 11H5m14 0a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2m14 0V9a2 2 0 00-2-2h-1V5a2 2 0 00-2-2H8a2 2 0 00-2 2v2H5a2 2 0 00-2 2v2" />
            </svg>

            <span class="text-sm font-semibold">
                Informasi Sekolah
            </span>

        </div>
    </div>


    {{-- Main Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Daftar Pengumuman --}}
        <div class="lg:col-span-2 space-y-4">

            {{-- Section Header --}}
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm px-5 py-4">

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
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>

                        </div>

                        <div>
                            <h2 class="font-semibold text-gray-800">
                                Daftar Pengumuman
                            </h2>

                            <p class="text-xs text-gray-500 mt-0.5">
                                Informasi yang telah diterbitkan.
                            </p>
                        </div>

                    </div>

                    <span class="hidden sm:inline-flex items-center gap-1.5
                                 bg-gray-50 text-gray-600 px-3 py-1.5
                                 rounded-lg text-xs font-medium">

                        <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>

                        {{ $pengumumans->total() }} Pengumuman

                    </span>

                </div>

            </div>


            {{-- Cards Pengumuman --}}
            @forelse($pengumumans as $p)

                <div class="bg-white rounded-2xl border border-gray-100
                            shadow-sm p-5 hover:shadow-md transition">

                    <div class="flex items-start justify-between gap-4">

                        <div class="flex items-start gap-3 min-w-0">

                            {{-- Icon --}}
                            <div class="w-10 h-10 shrink-0 rounded-xl
                                        bg-emerald-50 flex items-center
                                        justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 text-emerald-600"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M19 11H5m14 0a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2m14 0V9a2 2 0 00-2-2h-1V5a2 2 0 00-2-2H8a2 2 0 00-2 2v2H5a2 2 0 00-2 2v2" />
                                </svg>

                            </div>


                            {{-- Judul --}}
                            <div class="min-w-0">

                                <h3 class="font-semibold text-gray-800
                                           leading-6 break-words">
                                    {{ $p->judul }}
                                </h3>

                                <div class="flex flex-wrap items-center gap-2 mt-1.5">

                                    <span class="inline-flex items-center
                                                 px-2 py-1 rounded-full
                                                 bg-emerald-50 text-emerald-700
                                                 text-[11px] font-semibold">
                                        {{ $p->kategori }}
                                    </span>

                                    <span class="text-xs text-gray-400">
                                        •
                                    </span>

                                    <span class="text-xs text-gray-400">
                                        {{ $p->penulis->name }}
                                    </span>

                                    <span class="text-xs text-gray-400">
                                        •
                                    </span>

                                    <span class="text-xs text-gray-400">
                                        {{ $p->created_at->translatedFormat('d M Y') }}
                                    </span>

                                </div>

                            </div>

                        </div>


                        {{-- Hapus --}}
                        <form
                            action="{{ route('admin.pengumuman.destroy', $p) }}"
                            method="POST"
                            onsubmit="return confirm('Hapus pengumuman ini?')"
                            class="shrink-0">

                            @csrf
                            @method('DELETE')

                            <button
                                class="w-8 h-8 rounded-lg bg-red-50
                                       text-red-500 hover:bg-red-100
                                       flex items-center justify-center
                                       transition"
                                title="Hapus">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M6 7h12M10 11v6M14 11v6M9 7V4h6v3m-8 0l1 13h8l1-13" />
                                </svg>

                            </button>

                        </form>

                    </div>


                    {{-- Isi --}}
                    <div class="mt-4 ml-0 sm:ml-[52px]">

                        <p class="text-sm text-gray-600 leading-6">
                            {{ $p->isi }}
                        </p>

                    </div>

                </div>

            @empty

                {{-- Empty State --}}
                <div class="bg-white rounded-2xl border border-gray-100
                            shadow-sm p-10 text-center">

                    <div class="w-14 h-14 mx-auto rounded-2xl bg-gray-100
                                flex items-center justify-center mb-3">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-7 h-7 text-gray-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19 11H5m14 0a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2m14 0V9a2 2 0 00-2-2h-1V5a2 2 0 00-2-2H8a2 2 0 00-2 2v2H5a2 2 0 00-2 2v2" />
                        </svg>

                    </div>

                    <p class="font-medium text-gray-600">
                        Belum ada pengumuman
                    </p>

                    <p class="text-xs text-gray-400 mt-1">
                        Pengumuman yang diterbitkan akan tampil di sini.
                    </p>

                </div>

            @endforelse


            {{-- Pagination --}}
            <div>
                {{ $pengumumans->links() }}
            </div>

        </div>


        {{-- Form Buat Pengumuman --}}
        <div class="bg-white rounded-2xl border border-gray-100
                    shadow-sm p-5 h-fit">

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
                        Buat Pengumuman
                    </h3>

                    <p class="text-xs text-gray-500 mt-0.5">
                        Terbitkan informasi baru untuk sekolah.
                    </p>
                </div>

            </div>


            {{-- Form --}}
            <form
                method="POST"
                action="{{ route('admin.pengumuman.store') }}"
                class="space-y-4 mt-5">

                @csrf


                {{-- Judul --}}
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Judul
                    </label>

                    <input
                        name="judul"
                        class="w-full border border-gray-200 rounded-xl
                               px-3 py-2.5 text-sm
                               focus:outline-none focus:ring-2
                               focus:ring-emerald-100
                               focus:border-emerald-500"
                        placeholder="Masukkan judul pengumuman..."
                        required>

                </div>


                {{-- Kategori --}}
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Kategori
                    </label>

                    <select
                        name="kategori"
                        class="w-full border border-gray-200 rounded-xl
                               px-3 py-2.5 text-sm bg-white
                               focus:outline-none focus:ring-2
                               focus:ring-emerald-100
                               focus:border-emerald-500">

                        <option>Umum</option>
                        <option>Akademik</option>
                        <option>Keuangan</option>
                        <option>Kegiatan</option>

                    </select>

                </div>


                {{-- Isi --}}
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Isi Pengumuman
                    </label>

                    <textarea
                        name="isi"
                        rows="5"
                        placeholder="Tulis isi pengumuman..."
                        class="w-full border border-gray-200 rounded-xl
                               px-3 py-2.5 text-sm resize-none
                               focus:outline-none focus:ring-2
                               focus:ring-emerald-100
                               focus:border-emerald-500"
                        required></textarea>

                </div>


                {{-- Button --}}
                <button
                    class="w-full bg-emerald-600 hover:bg-emerald-700
                           text-white px-4 py-2.5 rounded-xl
                           text-sm font-semibold transition
                           flex items-center justify-center gap-2">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 10l9-7 9 7v10a1 1 0 01-1 1H4a1 1 0 01-1-1V10z" />
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 21v-6h6v6" />
                    </svg>

                    Terbitkan

                </button>

            </form>

        </div>

    </div>

</div>

@endsection