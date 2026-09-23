<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $fillable = [
        'user_id', 'nisn', 'nama', 'jenis_kelamin', 'tempat_lahir',
        'tanggal_lahir', 'alamat', 'nama_ortu', 'no_hp_ortu', 'foto', 'kelas_id', 'status',
    ];
    protected $casts = ['tanggal_lahir' => 'date'];

    public function user() { return $this->belongsTo(User::class); } // akun ortu
    public function kelas() { return $this->belongsTo(Kelas::class); }
    public function absensis() { return $this->hasMany(Absensi::class); }
    public function nilais() { return $this->hasMany(Nilai::class); }
    public function rapors() { return $this->hasMany(Rapor::class); }
    public function pembayaranSpps() { return $this->hasMany(PembayaranSpp::class); }
}
