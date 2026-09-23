<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\PembayaranSpp;
use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::where('status', 'Aktif')->count();
        $totalGuru = Guru::count();
        $totalKelas = Kelas::count();
        $tunggakanSpp = PembayaranSpp::where('status', 'Belum Lunas')->count();

        return view('admin.dashboard', compact('totalSiswa', 'totalGuru', 'totalKelas', 'tunggakanSpp'));
    }
}
