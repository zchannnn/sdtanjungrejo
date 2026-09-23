<?php
namespace App\Http\Controllers\Ortu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $anak = $request->user()->siswa;
        $absensis = $anak?->absensis()->orderByDesc('tanggal')->paginate(20);

        return view('ortu.absensi', compact('anak', 'absensis'));
    }
}
