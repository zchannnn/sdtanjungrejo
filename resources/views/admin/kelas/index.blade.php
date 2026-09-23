@extends('layouts.app')
@section('title', 'Data Kelas')
@section('content')
<div class="flex justify-end mb-4">
    <a href="{{ route('admin.kelas.create') }}" class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-emerald-700">+ Tambah Kelas</a>
</div>
<div class="bg-white rounded-xl shadow-sm overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-500 text-left"><tr><th class="p-3">Nama Kelas</th><th>Tingkat</th><th>Wali Kelas</th><th>Tahun Ajaran</th><th class="text-right p-3">Aksi</th></tr></thead>
        <tbody>
        @forelse($kelas as $k)
            <tr class="border-t">
                <td class="p-3">{{ $k->nama_kelas }}</td>
                <td>{{ $k->tingkat }}</td>
                <td>{{ $k->waliKelas?->nama ?? '-' }}</td>
                <td>{{ $k->tahunAjaran?->nama ?? '-' }}</td>
                <td class="p-3 text-right space-x-2">
                    <a href="{{ route('admin.kelas.edit', $k) }}" class="text-emerald-700 hover:underline">Ubah</a>
                    <form action="{{ route('admin.kelas.destroy', $k) }}" method="POST" class="inline" onsubmit="return confirm('Hapus kelas ini?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5" class="p-4 text-center text-gray-400">Belum ada data kelas.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $kelas->links() }}</div>
@endsection
