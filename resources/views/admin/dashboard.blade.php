@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="bg-white rounded-xl shadow-sm p-5">
        <p class="text-sm text-gray-500">Total Siswa Aktif</p>
        <p class="text-3xl font-bold text-emerald-700 mt-1">{{ $totalSiswa }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-sm p-5">
        <p class="text-sm text-gray-500">Total Guru</p>
        <p class="text-3xl font-bold text-emerald-700 mt-1">{{ $totalGuru }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-sm p-5">
        <p class="text-sm text-gray-500">Total Kelas</p>
        <p class="text-3xl font-bold text-emerald-700 mt-1">{{ $totalKelas }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-sm p-5">
        <p class="text-sm text-gray-500">Tunggakan SPP</p>
        <p class="text-3xl font-bold text-red-600 mt-1">{{ $tunggakanSpp }}</p>
    </div>
</div>
<div class="mt-6 bg-white rounded-xl shadow-sm p-5">
    <p class="text-sm text-gray-600">Selamat datang di Sistem Administrasi SD Tanjung Rejo. Gunakan menu di samping untuk mengelola data siswa, guru, kelas, nilai, absensi, SPP, dan pengumuman sekolah.</p>
</div>
@endsection
