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
        Schema::create('lab_bookings', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->String('phoneNumber');
            $table->String('purpose');
            $table->date('bookingDate');
            $table->String('sessionTime'); // e.g., morning, afternoon, evening
            $table->String('requiredEquipment')->nullable(); // Optional field for any specific equipment needed
            $table->String('status')->default('pending'); // e.g., pending, confirmed, cancelled
            $table->String('notes')->nullable(); // Additional notes or special requests
            $table->unsignedBigInteger('schedule_id');
            $table->foreign('schedule_id')->references('id')->on('lab_schedules')->onUpdate('cascade')->onDelete('cascade');
            $table->String('LabName');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_bookings');
    }
};
