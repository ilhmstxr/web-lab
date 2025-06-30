<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('kegiatans', function (Blueprint $table) {
            // Menambahkan kolom youtube_url.
            // Gunakan nullable() agar kolom ini tidak wajib diisi.
            // Gunakan after('tempat') untuk menempatkannya setelah kolom 'tempat'
            $table->string('youtube_url')->nullable()->after('tempat');
        });
    }

    public function down(): void
    {
        Schema::table('kegiatans', function (Blueprint $table) {
            // Saat rollback, kolom youtube_url akan dihapus
            $table->dropColumn('youtube_url');
        });
    }
};