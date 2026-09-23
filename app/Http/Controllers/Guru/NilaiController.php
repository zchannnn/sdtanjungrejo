<?php
namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Nilai;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function form(Request $request, Kelas $kela)
    {
        $mapels = MataPelajaran::orderBy('nama_mapel')->get();
        $mapelId = $request->get('mata_pelajaran_id', $mapels->first()?->id);
        $jenis = $request->get('jenis', 'Tugas');
        $siswas = $kela->siswas()->where('status', 'Aktif')->orderBy('nama')->get();
        $tahunAjaran = TahunAjaran::aktifSaatIni();

        $nilaiSekarang = Nilai::where('mata_pelajaran_id', $mapelId)
            ->where('jenis', $jenis)
            ->where('tahun_ajaran_id', $tahunAjaran?->id)
            ->whereIn('siswa_id', $siswas->pluck('id'))
            ->pluck('nilai', 'siswa_id');

        return view('guru.nilai.form', compact('kela', 'mapels', 'mapelId', 'jenis', 'siswas', 'nilaiSekarang', 'tahunAjaran'));
    }

    public function simpan(Request $request, Kelas $kela)
    {
        $data = $request->validate([
            'mata_pelajaran_id' => 'required|exists:mata_pelajarans,id',
            'jenis' => 'required|in:Tugas,UTS,UAS',
            'nilai' => 'required|array',
            'nilai.*' => 'required|numeric|min:0|max:100',
        ]);

        $guru = $request->user()->guru;
        $tahunAjaran = TahunAjaran::aktifSaatIni();

        foreach ($data['nilai'] as $siswaId => $nilai) {
            Nilai::updateOrCreate(
                [
                    'siswa_id' => $siswaId,
                    'mata_pelajaran_id' => $data['mata_pelajaran_id'],
                    'jenis' => $data['jenis'],
                    'tahun_ajaran_id' => $tahunAjaran?->id,
                ],
                ['guru_id' => $guru->id, 'nilai' => $nilai]
            );
        }

        return back()->with('success', 'Nilai berhasil disimpan.');
    }
}
