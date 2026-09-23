@extends('layouts.app')
@section('title', 'Jadwal Pelajaran')
@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-4">
        <form method="GET" class="flex gap-2">
            <select name="kelas_id" onchange="this.form.submit()" class="border rounded-lg px-3 py-2 text-sm">
                <option value="">Semua Kelas</option>
                @foreach($kelasList as $k)
                    <option value="{{ $k->id }}" @selected(request('kelas_id')==$k->id)>{{ $k->nama_kelas }}</option>
                @endforeach
            </select>
        </form>

        <div class="bg-white rounded-xl shadow-sm overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-500 text-left">
                    <tr><th class="p-3">Kelas</th><th>Hari</th><th>Jam</th><th>Mapel</th><th>Guru</th><th class="text-right p-3">Aksi</th></tr>
                </thead>
                <tbody>
                @forelse($jadwals as $j)
                    <tr class="border-t">
                        <td class="p-3">{{ $j->kelas->nama_kelas }}</td>
                        <td>{{ $j->hari }}</td>
                        <td>{{ \Carbon\Carbon::parse($j->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($j->jam_selesai)->format('H:i') }}</td>
                        <td>{{ $j->mataPelajaran->nama_mapel }}</td>
                        <td>{{ $j->guru->nama }}</td>
                        <td class="p-3 text-right">
                            <form action="{{ route('admin.jadwal.destroy', $j) }}" method="POST" onsubmit="return confirm('Hapus jadwal ini?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="p-4 text-center text-gray-400">Belum ada jadwal pelajaran.</td></tr>
                @endforelse
                </tbody>
            </table>
            <div class="p-4">{{ $jadwals->links() }}</div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-5 h-fit">
        <h3 class="font-semibold mb-3">Tambah Jadwal</h3>
        <form method="POST" action="{{ route('admin.jadwal.store') }}" class="space-y-3">
            @csrf
            <div>
                <label class="text-sm text-gray-600">Kelas</label>
                <select name="kelas_id" class="w-full border rounded-lg px-3 py-2 mt-1" required>
                    <option value="">- Pilih Kelas -</option>
                    @foreach($kelasList as $k)<option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>@endforeach
                </select>
            </div>
            <div>
                <label class="text-sm text-gray-600">Mata Pelajaran</label>
                <select name="mata_pelajaran_id" class="w-full border rounded-lg px-3 py-2 mt-1" required>
                    <option value="">- Pilih Mapel -</option>
                    @foreach($mapels as $m)<option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>@endforeach
                </select>
            </div>
            <div>
                <label class="text-sm text-gray-600">Guru Pengajar</label>
                <select name="guru_id" class="w-full border rounded-lg px-3 py-2 mt-1" required>
                    <option value="">- Pilih Guru -</option>
                    @foreach($gurus as $g)<option value="{{ $g->id }}">{{ $g->nama }}</option>@endforeach
                </select>
            </div>
            <div>
                <label class="text-sm text-gray-600">Hari</label>
                <select name="hari" class="w-full border rounded-lg px-3 py-2 mt-1" required>
                    @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $h)
                        <option value="{{ $h }}">{{ $h }}</option>
                    @endforeach
                </select>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="text-sm text-gray-600">Jam Mulai</label><input type="time" name="jam_mulai" class="w-full border rounded-lg px-3 py-2 mt-1" required></div>
                <div><label class="text-sm text-gray-600">Jam Selesai</label><input type="time" name="jam_selesai" class="w-full border rounded-lg px-3 py-2 mt-1" required></div>
            </div>
            <button class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-emerald-700 w-full">Simpan</button>
        </form>
    </div>
</div>
@endsection
