<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsappService
{
    /**
     * Kirim pesan WhatsApp lewat Fonnte.
     * Return true kalau berhasil terkirim, false kalau gagal (nomor kosong, token salah, API error, dll).
     */
    public function send(?string $nomor, string $pesan): bool
    {
        $nomor = $this->formatNomor($nomor);
        $token = config('services.fonnte.token');

        if (!$nomor || !$token) {
            return false;
        }

        try {
            $response = Http::withHeaders(['Authorization' => $token])
                ->timeout(10)
                ->post('https://api.fonnte.com/send', [
                    'target' => $nomor,
                    'message' => $pesan,
                ]);

            return $response->successful() && $response->json('status') === true;
        } catch (\Throwable $e) {
            Log::warning('Gagal kirim WhatsApp: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Ubah nomor lokal (08xx) jadi format internasional (628xx) yang diminta Fonnte.
     */
    private function formatNomor(?string $nomor): ?string
    {
        if (!$nomor) {
            return null;
        }

        $nomor = preg_replace('/[^0-9]/', '', $nomor);

        if (str_starts_with($nomor, '0')) {
            $nomor = '62' . substr($nomor, 1);
        } elseif (!str_starts_with($nomor, '62')) {
            $nomor = '62' . $nomor;
        }

        return $nomor;
    }
}
