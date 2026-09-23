<?php
namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class RaporController extends Controller
{
    // Akses: Ortu (hanya rapor anaknya) & Admin/Guru (rapor siapa saja)
    public function cetak(Request $request, Siswa $siswa)
    {
        $user = $request->user();

        if ($user->hasRole('ortu') && $user->siswa?->id !== $siswa->id) {
            abort(403, 'Anda tidak berhak mengakses rapor siswa ini.');
        }

        $tahunAjaran = TahunAjaran::aktifSaatIni();

        $nilais = Nilai::where('siswa_id', $siswa->id)
            ->where('tahun_ajaran_id', $tahunAjaran?->id)
            ->with('mataPelajaran')
            ->get()
            ->groupBy('mataPelajaran.nama_mapel');

        $rekapAbsensi = [
            'Hadir' => Absensi::where('siswa_id', $siswa->id)->where('status', 'Hadir')->count(),
            'Izin' => Absensi::where('siswa_id', $siswa->id)->where('status', 'Izin')->count(),
            'Sakit' => Absensi::where('siswa_id', $siswa->id)->where('status', 'Sakit')->count(),
            'Alpa' => Absensi::where('siswa_id', $siswa->id)->where('status', 'Alpa')->count(),
        ];

        $pdf = Pdf::loadView('rapor.pdf', [
            'siswa' => $siswa,
            'tahunAjaran' => $tahunAjaran,
            'nilais' => $nilais,
            'rekapAbsensi' => $rekapAbsensi,
        ]);

        return $pdf->download('Rapor-' . $siswa->nama . '.pdf');
    }
}
