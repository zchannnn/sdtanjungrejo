@extends('layouts.app')
@section('title', 'Pengumuman')
@section('content')
<div class="space-y-3">
    @forelse($pengumumans as $p)
        <div class="bg-white rounded-xl shadow-sm p-5">
            <h3 class="font-semibold">{{ $p->judul }}</h3>
            <p class="text-xs text-gray-400 mt-1">{{ $p->kategori }} &bull; {{ $p->created_at->translatedFormat('d M Y') }}</p>
            <p class="text-sm text-gray-600 mt-2">{{ $p->isi }}</p>
        </div>
    @empty
        <div class="bg-white rounded-xl shadow-sm p-5 text-gray-400 text-sm">Belum ada pengumuman.</div>
    @endforelse
    <div>{{ $pengumumans->links() }}</div>
</div>
@endsection
