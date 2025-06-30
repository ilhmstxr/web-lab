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
        Schema::create('komunitas', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama komunitas 
            //$table->string('slug')->unique();
            $table->string('tagline')->nullable(); // Tagline
            $table->string('logo')->nullable(); // Path untuk file logo 
            $table->text('about'); // Deskripsi tentang kami
            //$table->string('join_link')->nullable(); // URL untuk tombol gabung
            $table->timestamps(); // Otomatis membuat created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komunitas');
    }
};
