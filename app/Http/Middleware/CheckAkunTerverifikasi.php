<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAkunTerverifikasi
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if ($user && !$user->is_verified) {
            // Admin sudah generate kode OTP -> minta user masukkan kodenya
            if ($user->otp_code) {
                return redirect()->route('akun.verifikasi-otp');
            }
            // Belum ada kode sama sekali -> masih menunggu admin proses
            return redirect()->route('akun.menunggu-verifikasi');
        }

        return $next($request);
    }
}
