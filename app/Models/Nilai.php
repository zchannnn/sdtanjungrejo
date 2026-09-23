<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilais';
    protected $fillable = ['siswa_id', 'mata_pelajaran_id', 'guru_id', 'tahun_ajaran_id', 'jenis', 'nilai'];

    public function siswa() { return $this->belongsTo(Siswa::class); }
    public function mataPelajaran() { return $this->belongsTo(MataPelajaran::class); }
    public function guru() { return $this->belongsTo(Guru::class); }
    public function tahunAjaran() { return $this->belongsTo(TahunAjaran::class); }
}
