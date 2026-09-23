<?php
namespace App\Http\Controllers\Ortu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $anak = $request->user()->siswa()->with('kelas')->first();
        $jadwals = $anak?->kelas?->jadwalPelajarans()
            ->with(['mataPelajaran', 'guru'])
            ->orderByRaw("FIELD(hari, 'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu')")
            ->orderBy('jam_mulai')->get();

        return view('ortu.jadwal', compact('anak', 'jadwals'));
    }
}
