<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pendaftaran_ppdbs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_calon_siswa');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('asal_sekolah')->nullable(); // TK/RA asal
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('no_hp_ortu');
            $table->string('email_ortu')->nullable();
            $table->string('alamat')->nullable();
            $table->unsignedTinyInteger('kelas_dituju')->default(1);
            $table->enum('status', ['Menunggu', 'Diterima', 'Ditolak'])->default('Menunggu');
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('pendaftaran_ppdbs'); }
};
