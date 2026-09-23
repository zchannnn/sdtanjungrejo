<?php
namespace App\Http\Controllers\Ortu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index(Request $request)
    {
        $anak = $request->user()->siswa;
        $pembayarans = $anak?->pembayaranSpps()->orderByDesc('tahun')->orderByDesc('id')->paginate(15);

        return view('ortu.spp', compact('anak', 'pembayarans'));
    }
}
