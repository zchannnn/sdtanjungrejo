@extends('layouts.app')
@section('title', 'Tahun Ajaran')
@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 text-left"><tr><th class="p-3">Tahun Ajaran</th><th>Semester</th><th>Status</th><th class="text-right p-3">Aksi</th></tr></thead>
            <tbody>
            @forelse($tahunAjarans as $t)
                <tr class="border-t">
                    <td class="p-3">{{ $t->nama }}</td>
                    <td>{{ $t->semester }}</td>
                    <td>
                        @if($t->aktif)
                            <span class="text-xs px-2 py-0.5 bg-green-100 text-green-700 rounded-full">Aktif</span>
                        @else
                            <form action="{{ route('admin.tahunajaran.aktifkan', $t) }}" method="POST" class="inline">
                                @csrf @method('PATCH')
                                <button class="text-xs text-emerald-700 hover:underline">Jadikan Aktif</button>
                            </form>
                        @endif
                    </td>
                    <td class="p-3 text-right">
                        <form action="{{ route('admin.tahunajaran.destroy', $t) }}" method="POST" class="inline" onsubmit="return confirm('Hapus tahun ajaran ini?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="p-4 text-center text-gray-400">Belum ada data.</td></tr>
            @endforelse
            </tbody>
        </table>
        <div class="p-4">{{ $tahunAjarans->links() }}</div>
    </div>
    <div class="bg-white rounded-xl shadow-sm p-5 h-fit">
        <h3 class="font-semibold mb-3">Tambah Tahun Ajaran</h3>
        <form method="POST" action="{{ route('admin.tahunajaran.store') }}" class="space-y-3">
            @csrf
            <div><label class="text-sm text-gray-600">Nama (contoh: 2026/2027)</label><input name="nama" class="w-full border rounded-lg px-3 py-2 mt-1" required></div>
            <div>
                <label class="text-sm text-gray-600">Semester</label>
                <select name="semester" class="w-full border rounded-lg px-3 py-2 mt-1" required>
                    <option value="Ganjil">Ganjil</option><option value="Genap">Genap</option>
                </select>
            </div>
            <label class="flex items-center gap-2 text-sm"><input type="checkbox" name="aktif" value="1"> Jadikan tahun ajaran aktif</label>
            <button class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-emerald-700 w-full">Simpan</button>
        </form>
    </div>
</div>
@endsection
