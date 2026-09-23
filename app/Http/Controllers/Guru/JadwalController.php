<?php
namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $guru = $request->user()->guru;
        $jadwals = $guru?->jadwalPelajarans()->with(['kelas', 'mataPelajaran'])
            ->orderByRaw("FIELD(hari, 'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu')")
            ->orderBy('jam_mulai')->get();

        return view('guru.jadwal', compact('jadwals'));
    }
}
