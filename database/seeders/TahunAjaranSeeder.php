<?php
namespace Database\Seeders;

use App\Models\TahunAjaran;
use Illuminate\Database\Seeder;

class TahunAjaranSeeder extends Seeder
{
    public function run(): void
    {
        TahunAjaran::firstOrCreate(
            ['nama' => '2025/2026', 'semester' => 'Ganjil'],
            ['aktif' => true]
        );
    }
}
