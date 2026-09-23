<?php
namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Pengumuman;

class HomeController extends Controller
{
    public function index()
    {
        $gurus = Guru::orderByRaw("FIELD(jabatan, 'Kepala Sekolah', 'Wakil Kepala Sekolah') DESC")
            ->orderBy('nama')->get();

        // Kategori "Keuangan" sengaja tidak ditampilkan ke publik (info internal/sensitif)
        $pengumumans = Pengumuman::whereIn('kategori', ['Umum', 'Akademik', 'Kegiatan'])
            ->latest()->take(5)->get();

        return view('welcome', compact('gurus', 'pengumumans'));
    }
}
