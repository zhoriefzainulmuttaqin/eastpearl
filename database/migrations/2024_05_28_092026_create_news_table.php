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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('admin_id');
            $table->string('image');
            $table->longText('name');
            $table->longText('name_en');
            $table->longText('name_mandarin');
            $table->string('slug');
            $table->longText('content');
            $table->longText('content_en');
            $table->longText('content_mandarin');
            $table->timestamp('published_date');
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