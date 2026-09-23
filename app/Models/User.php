<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = ['name', 'email', 'password', 'no_hp', 'is_verified', 'verified_at', 'otp_code', 'otp_expires_at'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime', 'otp_expires_at' => 'datetime', 'password' => 'hashed'];

    public function guru()
    {
        return $this->hasOne(Guru::class);
    }

    public function siswa()
    {
        // relasi ke anak (untuk akun ortu)
        return $this->hasOne(Siswa::class);
    }

    public function pengumumans()
    {
        return $this->hasMany(Pengumuman::class);
    }
}
