<?php
namespace Database\Seeders;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        $tahunAjaran = TahunAjaran::first();

        // 1 guru contoh
        $userGuru = User::firstOrCreate(
            ['email' => 'guru1@sdtanjungrejo.sch.id'],
            ['name' => 'Siti Aminah', 'password' => Hash::make('password')]
        );
        $userGuru->assignRole('guru');
        $guru = Guru::firstOrCreate(
            ['user_id' => $userGuru->id],
            ['id_guru' => 'GR-0001', 'nama' => 'Siti Aminah', 'no_hp' => '081234567890']
        );

        // 1 kelas contoh
        $kelas = Kelas::firstOrCreate(
            ['nama_kelas' => '1A'],
            ['tingkat' => 1, 'wali_kelas_id' => $guru->id, 'tahun_ajaran_id' => $tahunAjaran?->id]
        );

        // beberapa mapel dasar
        foreach ([
            ['kode' => 'MTK', 'nama_mapel' => 'Matematika'],
            ['kode' => 'BIN', 'nama_mapel' => 'Bahasa Indonesia'],
            ['kode' => 'IPA', 'nama_mapel' => 'Ilmu Pengetahuan Alam'],
            ['kode' => 'PKN', 'nama_mapel' => 'Pendidikan Kewarganegaraan'],
        ] as $mapel) {
            MataPelajaran::firstOrCreate(['kode' => $mapel['kode']], $mapel);
        }

        // 1 siswa contoh dengan akun ortu
        $userOrtu = User::firstOrCreate(
            ['email' => 'ortu1@example.com'],
            ['name' => 'Budi Santoso', 'password' => Hash::make('password')]
        );
        $userOrtu->assignRole('ortu');

        Siswa::firstOrCreate(
            ['nisn' => '0012345678'],
            [
                'user_id' => $userOrtu->id,
                'nama' => 'Ahmad Fauzi',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Medan',
                'tanggal_lahir' => '2018-05-10',
                'alamat' => 'Jl. Tanjung Rejo No. 10',
                'nama_ortu' => 'Budi Santoso',
                'no_hp_ortu' => '081298765432',
                'kelas_id' => $kelas->id,
                'status' => 'Aktif',
            ]
        );
    }
}
