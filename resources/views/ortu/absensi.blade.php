@extends('layouts.app')
@section('title', 'Absensi Anak')
@section('content')
<div class="bg-white rounded-xl shadow-sm overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-500 text-left"><tr><th class="p-3">Tanggal</th><th>Status</th><th>Keterangan</th></tr></thead>
        <tbody>
        @forelse($absensis ?? [] as $a)
            <tr class="border-t">
                <td class="p-3">{{ $a->tanggal->translatedFormat('d M Y') }}</td>
                <td>
                    <span class="text-xs px-2 py-0.5 rounded-full
                        {{ $a->status=='Hadir' ? 'bg-green-100 text-green-700' : ($a->status=='Alpa' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                        {{ $a->status }}
                    </span>
                </td>
                <td>{{ $a->keterangan ?? '-' }}</td>
            </tr>
        @empty
            <tr><td colspan="3" class="p-4 text-center text-gray-400">Belum ada data absensi.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $absensis?->links() }}</div>
@endsection
