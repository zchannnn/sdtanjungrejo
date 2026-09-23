<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete(); // akun ortu
            $table->string('nisn')->unique()->nullable();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nama_ortu')->nullable();
            $table->string('no_hp_ortu')->nullable();
            $table->string('foto')->nullable();
            $table->foreignId('kelas_id')->nullable()->constrained('kelas')->nullOnDelete();
            $table->enum('status', ['Aktif', 'Pindah', 'Lulus'])->default('Aktif');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('siswas'); }
};
