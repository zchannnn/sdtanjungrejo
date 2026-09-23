<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtpVerifikasiController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();

        // Kalau ternyata sudah terverifikasi (misal buka tab lama), langsung lempar ke dashboard
        if ($user->is_verified) {
            return redirect()->route('dashboard');
        }

        // Admin belum generate kode sama sekali -> tetap arahkan ke halaman menunggu
        if (!$user->otp_code) {
            return redirect()->route('akun.menunggu-verifikasi');
        }

        return view('akun.verifikasi-otp');
    }

    public function verify(Request $request)
    {
        $request->validate(['kode' => 'required|digits:6']);
        $user = $request->user();

        if (!$user->otp_code || !$user->otp_expires_at || $user->otp_expires_at->isPast()) {
            return back()->withErrors(['kode' => 'Kode OTP sudah kadaluarsa. Minta admin generate kode baru.']);
        }

        if ($request->kode !== $user->otp_code) {
            return back()->withErrors(['kode' => 'Kode OTP salah. Coba periksa kembali.']);
        }

        $user->update([
            'is_verified' => true,
            'verified_at' => now(),
            'otp_code' => null,
            'otp_expires_at' => null,
        ]);

        return redirect()->route('dashboard')->with('success', 'Akun berhasil diverifikasi! Selamat datang.');
    }
}
