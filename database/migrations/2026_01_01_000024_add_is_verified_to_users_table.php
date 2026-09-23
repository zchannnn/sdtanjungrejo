<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // default true supaya akun yang sudah ada (termasuk admin) tidak ikut terkunci
            $table->boolean('is_verified')->default(true)->after('no_hp');
            $table->timestamp('verified_at')->nullable()->after('is_verified');
        });
    }
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_verified', 'verified_at']);
        });
    }
};
