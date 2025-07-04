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
        Schema::create('sops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->unsignedBigInteger('category_id');
            // $table->foreign('category_id')->references('id')->on('sop_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignid('category_id')
                ->constrained('sop_categories')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->String('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sops');
    }
};
