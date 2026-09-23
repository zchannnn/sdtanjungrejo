<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pengumumans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete(); // penulis
            $table->string('judul');
            $table->text('isi');
            $table->enum('kategori', ['Umum', 'Akademik', 'Keuangan', 'Kegiatan'])->default('Umum');
            $table->string('lampiran')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('pengumumans'); }
};
