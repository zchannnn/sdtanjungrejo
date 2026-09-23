<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftaranPpdb extends Model
{
    protected $table = 'pendaftaran_ppdbs';
    protected $fillable = [
        'nama_calon_siswa', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir',
        'asal_sekolah', 'nama_ayah', 'nama_ibu', 'no_hp_ortu', 'email_ortu',
        'alamat', 'kelas_dituju', 'status', 'catatan_admin',
    ];
    protected $casts = ['tanggal_lahir' => 'date'];
}
