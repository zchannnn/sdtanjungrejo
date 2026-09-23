<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PendaftaranPpdb;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    public function index(Request $request)
    {
        $query = PendaftaranPpdb::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $pendaftars = $query->orderByDesc('id')->paginate(15)->withQueryString();
        $jumlahMenunggu = PendaftaranPpdb::where('status', 'Menunggu')->count();

        return view('admin.ppdb.index', compact('pendaftars', 'jumlahMenunggu'));
    }

    public function terima(PendaftaranPpdb $ppdb)
    {
        // Buat data siswa aktif dari pendaftar. Kelas & NISN dilengkapi admin belakangan.
        Siswa::create([
            'nama' => $ppdb->nama_calon_siswa,
            'jenis_kelamin' => $ppdb->jenis_kelamin,
            'tempat_lahir' => $ppdb->tempat_lahir,
            'tanggal_lahir' => $ppdb->tanggal_lahir,
            'alamat' => $ppdb->alamat,
            'nama_ortu' => $ppdb->nama_ayah ?? $ppdb->nama_ibu,
            'no_hp_ortu' => $ppdb->no_hp_ortu,
            'status' => 'Aktif',
        ]);

        $ppdb->update(['status' => 'Diterima']);

        return back()->with('success', $ppdb->nama_calon_siswa . ' diterima & otomatis masuk ke Data Siswa. Lengkapi kelas & NISN-nya di menu Data Siswa.');
    }

    public function tolak(Request $request, PendaftaranPpdb $ppdb)
    {
        $data = $request->validate(['catatan_admin' => 'nullable|string|max:255']);
        $ppdb->update(['status' => 'Ditolak', 'catatan_admin' => $data['catatan_admin'] ?? null]);

        return back()->with('success', 'Pendaftaran ' . $ppdb->nama_calon_siswa . ' ditolak.');
    }

    public function destroy(PendaftaranPpdb $ppdb)
    {
        $ppdb->delete();
        return back()->with('success', 'Data pendaftar dihapus.');
    }
}
