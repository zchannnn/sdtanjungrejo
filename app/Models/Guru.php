<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'gurus';
    protected $fillable = ['user_id', 'id_guru', 'nama', 'jabatan', 'no_hp', 'alamat', 'foto'];

    public function user() { return $this->belongsTo(User::class); }
    public function kelasWali() { return $this->hasMany(Kelas::class, 'wali_kelas_id'); }
    public function jadwalPelajarans() { return $this->hasMany(JadwalPelajaran::class); }
    public function absensis() { return $this->hasMany(Absensi::class); }
    public function nilais() { return $this->hasMany(Nilai::class); }
}
