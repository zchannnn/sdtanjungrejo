@extends('layouts.app')

@section('title', 'Pengumuman')

@section('content')

<div class="space-y-5">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Pengumuman</h1>
        <p class="text-sm text-gray-500 mt-1">
            Informasi terbaru dari sekolah.
        </p>
    </div>

    {{-- Daftar Pengumuman --}}
    <div class="space-y-4">

        @forelse($pengumumans as $p)

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">

                <div class="p-5">

                    <div class="flex items-start gap-4">

                        {{-- Icon --}}
                        <div class="w-11 h-11 shrink-0 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                        </div>

                        <div class="min-w-0 flex-1">

                            {{-- Judul --}}
                            <h3 class="font-semibold text-gray-800 text-base">
                                {{ $p->judul }}
                            </h3>

                            {{-- Metadata --}}
                            <div class="flex flex-wrap items-center gap-2 mt-2">

                                <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 text-xs font-medium">
                                    {{ $p->kategori }}
                                </span>

                                <span class="text-xs text-gray-400">
                                    &bull;
                                </span>

                                <span class="text-xs text-gray-400">
                                    {{ $p->created_at->translatedFormat('d M Y') }}
                                </span>

                            </div>

                            {{-- Isi --}}
                            <p class="text-sm text-gray-600 mt-4 leading-6">
                                {{ $p->isi }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-10 text-center">

                <div class="w-14 h-14 mx-auto rounded-full bg-gray-100 text-gray-400 flex items-center justify-center mb-4">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </div>

                <p class="text-sm font-medium text-gray-600">
                    Belum ada pengumuman.
                </p>

                <p class="text-xs text-gray-400 mt-1">
                    Pengumuman dari sekolah akan muncul di sini.
                </p>

            </div>

        @endforelse

    </div>

    {{-- Pagination --}}
    <div>
        {{ $pengumumans->links() }}
    </div>

</div>

@endsection