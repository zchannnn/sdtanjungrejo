<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\JadwalPelajaranController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\MataPelajaranController;
use App\Http\Controllers\Admin\PengumumanController as AdminPengumumanController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\SppController;
use App\Http\Controllers\Admin\TahunAjaranController;
use App\Http\Controllers\Admin\VerifikasiAkunController;
use App\Http\Controllers\Guru\AbsensiController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Guru\JadwalController as GuruJadwalController;
use App\Http\Controllers\Guru\NilaiController;
use App\Http\Controllers\Guru\PengumumanController as GuruPengumumanController;
use App\Http\Controllers\Ortu\DashboardController as OrtuDashboardController;
use App\Http\Controllers\Ortu\JadwalController as OrtuJadwalController;
use App\Http\Controllers\Ortu\PengumumanController as OrtuPengumumanController;
use App\Http\Controllers\Ortu\SppController as OrtuSppController;
use App\Http\Controllers\Ortu\AbsensiController as OrtuAbsensiController;
use App\Http\Controllers\Ortu\NilaiController as OrtuNilaiController;
use App\Http\Controllers\Admin\PpdbController as AdminPpdbController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OtpVerifikasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\RaporController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/ppdb', [PpdbController::class, 'create'])->name('ppdb.create');
Route::post('/ppdb', [PpdbController::class, 'store'])->name('ppdb.store');
Route::get('/ppdb/sukses/{pendaftaran}', [PpdbController::class, 'sukses'])->name('ppdb.sukses');

// Redirect setelah login sesuai role
Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->hasRole('admin')) return redirect()->route('admin.dashboard');
    if ($user->hasRole('guru')) return redirect()->route('guru.dashboard');
    if ($user->hasRole('ortu')) return redirect()->route('ortu.dashboard');
    return redirect()->route('login');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/rapor/{siswa}/cetak', [RaporController::class, 'cetak'])->name('rapor.cetak');

    Route::get('/akun/menunggu-verifikasi', function () {
        return view('akun.menunggu-verifikasi');
    })->name('akun.menunggu-verifikasi');

    Route::get('/akun/verifikasi-otp', [OtpVerifikasiController::class, 'show'])->name('akun.verifikasi-otp');
    Route::post('/akun/verifikasi-otp', [OtpVerifikasiController::class, 'verify'])->name('akun.verifikasi-otp.submit');
});

/* =========================
   ADMIN
========================= */
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/tahun-ajaran', [TahunAjaranController::class, 'index'])->name('tahunajaran.index');
    Route::post('/tahun-ajaran', [TahunAjaranController::class, 'store'])->name('tahunajaran.store');
    Route::patch('/tahun-ajaran/{tahunAjaran}/aktifkan', [TahunAjaranController::class, 'aktifkan'])->name('tahunajaran.aktifkan');
    Route::delete('/tahun-ajaran/{tahunAjaran}', [TahunAjaranController::class, 'destroy'])->name('tahunajaran.destroy');

    Route::resource('kelas', KelasController::class)->except(['show']);
    Route::resource('mapel', MataPelajaranController::class)->parameters(['mapel' => 'mapel'])->except(['show', 'create', 'edit']);
    Route::resource('guru', GuruController::class)->except(['show']);
    Route::resource('siswa', SiswaController::class)->except(['show']);

    Route::get('/jadwal', [JadwalPelajaranController::class, 'index'])->name('jadwal.index');
    Route::post('/jadwal', [JadwalPelajaranController::class, 'store'])->name('jadwal.store');
    Route::delete('/jadwal/{jadwal}', [JadwalPelajaranController::class, 'destroy'])->name('jadwal.destroy');

    Route::get('/spp', [SppController::class, 'index'])->name('spp.index');
    Route::post('/spp', [SppController::class, 'store'])->name('spp.store');
    Route::patch('/spp/{spp}/lunas', [SppController::class, 'tandaiLunas'])->name('spp.lunas');
    Route::delete('/spp/{spp}', [SppController::class, 'destroy'])->name('spp.destroy');

    Route::get('/pengumuman', [AdminPengumumanController::class, 'index'])->name('pengumuman.index');
    Route::post('/pengumuman', [AdminPengumumanController::class, 'store'])->name('pengumuman.store');
    Route::delete('/pengumuman/{pengumuman}', [AdminPengumumanController::class, 'destroy'])->name('pengumuman.destroy');

    Route::get('/ppdb', [AdminPpdbController::class, 'index'])->name('ppdb.index');
    Route::patch('/ppdb/{ppdb}/terima', [AdminPpdbController::class, 'terima'])->name('ppdb.terima');
    Route::patch('/ppdb/{ppdb}/tolak', [AdminPpdbController::class, 'tolak'])->name('ppdb.tolak');
    Route::delete('/ppdb/{ppdb}', [AdminPpdbController::class, 'destroy'])->name('ppdb.destroy');

    Route::get('/verifikasi', [VerifikasiAkunController::class, 'index'])->name('verifikasi.index');
    Route::patch('/verifikasi/{user}', [VerifikasiAkunController::class, 'verifikasi'])->name('verifikasi.verifikasi');
    Route::delete('/verifikasi/{user}', [VerifikasiAkunController::class, 'tolak'])->name('verifikasi.tolak');
});

/* =========================
   GURU
========================= */
Route::middleware(['auth', 'role:guru', 'akun.terverifikasi'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/dashboard', [GuruDashboardController::class, 'index'])->name('dashboard');
    Route::get('/jadwal', [GuruJadwalController::class, 'index'])->name('jadwal.index');

    Route::get('/absensi/{kela}', [AbsensiController::class, 'form'])->name('absensi.form');
    Route::post('/absensi/{kela}', [AbsensiController::class, 'simpan'])->name('absensi.simpan');

    Route::get('/nilai/{kela}', [NilaiController::class, 'form'])->name('nilai.form');
    Route::post('/nilai/{kela}', [NilaiController::class, 'simpan'])->name('nilai.simpan');

    Route::get('/pengumuman', [GuruPengumumanController::class, 'index'])->name('pengumuman.index');
    Route::post('/pengumuman', [GuruPengumumanController::class, 'store'])->name('pengumuman.store');
});

/* =========================
   ORANG TUA
========================= */
Route::middleware(['auth', 'role:ortu', 'akun.terverifikasi'])->prefix('ortu')->name('ortu.')->group(function () {
    Route::get('/dashboard', [OrtuDashboardController::class, 'index'])->name('dashboard');
    Route::get('/absensi', [OrtuAbsensiController::class, 'index'])->name('absensi.index');
    Route::get('/nilai', [OrtuNilaiController::class, 'index'])->name('nilai.index');
    Route::get('/jadwal', [OrtuJadwalController::class, 'index'])->name('jadwal.index');
    Route::get('/spp', [OrtuSppController::class, 'index'])->name('spp.index');
    Route::get('/pengumuman', [OrtuPengumumanController::class, 'index'])->name('pengumuman.index');
});

require __DIR__.'/auth.php';
