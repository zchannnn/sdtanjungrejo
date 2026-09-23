<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
            TahunAjaranSeeder::class,
            DemoDataSeeder::class, // hapus baris ini kalau tidak mau data contoh
        ]);
    }
}
