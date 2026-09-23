<?php
namespace App\Http\Controllers\Ortu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $anak = $request->user()->siswa()->with('kelas')->first();
        $tunggakan = $anak?->pembayaranSpps()->where('status', 'Belum Lunas')->count() ?? 0;

        return view('ortu.dashboard', compact('anak', 'tunggakan'));
    }
}
