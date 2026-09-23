<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $fillable = ['nama', 'semester', 'aktif'];
    protected $casts = ['aktif' => 'boolean'];

    public function kelas() { return $this->hasMany(Kelas::class); }
    public function nilais() { return $this->hasMany(Nilai::class); }
    public function rapors() { return $this->hasMany(Rapor::class); }

    public static function aktifSaatIni()
    {
        return static::where('aktif', true)->first();
    }
}
