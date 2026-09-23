<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['nama_kelas', 'tingkat', 'wali_kelas_id', 'tahun_ajaran_id'];

    public function waliKelas() { return $this->belongsTo(Guru::class, 'wali_kelas_id'); }
    public function tahunAjaran() { return $this->belongsTo(TahunAjaran::class); }
    public function siswas() { return $this->hasMany(Siswa::class); }
    public function jadwalPelajarans() { return $this->hasMany(JadwalPelajaran::class); }
}
