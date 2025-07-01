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
        Schema::create('lab_schedules', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('day_of_week');
            $table->tinyInteger('session');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('status', ['available', 'booked', 'maintenance'])->default('available');
            $table->string('remarks')->nullable();
            $table->string('color')->default('#ffffff');
            $table->string('title')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_schedules');
    }
};
