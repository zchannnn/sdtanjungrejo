@extends('layouts.app')
@section('title', 'Mata Pelajaran')
@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 text-left"><tr><th class="p-3">Kode</th><th>Nama Mapel</th><th class="text-right p-3">Aksi</th></tr></thead>
            <tbody>
            @forelse($mapels as $m)
                <tr class="border-t">
                    <td class="p-3">{{ $m->kode }}</td>
                    <td>{{ $m->nama_mapel }}</td>
                    <td class="p-3 text-right">
                        <form action="{{ route('admin.mapel.destroy', $m) }}" method="POST" class="inline" onsubmit="return confirm('Hapus mapel ini?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="p-4 text-center text-gray-400">Belum ada mata pelajaran.</td></tr>
            @endforelse
            </tbody>
        </table>
        <div class="p-4">{{ $mapels->links() }}</div>
    </div>
    <div class="bg-white rounded-xl shadow-sm p-5 h-fit">
        <h3 class="font-semibold mb-3">Tambah Mata Pelajaran</h3>
        <form method="POST" action="{{ route('admin.mapel.store') }}" class="space-y-3">
            @csrf
            <div><label class="text-sm text-gray-600">Kode</label><input name="kode" class="w-full border rounded-lg px-3 py-2 mt-1" required></div>
            <div><label class="text-sm text-gray-600">Nama Mapel</label><input name="nama_mapel" class="w-full border rounded-lg px-3 py-2 mt-1" required></div>
            <button class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-emerald-700 w-full">Simpan</button>
        </form>
    </div>
</div>
@endsection
