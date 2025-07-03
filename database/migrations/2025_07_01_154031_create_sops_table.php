<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('sops', function (Blueprint $table) {
            // Tambahkan kolom 'lab_type' setelah 'description'
            // $table->id();
            // $table->text('description')->change(); // Pastikan 'description' adalah longText
            $table->string('lab_type')->after('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sops', function (Blueprint $table) {
            $table->dropColumn('lab_type');
        });
    }
};