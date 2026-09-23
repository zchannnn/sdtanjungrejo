@extends('layouts.app')
@section('title', 'Pembayaran SPP')
@section('content')
<div class="bg-white rounded-xl shadow-sm overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-500 text-left"><tr><th class="p-3">Bulan</th><th>Jumlah</th><th>Status</th><th>Tanggal Bayar</th></tr></thead>
        <tbody>
        @forelse($pembayarans ?? [] as $p)
            <tr class="border-t">
                <td class="p-3">{{ $p->bulan }} {{ $p->tahun }}</td>
                <td>Rp{{ number_format($p->jumlah,0,',','.') }}</td>
                <td><span class="text-xs px-2 py-0.5 rounded-full {{ $p->status=='Lunas' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">{{ $p->status }}</span></td>
                <td>{{ $p->tanggal_bayar?->translatedFormat('d M Y') ?? '-' }}</td>
            </tr>
        @empty
            <tr><td colspan="4" class="p-4 text-center text-gray-400">Belum ada data pembayaran.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $pembayarans?->links() }}</div>
@endsection
