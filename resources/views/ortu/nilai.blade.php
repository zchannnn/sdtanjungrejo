@extends('layouts.app')
@section('title', 'Nilai & Rapor')
@section('content')
@if($anak)
<div class="flex justify-end mb-4">
    <a href="{{ route('rapor.cetak', $anak) }}" class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-emerald-700">Unduh Rapor (PDF)</a>
</div>
@forelse($nilais ?? [] as $mapel => $items)
    <div class="bg-white rounded-xl shadow-sm p-5 mb-4">
        <h3 class="font-semibold mb-3">{{ $mapel }}</h3>
        <table class="w-full text-sm">
            <thead class="text-gray-500 text-left border-b"><tr><th class="py-2">Jenis</th><th>Nilai</th></tr></thead>
            <tbody>
            @foreach($items as $n)
                <tr class="border-b last:border-0"><td class="py-2">{{ $n->jenis }}</td><td>{{ $n->nilai }}</td></tr>
            @endforeach
            </tbody>
        </table>
    </div>
@empty
    <div class="bg-white rounded-xl shadow-sm p-5 text-gray-400 text-sm">Belum ada nilai pada semester ini.</div>
@endforelse
@else
<div class="bg-white rounded-xl shadow-sm p-5 text-gray-400 text-sm">Akun Anda belum terhubung dengan data siswa.</div>
@endif
@endsection
