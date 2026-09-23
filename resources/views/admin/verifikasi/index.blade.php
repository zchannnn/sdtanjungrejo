@extends('layouts.app')
@section('title', 'Verifikasi Akun')
@section('content')

<h3 class="font-semibold mb-3">Akun Guru Menunggu Verifikasi</h3>
<div class="bg-white rounded-xl shadow-sm overflow-x-auto mb-8">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-500 text-left"><tr><th class="p-3">Nama</th><th>Email</th><th>Status</th><th class="text-right p-3">Aksi</th></tr></thead>
        <tbody>
        @forelse($guruBelumVerifikasi as $u)
            <tr class="border-t">
                <td class="p-3">{{ $u->guru->nama ?? $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>
                    @if($u->otp_code && $u->otp_expires_at && $u->otp_expires_at->isFuture())
                        <span class="text-xs px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full">Menunggu kode dimasukkan</span>
                        <span class="text-xs text-gray-400 block mt-0.5">berlaku sampai {{ $u->otp_expires_at->format('H:i') }}</span>
                    @else
                        <span class="text-xs px-2 py-0.5 bg-yellow-100 text-yellow-700 rounded-full">Belum diproses</span>
                    @endif
                </td>
                <td class="p-3 text-right space-x-2">
                    <form action="{{ route('admin.verifikasi.verifikasi', $u) }}" method="POST" class="inline">
                        @csrf @method('PATCH')
                        <button class="text-emerald-700 hover:underline">{{ $u->otp_code ? 'Kirim Ulang Kode' : 'Kirim Kode OTP' }}</button>
                    </form>
                    <form action="{{ route('admin.verifikasi.tolak', $u) }}" method="POST" class="inline" onsubmit="return confirm('Tolak & hapus akun ini?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Tolak</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4" class="p-4 text-center text-gray-400">Tidak ada akun guru yang menunggu verifikasi.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>

<h3 class="font-semibold mb-3">Akun Orang Tua Menunggu Verifikasi</h3>
<div class="bg-white rounded-xl shadow-sm overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-500 text-left"><tr><th class="p-3">Nama Akun</th><th>Email</th><th>Anak</th><th>Status</th><th class="text-right p-3">Aksi</th></tr></thead>
        <tbody>
        @forelse($ortuBelumVerifikasi as $u)
            <tr class="border-t">
                <td class="p-3">{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->siswa->nama ?? '-' }}</td>
                <td>
                    @if($u->otp_code && $u->otp_expires_at && $u->otp_expires_at->isFuture())
                        <span class="text-xs px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full">Menunggu kode dimasukkan</span>
                        <span class="text-xs text-gray-400 block mt-0.5">berlaku sampai {{ $u->otp_expires_at->format('H:i') }}</span>
                    @else
                        <span class="text-xs px-2 py-0.5 bg-yellow-100 text-yellow-700 rounded-full">Belum diproses</span>
                    @endif
                </td>
                <td class="p-3 text-right space-x-2">
                    <form action="{{ route('admin.verifikasi.verifikasi', $u) }}" method="POST" class="inline">
                        @csrf @method('PATCH')
                        <button class="text-emerald-700 hover:underline">{{ $u->otp_code ? 'Kirim Ulang Kode' : 'Kirim Kode OTP' }}</button>
                    </form>
                    <form action="{{ route('admin.verifikasi.tolak', $u) }}" method="POST" class="inline" onsubmit="return confirm('Tolak & hapus akun ini? Data siswa tetap ada, hanya akun login-nya yang dihapus.')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Tolak</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5" class="p-4 text-center text-gray-400">Tidak ada akun orang tua yang menunggu verifikasi.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
