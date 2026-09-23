<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\WhatsappService;

class VerifikasiAkunController extends Controller
{
    public function index()
    {
        $guruBelumVerifikasi = User::where('is_verified', false)
            ->whereHas('roles', fn($q) => $q->where('name', 'guru'))
            ->with('guru')->orderByDesc('id')->get();

        $ortuBelumVerifikasi = User::where('is_verified', false)
            ->whereHas('roles', fn($q) => $q->where('name', 'ortu'))
            ->with('siswa')->orderByDesc('id')->get();

        return view('admin.verifikasi.index', compact('guruBelumVerifikasi', 'ortuBelumVerifikasi'));
    }

    public function verifikasi(User $user, WhatsappService $whatsapp)
    {
        $kode = (string) random_int(100000, 999999);

        $user->update([
            'otp_code' => $kode,
            'otp_expires_at' => now()->addMinutes(30),
        ]);

        // Ambil nomor HP: dari data guru kalau role guru, dari data ortu-siswa kalau role ortu
        $nomor = $user->hasRole('guru')
            ? $user->guru?->no_hp
            : $user->siswa?->no_hp_ortu;

        $pesan = "Halo {$user->name},\n\nKode verifikasi akun *SD Tanjung Rejo* Anda:\n\n*{$kode}*\n\nBerlaku 30 menit. Jangan bagikan kode ini ke siapa pun.";

        $terkirim = $whatsapp->send($nomor, $pesan);

        if ($terkirim) {
            return back()->with('success', "Kode OTP berhasil dikirim otomatis ke WhatsApp {$user->name} ({$nomor}).");
        }

        return back()->with('success', "Kode OTP untuk {$user->name} ({$user->email}): {$kode} — berlaku 30 menit. Pengiriman WA otomatis gagal/belum diatur, sampaikan kode ini secara manual.");
    }

    public function tolak(User $user)
    {
        // Akun ditolak langsung dihapus supaya tidak menumpuk & datanya bisa didaftarkan ulang
        $user->delete();
        return back()->with('success', 'Akun berhasil ditolak & dihapus.');
    }
}
