<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajarans';
    protected $fillable = ['kode', 'nama_mapel'];

    public function jadwalPelajarans() { return $this->hasMany(JadwalPelajaran::class); }
    public function nilais() { return $this->hasMany(Nilai::class); }
}
