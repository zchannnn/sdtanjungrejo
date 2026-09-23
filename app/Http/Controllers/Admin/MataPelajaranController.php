<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    public function index()
    {
        $mapels = MataPelajaran::orderBy('nama_mapel')->paginate(10);
        return view('admin.mapel.index', compact('mapels'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode' => 'required|string|max:10|unique:mata_pelajarans,kode',
            'nama_mapel' => 'required|string|max:100',
        ]);

        MataPelajaran::create($data);
        return back()->with('success', 'Mata pelajaran ditambahkan.');
    }

    public function update(Request $request, MataPelajaran $mapel)
    {
        $data = $request->validate([
            'kode' => 'required|string|max:10|unique:mata_pelajarans,kode,' . $mapel->id,
            'nama_mapel' => 'required|string|max:100',
        ]);

        $mapel->update($data);
        return back()->with('success', 'Mata pelajaran diperbarui.');
    }

    public function destroy(MataPelajaran $mapel)
    {
        $mapel->delete();
        return back()->with('success', 'Mata pelajaran dihapus.');
    }
}
