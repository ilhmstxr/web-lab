<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('sops', function (Blueprint $table) {
            // Tambahkan kolom 'lab_type' setelah 'description'
            $table->string('lab_type')->after('description')->nullable();
        });
    }
    public function down(): void
    {
        Schema::table('sops', function (Blueprint $table) {
            $table->dropColumn('lab_type');
        });
    }
};