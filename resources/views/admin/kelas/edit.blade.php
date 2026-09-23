@extends('layouts.app')
@section('title', 'Ubah Kelas')
@section('content')
<form method="POST" action="{{ route('admin.kelas.update', $kelas) }}" class="bg-white rounded-xl shadow-sm p-6 max-w-lg space-y-4">
    @csrf @method('PUT')
    <div><label class="text-sm text-gray-600">Nama Kelas</label><input name="nama_kelas" value="{{ $kelas->nama_kelas }}" class="w-full border rounded-lg px-3 py-2 mt-1" required></div>
    <div>
        <label class="text-sm text-gray-600">Tingkat</label>
        <select name="tingkat" class="w-full border rounded-lg px-3 py-2 mt-1" required>
            @for($i=1;$i<=6;$i++)<option value="{{ $i }}" @selected($kelas->tingkat==$i)>Kelas {{ $i }}</option>@endfor
        </select>
    </div>
    <div>
        <label class="text-sm text-gray-600">Wali Kelas</label>
        <select name="wali_kelas_id" class="w-full border rounded-lg px-3 py-2 mt-1">
            <option value="">- Pilih Guru -</option>
            @foreach($gurus as $g)<option value="{{ $g->id }}" @selected($kelas->wali_kelas_id==$g->id)>{{ $g->nama }}</option>@endforeach
        </select>
    </div>
    <div>
        <label class="text-sm text-gray-600">Tahun Ajaran</label>
        <select name="tahun_ajaran_id" class="w-full border rounded-lg px-3 py-2 mt-1">
            <option value="">- Pilih Tahun Ajaran -</option>
            @foreach($tahunAjarans as $t)<option value="{{ $t->id }}" @selected($kelas->tahun_ajaran_id==$t->id)>{{ $t->nama }} ({{ $t->semester }})</option>@endforeach
        </select>
    </div>
    <div class="flex gap-2 pt-2">
        <button class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-emerald-700">Simpan Perubahan</button>
        <a href="{{ route('admin.kelas.index') }}" class="px-4 py-2 rounded-lg text-sm bg-gray-100">Batal</a>
    </div>
</form>
@endsection
