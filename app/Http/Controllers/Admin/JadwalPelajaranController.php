<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\JadwalPelajaran;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class JadwalPelajaranController extends Controller
{
    public function index(Request $request)
    {
        $query = JadwalPelajaran::with(['kelas', 'mataPelajaran', 'guru']);

        if ($request->filled('kelas_id')) {
            $query->where('kelas_id', $request->kelas_id);
        }

        $jadwals = $query->orderByRaw("FIELD(hari, 'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu')")
            ->orderBy('jam_mulai')->paginate(20)->withQueryString();

        $kelasList = Kelas::orderBy('nama_kelas')->get();
        $mapels = MataPelajaran::orderBy('nama_mapel')->get();
        $gurus = Guru::orderBy('nama')->get();

        return view('admin.jadwal.index', compact('jadwals', 'kelasList', 'mapels', 'gurus'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajarans,id',
            'guru_id' => 'required|exists:gurus,id',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
        ]);

        JadwalPelajaran::create($data);
        return back()->with('success', 'Jadwal pelajaran berhasil ditambahkan.');
    }

    public function destroy(JadwalPelajaran $jadwal)
    {
        $jadwal->delete();
        return back()->with('success', 'Jadwal pelajaran dihapus.');
    }
}
