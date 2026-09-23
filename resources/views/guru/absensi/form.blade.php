@extends('layouts.app')
@section('title', 'Absensi Kelas '.$kelas->nama_kelas)
@section('content')
<form method="GET" class="mb-4 flex items-center gap-2">
    <label class="text-sm text-gray-600">Tanggal:</label>
    <input type="date" name="tanggal" value="{{ $tanggal }}" onchange="this.form.submit()" class="border rounded-lg px-3 py-2 text-sm">
</form>

<form method="POST" action="{{ route('guru.absensi.simpan', $kelas) }}">
    @csrf
    <input type="hidden" name="tanggal" value="{{ $tanggal }}">
    <div class="bg-white rounded-xl shadow-sm overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 text-left"><tr><th class="p-3">Nama Siswa</th><th>Status Kehadiran</th></tr></thead>
            <tbody>
            @forelse($siswas as $s)
                <tr class="border-t">
                    <td class="p-3">{{ $s->nama }}</td>
                    <td class="p-2">
                        <div class="flex flex-wrap gap-x-3 gap-y-1">
                            @foreach(['Hadir','Izin','Sakit','Alpa'] as $opt)
                                <label class="flex items-center gap-1 text-sm">
                                    <input type="radio" name="status[{{ $s->id }}]" value="{{ $opt }}" @checked(($absensiHariIni[$s->id] ?? 'Hadir')==$opt) required>
                                    {{ $opt }}
                                </label>
                            @endforeach
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="2" class="p-4 text-center text-gray-400">Tidak ada siswa aktif di kelas ini.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    @if($siswas->count())
        <button class="mt-4 bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-emerald-700">Simpan Absensi</button>
    @endif
</form>
@endsection
