<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rapor extends Model
{
    protected $table = 'rapors';
    protected $fillable = [
        'siswa_id', 'tahun_ajaran_id', 'catatan_wali_kelas',
        'jumlah_hadir', 'jumlah_izin', 'jumlah_sakit', 'jumlah_alpa',
    ];

    public function siswa() { return $this->belongsTo(Siswa::class); }
    public function tahunAjaran() { return $this->belongsTo(TahunAjaran::class); }
}
