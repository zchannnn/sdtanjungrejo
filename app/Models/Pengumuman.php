<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumumans';
    protected $fillable = ['user_id', 'judul', 'isi', 'kategori', 'lampiran'];

    public function penulis() { return $this->belongsTo(User::class, 'user_id'); }
}
