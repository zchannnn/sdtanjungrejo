<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@sdtanjungrejo.sch.id'],
            ['name' => 'Admin SD Tanjung Rejo', 'password' => Hash::make('password')]
        );
        $admin->assignRole('admin');
    }
}
