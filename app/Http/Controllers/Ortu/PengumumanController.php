<?php
namespace App\Http\Controllers\Ortu;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumumans = Pengumuman::with('penulis')->orderByDesc('id')->paginate(10);
        return view('ortu.pengumuman', compact('pengumumans'));
    }
}
