<?php
namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumumans = Pengumuman::with('penulis')->orderByDesc('id')->paginate(10);
        return view('guru.pengumuman.index', compact('pengumumans'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:150',
            'isi' => 'required|string',
            'kategori' => 'required|in:Umum,Akademik,Keuangan,Kegiatan',
        ]);

        $data['user_id'] = $request->user()->id;
        Pengumuman::create($data);

        return back()->with('success', 'Pengumuman berhasil diterbitkan.');
    }
}
