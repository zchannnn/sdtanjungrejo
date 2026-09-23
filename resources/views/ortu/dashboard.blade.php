@extends('layouts.app')
@section('title', 'Dashboard Orang Tua')
@section('content')
@if($anak)
<div class="bg-white rounded-xl shadow-sm p-5 mb-6 flex items-center justify-between">
    <div>
        <h3 class="font-semibold text-lg">{{ $anak->nama }}</h3>
        <p class="text-sm text-gray-500">NISN: {{ $anak->nisn ?? '-' }} &bull; Kelas: {{ $anak->kelas?->nama_kelas ?? '-' }}</p>
    </div>
    <a href="{{ route('rapor.cetak', $anak) }}" class="bg-emerald-600 text-white text-sm px-4 py-2 rounded-lg hover:bg-emerald-700">Unduh Rapor (PDF)</a>
</div>
<div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
    <a href="{{ route('ortu.absensi.index') }}" class="bg-white rounded-xl shadow-sm p-5 hover:shadow-md transition">
        <p class="text-sm text-gray-500">Absensi</p>
        <p class="text-sm mt-2 text-emerald-700">Lihat kehadiran anak &rarr;</p>
    </a>
    <a href="{{ route('ortu.nilai.index') }}" class="bg-white rounded-xl shadow-sm p-5 hover:shadow-md transition">
        <p class="text-sm text-gray-500">Nilai</p>
        <p class="text-sm mt-2 text-emerald-700">Lihat nilai semester ini &rarr;</p>
    </a>
    <div class="bg-white rounded-xl shadow-sm p-5">
        <p class="text-sm text-gray-500">Tunggakan SPP</p>
        <p class="text-2xl font-bold {{ $tunggakan > 0 ? 'text-red-600' : 'text-emerald-700' }} mt-1">{{ $tunggakan }} bulan</p>
    </div>
</div>
@else
<div class="bg-white rounded-xl shadow-sm p-5">
    <p class="text-sm text-gray-500">Akun Anda belum terhubung dengan data siswa. Silakan hubungi pihak sekolah.</p>
</div>
@endif
@endsection
