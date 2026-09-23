@extends('layouts.app')
@section('title', 'Data Guru')
@section('content')
<div class="flex justify-end mb-4">
    <a href="{{ route('admin.guru.create') }}" class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-emerald-700">+ Tambah Guru</a>
</div>
<div class="bg-white rounded-xl shadow-sm overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-500 text-left"><tr><th class="p-3">ID Guru</th><th>Nama</th><th>Email</th><th>No HP</th><th class="text-right p-3">Aksi</th></tr></thead>
        <tbody>
        @forelse($gurus as $g)
            <tr class="border-t">
                <td class="p-3">{{ $g->id_guru ?? '-' }}</td>
                <td>{{ $g->nama }}</td>
                <td>{{ $g->user->email }}</td>
                <td>{{ $g->no_hp ?? '-' }}</td>
                <td class="p-3 text-right space-x-2">
                    <a href="{{ route('admin.guru.edit', $g) }}" class="text-emerald-700 hover:underline">Ubah</a>
                    <form action="{{ route('admin.guru.destroy', $g) }}" method="POST" class="inline" onsubmit="return confirm('Hapus akun guru ini?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5" class="p-4 text-center text-gray-400">Belum ada data guru.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $gurus->links() }}</div>
@endsection
