<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranSpp extends Model
{
    protected $table = 'pembayaran_spps';
    protected $fillable = [
        'siswa_id', 'bulan', 'tahun', 'jumlah', 'status',
        'tanggal_bayar', 'bukti_bayar', 'dicatat_oleh',
    ];
    protected $casts = ['tanggal_bayar' => 'date'];

    public function siswa() { return $this->belongsTo(Siswa::class); }
}
