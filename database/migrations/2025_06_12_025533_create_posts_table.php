<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->string('featured_image')->nullable();
            $table->json('gallery_images')->nullable(); // Multiple images
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->boolean('is_featured')->default(false);
            $table->integer('views_count')->default(0);
            $table->integer('reading_time')->nullable(); // Minutes
            $table->json('meta_data')->nullable(); // SEO meta tags
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            // Indexes for better performance
            $table->index(['status', 'published_at']);
            $table->index(['is_featured', 'published_at']);
            $table->index('views_count');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
