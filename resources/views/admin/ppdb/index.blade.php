@extends('layouts.app')
@section('title', 'PPDB Online')
@section('content')
<div class="flex items-center justify-between mb-4">
    <form method="GET" class="flex gap-2">
        <select name="status" onchange="this.form.submit()" class="border rounded-lg px-3 py-2 text-sm">
            <option value="">Semua Status</option>
            <option value="Menunggu" @selected(request('status')=='Menunggu')>Menunggu</option>
            <option value="Diterima" @selected(request('status')=='Diterima')>Diterima</option>
            <option value="Ditolak" @selected(request('status')=='Ditolak')>Ditolak</option>
        </select>
    </form>
    <a href="{{ route('ppdb.create') }}" target="_blank" class="text-sm text-emerald-700 hover:underline">Lihat form pendaftaran publik &rarr;</a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-500 text-left">
            <tr><th class="p-3">Nama Calon Siswa</th><th>Daftar Kelas</th><th>Nama Ortu</th><th>No HP</th><th>Status</th><th class="text-right p-3">Aksi</th></tr>
        </thead>
        <tbody>
        @forelse($pendaftars as $p)
            <tr class="border-t">
                <td class="p-3">{{ $p->nama_calon_siswa }} <span class="text-xs text-gray-400">({{ $p->jenis_kelamin }})</span></td>
                <td>Kelas {{ $p->kelas_dituju }}</td>
                <td>{{ $p->nama_ayah ?? $p->nama_ibu ?? '-' }}</td>
                <td>{{ $p->no_hp_ortu }}</td>
                <td>
                    <span class="text-xs px-2 py-0.5 rounded-full
                        {{ $p->status=='Diterima' ? 'bg-green-100 text-green-700' : ($p->status=='Ditolak' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                        {{ $p->status }}
                    </span>
                </td>
                <td class="p-3 text-right space-x-2">
                    @if($p->status == 'Menunggu')
                        <form action="{{ route('admin.ppdb.terima', $p) }}" method="POST" class="inline" onsubmit="return confirm('Terima pendaftaran {{ $p->nama_calon_siswa }}? Data akan otomatis masuk ke Data Siswa.')">
                            @csrf @method('PATCH')
                            <button class="text-emerald-700 hover:underline">Terima</button>
                        </form>
                        <form action="{{ route('admin.ppdb.tolak', $p) }}" method="POST" class="inline" onsubmit="return confirm('Tolak pendaftaran {{ $p->nama_calon_siswa }}?')">
                            @csrf @method('PATCH')
                            <button class="text-red-600 hover:underline">Tolak</button>
                        </form>
                    @else
                        <form action="{{ route('admin.ppdb.destroy', $p) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data pendaftar ini?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    @endif
                </td>
            </tr>
        @empty
            <tr><td colspan="6" class="p-4 text-center text-gray-400">Belum ada pendaftar.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $pendaftars->links() }}</div>
@endsection
