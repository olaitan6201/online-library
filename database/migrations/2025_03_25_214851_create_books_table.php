<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('isbn')->unique();
            $table->string('revision_number')->nullable();
            $table->date('published_date');
            $table->string('publisher');
            $table->string('author');
            $table->date('date_added');
            $table->string('genre');
            $table->string('cover_image_path')->nullable();
            $table->text('description')->nullable();
            $table->integer('pages')->nullable();
            $table->enum('status', ['available', 'checked_out', 'reserved'])->default('available');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
