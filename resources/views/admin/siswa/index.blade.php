@extends('layouts.app')
@section('title', 'Data Siswa')
@section('content')
<div class="flex items-center justify-between mb-4">
    <form method="GET" class="flex gap-2">
        <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari nama siswa..." class="border rounded-lg px-3 py-2 text-sm w-56">
        <select name="kelas_id" class="border rounded-lg px-3 py-2 text-sm">
            <option value="">Semua Kelas</option>
            @foreach($kelasList as $k)
                <option value="{{ $k->id }}" @selected(request('kelas_id')==$k->id)>{{ $k->nama_kelas }}</option>
            @endforeach
        </select>
        <button class="bg-gray-200 px-3 py-2 rounded-lg text-sm">Filter</button>
    </form>
    <a href="{{ route('admin.siswa.create') }}" class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-emerald-700">+ Tambah Siswa</a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-500 text-left">
            <tr><th class="p-3">NISN</th><th>Nama</th><th>L/P</th><th>Kelas</th><th>Status</th><th class="text-right p-3">Aksi</th></tr>
        </thead>
        <tbody>
        @forelse($siswas as $s)
            <tr class="border-t">
                <td class="p-3">{{ $s->nisn ?? '-' }}</td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->jenis_kelamin }}</td>
                <td>{{ $s->kelas?->nama_kelas ?? '-' }}</td>
                <td><span class="text-xs px-2 py-0.5 rounded-full {{ $s->status=='Aktif' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">{{ $s->status }}</span></td>
                <td class="p-3 text-right space-x-2">
                    <a href="{{ route('admin.siswa.edit', $s) }}" class="text-emerald-700 hover:underline">Ubah</a>
                    <form action="{{ route('admin.siswa.destroy', $s) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data siswa ini?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6" class="p-4 text-center text-gray-400">Belum ada data siswa.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $siswas->links() }}</div>
@endsection
