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
        Schema::create('news', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('news_category_id')->references('id')->on('news_categories')->onDelete('cascade');
            $table->foreignUuid('news_tag_id')->references('id')->on('news_tags')->onDelete('cascade');
            $table->string('title')->unique();
            $table->string('content', 10000);
            $table->string('cover');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
