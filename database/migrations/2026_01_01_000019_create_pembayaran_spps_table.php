<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pembayaran_spps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->cascadeOnDelete();
            $table->string('bulan'); // contoh: Agustus
            $table->unsignedSmallInteger('tahun');
            $table->decimal('jumlah', 10, 2);
            $table->enum('status', ['Lunas', 'Belum Lunas'])->default('Belum Lunas');
            $table->date('tanggal_bayar')->nullable();
            $table->string('bukti_bayar')->nullable();
            $table->string('dicatat_oleh')->nullable(); // nama admin
            $table->timestamps();
            $table->unique(['siswa_id', 'bulan', 'tahun']);
        });
    }
    public function down(): void { Schema::dropIfExists('pembayaran_spps'); }
};
