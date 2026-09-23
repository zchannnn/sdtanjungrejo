<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    public function index()
    {
        $tahunAjarans = TahunAjaran::orderByDesc('id')->paginate(10);
        return view('admin.tahunajaran.index', compact('tahunAjarans'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:20',
            'semester' => 'required|in:Ganjil,Genap',
        ]);

        if ($request->has('aktif')) {
            TahunAjaran::query()->update(['aktif' => false]);
            $data['aktif'] = true;
        }

        TahunAjaran::create($data);
        return back()->with('success', 'Tahun ajaran berhasil ditambahkan.');
    }

    public function aktifkan(TahunAjaran $tahunAjaran)
    {
        TahunAjaran::query()->update(['aktif' => false]);
        $tahunAjaran->update(['aktif' => true]);
        return back()->with('success', 'Tahun ajaran aktif diperbarui.');
    }

    public function destroy(TahunAjaran $tahunAjaran)
    {
        $tahunAjaran->delete();
        return back()->with('success', 'Tahun ajaran dihapus.');
    }
}
