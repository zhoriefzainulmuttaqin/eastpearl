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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->longText('name');
            $table->longText('name_en');
            $table->longText('name_mandarin');
            $table->string('slug');
            $table->longText('short_desc');
            $table->longText('short_desc_en');
            $table->longText('short_desc_mandarin');
            $table->integer('price');
            $table->foreignId('facilities_id');
            $table->foreignId('categories_id');
            $table->foreignId('destination_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
