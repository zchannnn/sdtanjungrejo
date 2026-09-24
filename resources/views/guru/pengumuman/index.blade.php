@extends('layouts.app')
@section('title', 'Pengumuman')
@section('content')

<div class="space-y-6">

<!-- Header -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Pengumuman</h2>
        <p class="text-sm text-gray-500 mt-1">
            Informasi dan pengumuman terbaru untuk lingkungan sekolah.
        </p>
    </div>

    <div class="flex items-center gap-2 bg-emerald-50 text-emerald-700 px-4 py-2 rounded-xl text-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 4v5h5M7 13h6M7 16h5" />
        </svg>
        <span>Informasi Sekolah</span>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- Daftar Pengumuman -->
    <div class="lg:col-span-2 space-y-4">

        @forelse($pengumumans as $p)

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 hover:shadow-md transition">

                <div class="flex items-start gap-4">

                    <!-- Icon -->
                    <div class="w-11 h-11 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>

                    <div class="flex-1 min-w-0">

                        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-2">

                            <h3 class="font-semibold text-gray-800 text-base">
                                {{ $p->judul }}
                            </h3>

                            <span class="w-fit text-xs px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700">
                                {{ $p->kategori }}
                            </span>

                        </div>

                        <div class="flex flex-wrap items-center gap-x-2 gap-y-1 text-xs text-gray-400 mt-2">
                            <span>{{ $p->penulis->name }}</span>
                            <span>&bull;</span>
                            <span>{{ $p->created_at->translatedFormat('d M Y') }}</span>
                        </div>

                        <p class="text-sm text-gray-600 mt-3 leading-relaxed">
                            {{ $p->isi }}
                        </p>

                    </div>

                </div>

            </div>

        @empty

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-10 text-center">

                <div class="w-14 h-14 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 4v5h5" />
                    </svg>
                </div>

                <p class="font-medium text-gray-500">
                    Belum ada pengumuman.
                </p>

                <p class="text-xs text-gray-400 mt-1">
                    Pengumuman yang diterbitkan akan muncul di sini.
                </p>

            </div>

        @endforelse

        <!-- Pagination -->
        <div class="pt-1">
            {{ $pengumumans->links() }}
        </div>

    </div>

    <!-- Form Pengumuman -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 h-fit">

        <div class="flex items-center gap-3 mb-5">

            <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 4v5h5" />
                </svg>
            </div>

            <div>
                <h3 class="font-semibold text-gray-800">
                    Buat Pengumuman
                </h3>
                <p class="text-xs text-gray-400 mt-0.5">
                    Sampaikan informasi kepada sekolah
                </p>
            </div>

        </div>

        <form method="POST" action="{{ route('guru.pengumuman.store') }}" class="space-y-4">

            @csrf

            <div>
                <label class="text-sm font-medium text-gray-700">
                    Judul
                </label>

                <input
                    name="judul"
                    class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 mt-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition"
                    placeholder="Masukkan judul pengumuman"
                    required
                >
            </div>

            <div>
                <label class="text-sm font-medium text-gray-700">
                    Kategori
                </label>

                <select
                    name="kategori"
                    class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 mt-1.5 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition"
                >
                    <option>Umum</option>
                    <option>Akademik</option>
                    <option>Kegiatan</option>
                </select>
            </div>

            <div>
                <label class="text-sm font-medium text-gray-700">
                    Isi
                </label>

                <textarea
                    name="isi"
                    rows="5"
                    class="w-full border border-gray-200 rounded-xl px-3.5 py-2.5 mt-1.5 text-sm resize-none focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition"
                    placeholder="Tulis isi pengumuman..."
                    required
                ></textarea>
            </div>

            <button
                class="w-full bg-emerald-600 text-white px-4 py-2.5 rounded-xl text-sm font-medium hover:bg-emerald-700 active:bg-emerald-800 transition shadow-sm"
            >
                Terbitkan Pengumuman
            </button>

        </form>

    </div>

</div>

</div>

@endsection
