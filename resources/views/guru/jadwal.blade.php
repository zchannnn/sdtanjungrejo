@extends('layouts.app')
@section('title', 'Jadwal Mengajar')
@section('content')
<div class="bg-white rounded-xl shadow-sm overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-500 text-left"><tr><th class="p-3">Hari</th><th>Jam</th><th>Kelas</th><th>Mata Pelajaran</th></tr></thead>
        <tbody>
        @forelse($jadwals ?? [] as $j)
            <tr class="border-t">
                <td class="p-3">{{ $j->hari }}</td>
                <td>{{ \Carbon\Carbon::parse($j->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($j->jam_selesai)->format('H:i') }}</td>
                <td>{{ $j->kelas->nama_kelas }}</td>
                <td>{{ $j->mataPelajaran->nama_mapel }}</td>
            </tr>
        @empty
            <tr><td colspan="4" class="p-4 text-center text-gray-400">Belum ada jadwal mengajar.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
