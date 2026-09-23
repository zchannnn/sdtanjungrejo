@extends('layouts.public')
@section('title', 'Pendaftaran Siswa Baru')
@section('content')
<div class="max-w-2xl mx-auto px-5 py-12">
    <h1 class="text-2xl font-bold text-center mb-1">Formulir Pendaftaran Siswa Baru</h1>
    <p class="text-gray-500 text-center mb-8">Isi data di bawah ini dengan benar. Tim sekolah akan menghubungi Anda setelah data diverifikasi.</p>

    @if($errors->any())
        <div class="mb-4 px-4 py-3 bg-red-100 text-red-800 rounded-lg text-sm">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('ppdb.store') }}" class="bg-white rounded-xl shadow-sm p-6 space-y-4">
        @csrf
        <div><label class="text-sm text-gray-600">Nama Lengkap Calon Siswa</label><input name="nama_calon_siswa" value="{{ old('nama_calon_siswa') }}" class="w-full border rounded-lg px-3 py-2 mt-1" required></div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="text-sm text-gray-600">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border rounded-lg px-3 py-2 mt-1" required>
                    <option value="">- Pilih -</option>
                    <option value="L" @selected(old('jenis_kelamin')=='L')>Laki-laki</option>
                    <option value="P" @selected(old('jenis_kelamin')=='P')>Perempuan</option>
                </select>
            </div>
            <div>
                <label class="text-sm text-gray-600">Mendaftar ke Kelas</label>
                <select name="kelas_dituju" class="w-full border rounded-lg px-3 py-2 mt-1" required>
                    @for($i=1;$i<=6;$i++)<option value="{{ $i }}" @selected(old('kelas_dituju')==$i)>Kelas {{ $i }}</option>@endfor
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div><label class="text-sm text-gray-600">Tempat Lahir</label><input name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
            <div><label class="text-sm text-gray-600">Tanggal Lahir</label><input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
        </div>

        <div><label class="text-sm text-gray-600">Asal Sekolah (TK/RA)</label><input name="asal_sekolah" value="{{ old('asal_sekolah') }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
        <div><label class="text-sm text-gray-600">Alamat Lengkap</label><input name="alamat" value="{{ old('alamat') }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>

        <div class="border-t pt-4">
            <p class="text-sm font-medium mb-2">Data Orang Tua / Wali</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div><label class="text-sm text-gray-600">Nama Ayah</label><input name="nama_ayah" value="{{ old('nama_ayah') }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
                <div><label class="text-sm text-gray-600">Nama Ibu</label><input name="nama_ibu" value="{{ old('nama_ibu') }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                <div><label class="text-sm text-gray-600">No HP / WhatsApp Aktif</label><input name="no_hp_ortu" value="{{ old('no_hp_ortu') }}" class="w-full border rounded-lg px-3 py-2 mt-1" required></div>
                <div><label class="text-sm text-gray-600">Email (opsional)</label><input type="email" name="email_ortu" value="{{ old('email_ortu') }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
            </div>
        </div>

        <button class="w-full bg-emerald-700 text-white py-3 rounded-lg font-semibold hover:bg-emerald-800">Kirim Pendaftaran</button>
    </form>
</div>
@endsection
