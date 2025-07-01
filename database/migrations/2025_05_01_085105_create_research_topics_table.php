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
            Schema::create('research_topics', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique(); // Unique name for the research topic
                $table->text('description')->nullable(); // Optional description of the research topic
                $table->foreignId('research_category_id')
                    ->nullable()
                    ->after('id') // Optional, for neatness
                    ->constrained('research_categories')
                    ->onDelete('cascade'); // or 'set null'
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('research_topics');
        }
    };
