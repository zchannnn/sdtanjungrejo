<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with(['waliKelas', 'tahunAjaran'])->orderBy('tingkat')->paginate(10);
        return view('admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        $gurus = Guru::orderBy('nama')->get();
        $tahunAjarans = TahunAjaran::orderByDesc('id')->get();
        return view('admin.kelas.create', compact('gurus', 'tahunAjarans'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kelas' => 'required|string|max:10',
            'tingkat' => 'required|integer|min:1|max:6',
            'wali_kelas_id' => 'nullable|exists:gurus,id',
            'tahun_ajaran_id' => 'nullable|exists:tahun_ajarans,id',
        ]);

        Kelas::create($data);
        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function edit(Kelas $kela)
    {
        $gurus = Guru::orderBy('nama')->get();
        $tahunAjarans = TahunAjaran::orderByDesc('id')->get();
        return view('admin.kelas.edit', ['kelas' => $kela, 'gurus' => $gurus, 'tahunAjarans' => $tahunAjarans]);
    }

    public function update(Request $request, Kelas $kela)
    {
        $data = $request->validate([
            'nama_kelas' => 'required|string|max:10',
            'tingkat' => 'required|integer|min:1|max:6',
            'wali_kelas_id' => 'nullable|exists:gurus,id',
            'tahun_ajaran_id' => 'nullable|exists:tahun_ajarans,id',
        ]);

        $kela->update($data);
        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function destroy(Kelas $kela)
    {
        $kela->delete();
        return back()->with('success', 'Kelas dihapus.');
    }
}
