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
            $table->unsignedBigInteger('topic_id'); // NPM for student research
            $table->foreign('topic_id')->references('id')->on('research_topics')->onUpdate('cascade')->onDelete('cascade');
            $table->string('year')->nullable();
            $table->string('status')->default('draft')->nullable(); // e.g., draft, published
            // $table->string('collabolator')->nullable(); // riset skripsi gausa
            $table->string('institution')->nullable(); // upn
            $table->string('funding')->nullable();  // penelitian
            // $table->date('published_at')->nullable(); // (pending)
            // $table->string('file_path')->nullable(); // 
            // $table->string('thumbnail')->nullable(); // Path to the thumbnail image
            // $table->boolean('is_featured')->default(false); // For highlighting important research
            // $table->boolean('is_active')->default(true); // For soft deletion or deactivation
            $table->string('urlYt')->unique(); // URL-friendly version of the title
            $table->string('repository')->unique(); // URL-friendly version of the title -> skripsi
            // $table->text('keywords')->nullable(); // For SEO
            // $table->text('abstract')->nullable(); // Short summary of the research
            // $table->string('doi')->nullable(); // Digital Object Identifier for the research
            // $table->string('citation')->nullable(); // Citation format for the research         
            $table->timestamps();


            // skripsi
            // 1. judul
            // 2. deskripsi (nama mhs npm)
            // 3. url
            // 4. repository
            // 5. category
            // 6. jenis lab(msi solusi)

            // penelitian
            // 1. category
            // 2. ketua penelitian (nama dosen)
            // 3. judul
            // 4. topic penelitian
            // 5. funding
            // 6. tahun
            // 7. dana


            // pengabdian masyarakat
            // 1. nama dosen
            // 2. judul
            // 3. topic
            // 4. institusi 
            // 5. tahun
            // 6. dana

            // kompetisi
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
