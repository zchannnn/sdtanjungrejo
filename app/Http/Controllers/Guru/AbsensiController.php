<?php
namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Kelas;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function form(Request $request, Kelas $kela)
    {
        $tanggal = $request->get('tanggal', today()->toDateString());
        $siswas = $kela->siswas()->where('status', 'Aktif')->orderBy('nama')->get();
        $absensiHariIni = Absensi::where('kelas_id', $kela->id)
            ->whereDate('tanggal', $tanggal)
            ->pluck('status', 'siswa_id');

        return view('guru.absensi.form', ['kelas' => $kela, 'siswas' => $siswas, 'tanggal' => $tanggal, 'absensiHariIni' => $absensiHariIni]);
    }

    public function simpan(Request $request, Kelas $kela)
    {
        $data = $request->validate([
            'tanggal' => 'required|date',
            'status' => 'required|array',
            'status.*' => 'required|in:Hadir,Izin,Sakit,Alpa',
        ]);

        $guru = $request->user()->guru;

        foreach ($data['status'] as $siswaId => $status) {
            Absensi::updateOrCreate(
                ['siswa_id' => $siswaId, 'tanggal' => $data['tanggal']],
                ['kelas_id' => $kela->id, 'guru_id' => $guru->id, 'status' => $status]
            );
        }

        return back()->with('success', 'Absensi tanggal ' . $data['tanggal'] . ' berhasil disimpan.');
    }
}
