@extends('layouts.app')
@section('title', 'Jadwal Pelajaran')
@section('content')
<div class="bg-white rounded-xl shadow-sm overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-500 text-left"><tr><th class="p-3">Hari</th><th>Jam</th><th>Mata Pelajaran</th><th>Guru</th></tr></thead>
        <tbody>
        @forelse($jadwals ?? [] as $j)
            <tr class="border-t">
                <td class="p-3">{{ $j->hari }}</td>
                <td>{{ \Carbon\Carbon::parse($j->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($j->jam_selesai)->format('H:i') }}</td>
                <td>{{ $j->mataPelajaran->nama_mapel }}</td>
                <td>{{ $j->guru->nama }}</td>
            </tr>
        @empty
            <tr><td colspan="4" class="p-4 text-center text-gray-400">Jadwal belum tersedia.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
