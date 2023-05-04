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
        Schema::create('post_previews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained('users');
            $table->integer('parent_post')->nullable();
            $table->string('title');
            $table->string('meta_title');
            $table->string('slug')->nullable();
            $table->tinyText('summary')->nullable();
            $table->boolean('published')->default(0);
            $table->dateTime('published_at');
            $table->text('content');
            $table->integer('category_id');
            $table->boolean('feature')->default(0);
            $table->string('post_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_previews');
    }
};
