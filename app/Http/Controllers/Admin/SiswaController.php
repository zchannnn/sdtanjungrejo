<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::with('kelas')->orderBy('nama');

        if ($request->filled('kelas_id')) {
            $query->where('kelas_id', $request->kelas_id);
        }
        if ($request->filled('cari')) {
            $query->where('nama', 'like', '%' . $request->cari . '%');
        }

        $siswas = $query->paginate(10)->withQueryString();
        $kelasList = Kelas::orderBy('nama_kelas')->get();

        return view('admin.siswa.index', compact('siswas', 'kelasList'));
    }

    public function create()
    {
        $kelasList = Kelas::orderBy('nama_kelas')->get();
        return view('admin.siswa.create', compact('kelasList'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nisn' => 'nullable|string|max:20|unique:siswas,nisn',
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string|max:255',
            'nama_ortu' => 'nullable|string|max:100',
            'no_hp_ortu' => 'nullable|string|max:20',
            'kelas_id' => 'nullable|exists:kelas,id',
            'email_ortu' => 'nullable|email|unique:users,email',
            'password_ortu' => 'nullable|string|min:6',
        ]);

        if (!empty($data['email_ortu']) && !empty($data['password_ortu'])) {
            $userOrtu = User::create([
                'name' => $data['nama_ortu'] ?? $data['nama'] . ' (Ortu)',
                'email' => $data['email_ortu'],
                'password' => Hash::make($data['password_ortu']),
                'is_verified' => false,
            ]);
            $userOrtu->assignRole('ortu');
            $data['user_id'] = $userOrtu->id;
        }

        unset($data['email_ortu'], $data['password_ortu']);
        Siswa::create($data);

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit(Siswa $siswa)
    {
        $kelasList = Kelas::orderBy('nama_kelas')->get();
        return view('admin.siswa.edit', compact('siswa', 'kelasList'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $data = $request->validate([
            'nisn' => 'nullable|string|max:20|unique:siswas,nisn,' . $siswa->id,
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string|max:255',
            'nama_ortu' => 'nullable|string|max:100',
            'no_hp_ortu' => 'nullable|string|max:20',
            'kelas_id' => 'nullable|exists:kelas,id',
            'status' => 'required|in:Aktif,Pindah,Lulus',
            'email_ortu' => 'nullable|email|unique:users,email',
            'password_ortu' => 'nullable|string|min:6',
        ]);

        // Kalau siswa belum punya akun ortu, dan admin isi email+password, buatkan sekarang
        if (!$siswa->user_id && !empty($data['email_ortu']) && !empty($data['password_ortu'])) {
            $userOrtu = User::create([
                'name' => $data['nama_ortu'] ?? $data['nama'] . ' (Ortu)',
                'email' => $data['email_ortu'],
                'password' => Hash::make($data['password_ortu']),
                'is_verified' => false,
            ]);
            $userOrtu->assignRole('ortu');
            $data['user_id'] = $userOrtu->id;
        }

        unset($data['email_ortu'], $data['password_ortu']);
        $siswa->update($data);
        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa diperbarui.');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return back()->with('success', 'Data siswa dihapus.');
    }
}
