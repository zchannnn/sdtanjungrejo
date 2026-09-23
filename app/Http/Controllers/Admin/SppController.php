<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PembayaranSpp;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index(Request $request)
    {
        $query = PembayaranSpp::with('siswa');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('bulan')) {
            $query->where('bulan', $request->bulan);
        }

        $pembayarans = $query->orderByDesc('id')->paginate(15)->withQueryString();
        $siswaList = Siswa::where('status', 'Aktif')->orderBy('nama')->get();

        return view('admin.spp.index', compact('pembayarans', 'siswaList'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'bulan' => 'required|string|max:20',
            'tahun' => 'required|integer|min:2020|max:2100',
            'jumlah' => 'required|numeric|min:0',
        ]);

        $data['status'] = 'Belum Lunas';
        PembayaranSpp::create($data);

        return back()->with('success', 'Tagihan SPP berhasil dibuat.');
    }

    public function tandaiLunas(Request $request, PembayaranSpp $spp)
    {
        $spp->update([
            'status' => 'Lunas',
            'tanggal_bayar' => now(),
            'dicatat_oleh' => $request->user()->name,
        ]);

        return back()->with('success', 'Pembayaran SPP ditandai lunas.');
    }

    public function destroy(PembayaranSpp $spp)
    {
        $spp->delete();
        return back()->with('success', 'Tagihan SPP dihapus.');
    }
}
