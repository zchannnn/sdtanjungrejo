@extends('layouts.app')
@section('title', 'Tambah Guru')
@section('content')
<form method="POST" action="{{ route('admin.guru.store') }}" class="bg-white rounded-xl shadow-sm p-6 max-w-xl space-y-4">
    @csrf
    <div><label class="text-sm text-gray-600">Nama Lengkap</label><input name="nama" class="w-full border rounded-lg px-3 py-2 mt-1" required></div>
    <div>
        <label class="text-sm text-gray-600">Jabatan</label>
        <select name="jabatan" class="w-full border rounded-lg px-3 py-2 mt-1">
            <option value="Guru">Guru</option>
            <option value="Kepala Sekolah">Kepala Sekolah</option>
            <option value="Wakil Kepala Sekolah">Wakil Kepala Sekolah</option>
            <option value="Guru Mapel">Guru Mapel</option>
            <option value="Guru Kelas">Guru Kelas</option>
            <option value="Tata Usaha">Tata Usaha</option>
        </select>
    </div>
    <div><label class="text-sm text-gray-600">ID Guru (kode internal sekolah, bebas)</label><input name="id_guru" class="w-full border rounded-lg px-3 py-2 mt-1" placeholder="contoh: GR-0001"></div>
    <div><label class="text-sm text-gray-600">Email (untuk login)</label><input type="email" name="email" class="w-full border rounded-lg px-3 py-2 mt-1" required></div>
    <div><label class="text-sm text-gray-600">Password</label><input type="password" name="password" class="w-full border rounded-lg px-3 py-2 mt-1" required></div>
    <div><label class="text-sm text-gray-600">No HP</label><input name="no_hp" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <div><label class="text-sm text-gray-600">Alamat</label><input name="alamat" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <div class="flex gap-2 pt-2">
        <button class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-emerald-700">Simpan</button>
        <a href="{{ route('admin.guru.index') }}" class="px-4 py-2 rounded-lg text-sm bg-gray-100">Batal</a>
    </div>
</form>
@endsection
