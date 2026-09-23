@extends('layouts.app')
@section('title', 'Dashboard Guru')
@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
    <div class="bg-white rounded-xl shadow-sm p-5">
        <p class="text-sm text-gray-500">Absensi Diinput Hari Ini</p>
        <p class="text-3xl font-bold text-emerald-700 mt-1">{{ $absensiHariIni }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-sm p-5">
        <p class="text-sm text-gray-500">Kelas yang Diwalikan</p>
        <p class="text-3xl font-bold text-emerald-700 mt-1">{{ $kelasWali?->count() ?? 0 }}</p>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm p-5 mb-6">
    <h3 class="font-semibold mb-3">Jadwal Mengajar Hari Ini</h3>
    @if($jadwalHariIni && $jadwalHariIni->count())
        <table class="w-full text-sm">
            <thead><tr class="text-left text-gray-500 border-b"><th class="py-2">Jam</th><th>Kelas</th><th>Mapel</th></tr></thead>
            <tbody>
            @foreach($jadwalHariIni as $j)
                <tr class="border-b last:border-0">
                    <td class="py-2">{{ \Carbon\Carbon::parse($j->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($j->jam_selesai)->format('H:i') }}</td>
                    <td>{{ $j->kelas->nama_kelas }}</td>
                    <td>{{ $j->mataPelajaran->nama_mapel }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p class="text-sm text-gray-500">Tidak ada jadwal mengajar hari ini.</p>
    @endif
</div>

<div class="bg-white rounded-xl shadow-sm p-5">
    <h3 class="font-semibold mb-3">Kelas yang Anda Walikan</h3>
    @forelse($kelasWali ?? [] as $k)
        <div class="flex items-center justify-between border-b last:border-0 py-2">
            <span>{{ $k->nama_kelas }} ({{ $k->siswas->count() }} siswa)</span>
            <div class="flex gap-2">
                <a href="{{ route('guru.absensi.form', $k) }}" class="text-xs bg-emerald-600 text-white px-3 py-1.5 rounded-lg hover:bg-emerald-700">Isi Absensi</a>
                <a href="{{ route('guru.nilai.form', $k) }}" class="text-xs bg-emerald-100 text-emerald-700 px-3 py-1.5 rounded-lg hover:bg-emerald-200">Input Nilai</a>
            </div>
        </div>
    @empty
        <p class="text-sm text-gray-500">Anda belum menjadi wali kelas manapun.</p>
    @endforelse
</div>
@endsection
