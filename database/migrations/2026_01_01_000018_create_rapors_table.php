<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rapors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->cascadeOnDelete();
            $table->foreignId('tahun_ajaran_id')->constrained('tahun_ajarans')->cascadeOnDelete();
            $table->text('catatan_wali_kelas')->nullable();
            $table->unsignedTinyInteger('jumlah_hadir')->default(0);
            $table->unsignedTinyInteger('jumlah_izin')->default(0);
            $table->unsignedTinyInteger('jumlah_sakit')->default(0);
            $table->unsignedTinyInteger('jumlah_alpa')->default(0);
            $table->timestamps();
            $table->unique(['siswa_id', 'tahun_ajaran_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('rapors'); }
};
