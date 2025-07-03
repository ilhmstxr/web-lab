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
        Schema::create('portofolio_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portofolio_id')->references('id')->on('portofolios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tag_id')->references('id')->on('tags')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('value'); // Nilai spesifik, misal: "Website"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portofolio_tag');
    }
};
