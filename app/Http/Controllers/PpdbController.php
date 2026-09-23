<?php
namespace App\Http\Controllers;

use App\Models\PendaftaranPpdb;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    public function create()
    {
        return view('ppdb.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_calon_siswa' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'asal_sekolah' => 'nullable|string|max:100',
            'nama_ayah' => 'nullable|string|max:100',
            'nama_ibu' => 'nullable|string|max:100',
            'no_hp_ortu' => 'required|string|max:20',
            'email_ortu' => 'nullable|email|max:100',
            'alamat' => 'nullable|string|max:255',
            'kelas_dituju' => 'required|integer|min:1|max:6',
        ]);

        $pendaftaran = PendaftaranPpdb::create($data);

        return redirect()->route('ppdb.sukses', $pendaftaran)->with('success', 'Pendaftaran berhasil dikirim!');
    }

    public function sukses(PendaftaranPpdb $pendaftaran)
    {
        return view('ppdb.sukses', compact('pendaftaran'));
    }
}
