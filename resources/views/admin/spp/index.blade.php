@extends('layouts.app')
@section('title', 'Pembayaran SPP')
@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-4">
        <form method="GET" class="flex gap-2">
            <select name="status" class="border rounded-lg px-3 py-2 text-sm">
                <option value="">Semua Status</option>
                <option value="Lunas" @selected(request('status')=='Lunas')>Lunas</option>
                <option value="Belum Lunas" @selected(request('status')=='Belum Lunas')>Belum Lunas</option>
            </select>
            <input type="text" name="bulan" value="{{ request('bulan') }}" placeholder="Filter bulan..." class="border rounded-lg px-3 py-2 text-sm">
            <button class="bg-gray-200 px-3 py-2 rounded-lg text-sm">Filter</button>
        </form>

        <div class="bg-white rounded-xl shadow-sm overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-500 text-left"><tr><th class="p-3">Siswa</th><th>Bulan</th><th>Jumlah</th><th>Status</th><th class="text-right p-3">Aksi</th></tr></thead>
                <tbody>
                @forelse($pembayarans as $p)
                    <tr class="border-t">
                        <td class="p-3">{{ $p->siswa->nama }}</td>
                        <td>{{ $p->bulan }} {{ $p->tahun }}</td>
                        <td>Rp{{ number_format($p->jumlah,0,',','.') }}</td>
                        <td>
                            <span class="text-xs px-2 py-0.5 rounded-full {{ $p->status=='Lunas' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">{{ $p->status }}</span>
                        </td>
                        <td class="p-3 text-right space-x-2">
                            @if($p->status != 'Lunas')
                                <form action="{{ route('admin.spp.lunas', $p) }}" method="POST" class="inline">
                                    @csrf @method('PATCH')
                                    <button class="text-emerald-700 hover:underline">Tandai Lunas</button>
                                </form>
                            @endif
                            <form action="{{ route('admin.spp.destroy', $p) }}" method="POST" class="inline" onsubmit="return confirm('Hapus tagihan ini?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="p-4 text-center text-gray-400">Belum ada data.</td></tr>
                @endforelse
                </tbody>
            </table>
            <div class="p-4">{{ $pembayarans->links() }}</div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-5 h-fit">
        <h3 class="font-semibold mb-3">Buat Tagihan SPP</h3>
        <form method="POST" action="{{ route('admin.spp.store') }}" class="space-y-3">
            @csrf
            <div>
                <label class="text-sm text-gray-600">Siswa</label>
                <select name="siswa_id" class="w-full border rounded-lg px-3 py-2 mt-1" required>
                    @foreach($siswaList as $s)<option value="{{ $s->id }}">{{ $s->nama }}</option>@endforeach
                </select>
            </div>
            <div><label class="text-sm text-gray-600">Bulan</label><input name="bulan" placeholder="contoh: Agustus" class="w-full border rounded-lg px-3 py-2 mt-1" required></div>
            <div><label class="text-sm text-gray-600">Tahun</label><input type="number" name="tahun" value="{{ date('Y') }}" class="w-full border rounded-lg px-3 py-2 mt-1" required></div>
            <div><label class="text-sm text-gray-600">Jumlah (Rp)</label><input type="number" name="jumlah" class="w-full border rounded-lg px-3 py-2 mt-1" required></div>
            <button class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-emerald-700 w-full">Buat Tagihan</button>
        </form>
    </div>
</div>
@endsection
