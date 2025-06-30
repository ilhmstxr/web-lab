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
        Schema::create('research', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('research_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('author');
            $table->string('year'); 
            $table->string('status')->default('draft'); // e.g., draft, published
            $table->string('collabolator')->nullable(); 
            $table->string('institution')->nullable(); // Institution or organization associated with the research
            $table->string('funding')->nullable(); 
            $table->date('published_at')->nullable();
            $table->string('file_path')->nullable(); // Path to the research file
            // $table->string('thumbnail')->nullable(); // Path to the thumbnail image
            $table->boolean('is_featured')->default(false); // For highlighting important research
            $table->boolean('is_active')->default(true); // For soft deletion or deactivation
            $table->string('slug')->unique(); // URL-friendly version of the title
            $table->text('keywords')->nullable(); // For SEO
            $table->text('abstract')->nullable(); // Short summary of the research
            $table->string('doi')->nullable(); // Digital Object Identifier for the research
            $table->string('citation')->nullable(); // Citation format for the research         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research');
    }
};
