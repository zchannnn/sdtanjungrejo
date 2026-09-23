@extends('layouts.app')
@section('title', 'Ubah Guru')
@section('content')
<form method="POST" action="{{ route('admin.guru.update', $guru) }}" class="bg-white rounded-xl shadow-sm p-6 max-w-xl space-y-4">
    @csrf @method('PUT')
    <div><label class="text-sm text-gray-600">Nama Lengkap</label><input name="nama" value="{{ $guru->nama }}" class="w-full border rounded-lg px-3 py-2 mt-1" required></div>
    <div>
        <label class="text-sm text-gray-600">Jabatan</label>
        <select name="jabatan" class="w-full border rounded-lg px-3 py-2 mt-1">
            @foreach(['Guru','Kepala Sekolah','Wakil Kepala Sekolah','Guru Mapel','Guru Kelas','Tata Usaha'] as $j)
                <option value="{{ $j }}" @selected($guru->jabatan==$j)>{{ $j }}</option>
            @endforeach
        </select>
    </div>
    <div><label class="text-sm text-gray-600">ID Guru</label><input name="id_guru" value="{{ $guru->id_guru }}" class="w-full border rounded-lg px-3 py-2 mt-1" placeholder="contoh: GR-0001"></div>
    <div><label class="text-sm text-gray-600">No HP</label><input name="no_hp" value="{{ $guru->no_hp }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <div><label class="text-sm text-gray-600">Alamat</label><input name="alamat" value="{{ $guru->alamat }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <div class="flex gap-2 pt-2">
        <button class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-emerald-700">Simpan Perubahan</button>
        <a href="{{ route('admin.guru.index') }}" class="px-4 py-2 rounded-lg text-sm bg-gray-100">Batal</a>
    </div>
</form>
@endsection
