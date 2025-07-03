<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('publishers', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // google scholar blablbalba
            $table->unsignedBigInteger('dosen_id'); // cahyo
            $table->foreign('dosen_id')->references('id')->on('dosens')->onUpdate('cascade')->onDelete('cascade');
            $table->string('tanggalDaftar'); // tanggal daftar google scholar
            $table->string('link'); // link google scholar
            $table->string('status')->default('active'); // 'active', 'inactive', 'banned'
            $table->string('description')->nullable(); // deskripsi singkat tentang publisher
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publishers');
    }
};
