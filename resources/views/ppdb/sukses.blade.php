@extends('layouts.public')
@section('title', 'Pendaftaran Berhasil')
@section('content')
<div class="max-w-lg mx-auto px-5 py-20 text-center">
    <div class="w-16 h-16 bg-emerald-100 text-emerald-700 rounded-full flex items-center justify-center mx-auto text-3xl">&#10003;</div>
    <h1 class="text-2xl font-bold mt-6">Pendaftaran Berhasil Dikirim!</h1>
    <p class="text-gray-500 mt-3">
        Terima kasih, pendaftaran atas nama <strong>{{ $pendaftaran->nama_calon_siswa }}</strong> untuk
        <strong>Kelas {{ $pendaftaran->kelas_dituju }}</strong> sudah kami terima.
        Tim sekolah akan menghubungi ke nomor <strong>{{ $pendaftaran->no_hp_ortu }}</strong> setelah data diverifikasi.
    </p>
    <a href="{{ route('home') }}" class="inline-block mt-8 bg-emerald-700 text-white px-6 py-3 rounded-lg hover:bg-emerald-800">Kembali ke Beranda</a>
</div>
@endsection
