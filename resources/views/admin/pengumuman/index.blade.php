@extends('layouts.app')
@section('title', 'Pengumuman')
@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-3">
        @forelse($pengumumans as $p)
            <div class="bg-white rounded-xl shadow-sm p-5">
                <div class="flex items-center justify-between">
                    <h3 class="font-semibold">{{ $p->judul }}</h3>
                    <form action="{{ route('admin.pengumuman.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus pengumuman ini?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 text-xs hover:underline">Hapus</button>
                    </form>
                </div>
                <p class="text-xs text-gray-400 mt-1">{{ $p->kategori }} &bull; {{ $p->penulis->name }} &bull; {{ $p->created_at->translatedFormat('d M Y') }}</p>
                <p class="text-sm text-gray-600 mt-2">{{ $p->isi }}</p>
            </div>
        @empty
            <div class="bg-white rounded-xl shadow-sm p-5 text-gray-400 text-sm">Belum ada pengumuman.</div>
        @endforelse
        <div>{{ $pengumumans->links() }}</div>
    </div>
    <div class="bg-white rounded-xl shadow-sm p-5 h-fit">
        <h3 class="font-semibold mb-3">Buat Pengumuman</h3>
        <form method="POST" action="{{ route('admin.pengumuman.store') }}" class="space-y-3">
            @csrf
            <div><label class="text-sm text-gray-600">Judul</label><input name="judul" class="w-full border rounded-lg px-3 py-2 mt-1" required></div>
            <div>
                <label class="text-sm text-gray-600">Kategori</label>
                <select name="kategori" class="w-full border rounded-lg px-3 py-2 mt-1">
                    <option>Umum</option><option>Akademik</option><option>Keuangan</option><option>Kegiatan</option>
                </select>
            </div>
            <div><label class="text-sm text-gray-600">Isi Pengumuman</label><textarea name="isi" rows="4" class="w-full border rounded-lg px-3 py-2 mt-1" required></textarea></div>
            <button class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-emerald-700 w-full">Terbitkan</button>
        </form>
    </div>
</div>
@endsection
