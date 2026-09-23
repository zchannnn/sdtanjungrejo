<?php
namespace App\Http\Controllers\Ortu;

use App\Http\Controllers\Controller;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index(Request $request)
    {
        $anak = $request->user()->siswa;
        $tahunAjaran = TahunAjaran::aktifSaatIni();
        $nilais = $anak?->nilais()
            ->with('mataPelajaran')
            ->where('tahun_ajaran_id', $tahunAjaran?->id)
            ->get()
            ->groupBy('mataPelajaran.nama_mapel');

        return view('ortu.nilai', compact('anak', 'nilais', 'tahunAjaran'));
    }
}
