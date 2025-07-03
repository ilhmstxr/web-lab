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
        Schema::create('portofolios', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Title');
            $table->string('Description');
            $table->string('Image')->nullable();
            $table->string('Link')->nullable();
            $table->string('Category')->nullable();
            $table->string('Status')->default('active'); // 'active', 'inactive
            $table->string('Visibility')->default('public'); // 'public', 'private'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portofolios');
    }
};
