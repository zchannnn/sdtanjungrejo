<?php
namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Pemetaan manual, tidak bergantung pada locale Laravel yang mungkin belum aktif
    private const NAMA_HARI = [
        0 => 'Minggu', 1 => 'Senin', 2 => 'Selasa', 3 => 'Rabu',
        4 => 'Kamis', 5 => 'Jumat', 6 => 'Sabtu',
    ];

    public function index(Request $request)
    {
        $guru = $request->user()->guru;
        $kelasWali = $guru?->kelasWali()->with('siswas')->get();
        $absensiHariIni = Absensi::where('guru_id', $guru?->id)->whereDate('tanggal', today())->count();

        $hariIni = self::NAMA_HARI[now()->dayOfWeek];
        $jadwalHariIni = $guru?->jadwalPelajarans()->with(['kelas', 'mataPelajaran'])
            ->where('hari', $hariIni)->get();

        return view('guru.dashboard', compact('guru', 'kelasWali', 'absensiHariIni', 'jadwalHariIni'));
    }
}
