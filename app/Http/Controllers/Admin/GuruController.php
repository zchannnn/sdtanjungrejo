<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::with('user')->orderBy('nama')->paginate(10);
        return view('admin.guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'nullable|string|max:100',
            'email' => 'required|email|unique:users,email',
            'id_guru' => 'nullable|string|max:30|unique:gurus,id_guru',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_verified' => false,
        ]);
        $user->assignRole('guru');

        Guru::create([
            'user_id' => $user->id,
            'id_guru' => $data['id_guru'] ?? null,
            'nama' => $data['nama'],
            'jabatan' => $data['jabatan'] ?? null,
            'no_hp' => $data['no_hp'] ?? null,
            'alamat' => $data['alamat'] ?? null,
        ]);

        return redirect()->route('admin.guru.index')->with('success', 'Akun guru berhasil dibuat.');
    }

    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'nullable|string|max:100',
            'id_guru' => 'nullable|string|max:30|unique:gurus,id_guru,' . $guru->id,
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
        ]);

        $guru->update($data);
        $guru->user()->update(['name' => $data['nama']]);

        return redirect()->route('admin.guru.index')->with('success', 'Data guru diperbarui.');
    }

    public function destroy(Guru $guru)
    {
        $guru->user()->delete(); // cascade hapus guru juga
        return back()->with('success', 'Akun guru dihapus.');
    }
}
