@extends('layouts.app')
@section('title', 'Input Nilai Kelas '.$kela->nama_kelas)
@section('content')
<form method="GET" class="mb-4 flex items-center gap-2">
    <select name="mata_pelajaran_id" onchange="this.form.submit()" class="border rounded-lg px-3 py-2 text-sm">
        @foreach($mapels as $m)<option value="{{ $m->id }}" @selected($mapelId==$m->id)>{{ $m->nama_mapel }}</option>@endforeach
    </select>
    <select name="jenis" onchange="this.form.submit()" class="border rounded-lg px-3 py-2 text-sm">
        @foreach(['Tugas','UTS','UAS'] as $j)<option value="{{ $j }}" @selected($jenis==$j)>{{ $j }}</option>@endforeach
    </select>
</form>

@if(!$tahunAjaran)
    <div class="bg-yellow-100 text-yellow-800 rounded-lg p-4 text-sm">Belum ada tahun ajaran aktif. Silakan minta admin mengaktifkan tahun ajaran terlebih dahulu.</div>
@else
<form method="POST" action="{{ route('guru.nilai.simpan', $kela) }}">
    @csrf
    <input type="hidden" name="mata_pelajaran_id" value="{{ $mapelId }}">
    <input type="hidden" name="jenis" value="{{ $jenis }}">
    <div class="bg-white rounded-xl shadow-sm overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 text-left"><tr><th class="p-3">Nama Siswa</th><th class="w-40">Nilai (0-100)</th></tr></thead>
            <tbody>
            @forelse($siswas as $s)
                <tr class="border-t">
                    <td class="p-3">{{ $s->nama }}</td>
                    <td class="p-2"><input type="number" step="0.01" min="0" max="100" name="nilai[{{ $s->id }}]" value="{{ $nilaiSekarang[$s->id] ?? '' }}" class="border rounded-lg px-3 py-1.5 w-28" required></td>
                </tr>
            @empty
                <tr><td colspan="2" class="p-4 text-center text-gray-400">Tidak ada siswa aktif di kelas ini.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    @if($siswas->count())
        <button class="mt-4 bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-emerald-700">Simpan Nilai</button>
    @endif
</form>
@endif
@endsection
