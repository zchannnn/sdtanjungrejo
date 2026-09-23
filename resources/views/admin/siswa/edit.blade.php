@extends('layouts.app')
@section('title', 'Ubah Siswa')
@section('content')
<form method="POST" action="{{ route('admin.siswa.update', $siswa) }}" class="bg-white rounded-xl shadow-sm p-6 max-w-2xl space-y-4">
    @csrf @method('PUT')
    <div><label class="text-sm text-gray-600">Nama Lengkap</label><input name="nama" value="{{ $siswa->nama }}" class="w-full border rounded-lg px-3 py-2 mt-1" required></div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div><label class="text-sm text-gray-600">NISN</label><input name="nisn" value="{{ $siswa->nisn }}" class="w-full border rounded-lg px-3 py-2 mt-1" placeholder="10 digit (opsional)"></div>
        <div>
            <label class="text-sm text-gray-600">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="w-full border rounded-lg px-3 py-2 mt-1" required>
                <option value="L" @selected($siswa->jenis_kelamin=='L')>Laki-laki</option>
                <option value="P" @selected($siswa->jenis_kelamin=='P')>Perempuan</option>
            </select>
        </div>
    </div>
    <div>
        <label class="text-sm text-gray-600">Kelas</label>
        <select name="kelas_id" class="w-full border rounded-lg px-3 py-2 mt-1">
            <option value="">- Pilih Kelas -</option>
            @foreach($kelasList as $k)<option value="{{ $k->id }}" @selected($siswa->kelas_id==$k->id)>{{ $k->nama_kelas }}</option>@endforeach
        </select>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div><label class="text-sm text-gray-600">Tempat Lahir</label><input name="tempat_lahir" value="{{ $siswa->tempat_lahir }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
        <div><label class="text-sm text-gray-600">Tanggal Lahir</label><input type="date" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir?->format('Y-m-d') }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    </div>
    <div><label class="text-sm text-gray-600">Alamat</label><input name="alamat" value="{{ $siswa->alamat }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div><label class="text-sm text-gray-600">Nama Orang Tua</label><input name="nama_ortu" value="{{ $siswa->nama_ortu }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
        <div><label class="text-sm text-gray-600">No HP Orang Tua</label><input name="no_hp_ortu" value="{{ $siswa->no_hp_ortu }}" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
    </div>
    <div>
        <label class="text-sm text-gray-600">Status</label>
        <select name="status" class="w-full border rounded-lg px-3 py-2 mt-1">
            @foreach(['Aktif','Pindah','Lulus'] as $st)
                <option value="{{ $st }}" @selected($siswa->status==$st)>{{ $st }}</option>
            @endforeach
        </select>
    </div>

    <div class="border-t pt-4">
        @if($siswa->user_id)
            <p class="text-sm text-gray-600">
                Akun login orang tua: <span class="font-medium">{{ $siswa->user->email }}</span>
                <span class="text-xs px-2 py-0.5 bg-green-100 text-green-700 rounded-full ml-1">Aktif</span>
            </p>
        @else
            <p class="text-sm font-medium mb-2">Buat Akun Login untuk Orang Tua (opsional)</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div><label class="text-sm text-gray-600">Email Ortu</label><input type="email" name="email_ortu" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
                <div><label class="text-sm text-gray-600">Password</label><input type="password" name="password_ortu" class="w-full border rounded-lg px-3 py-2 mt-1"></div>
            </div>
        @endif
    </div>

    <div class="flex gap-2 pt-2">
        <button class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-emerald-700">Simpan Perubahan</button>
        <a href="{{ route('admin.siswa.index') }}" class="px-4 py-2 rounded-lg text-sm bg-gray-100">Batal</a>
    </div>
</form>
@endsection
