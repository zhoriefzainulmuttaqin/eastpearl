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
           Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('image');
            $table->longText('description');
            $table->longText('description_en');
            $table->longText('description_mandarin');
            $table->longText('long_description');
            $table->longText('long_description_en');
            $table->longText('long_description_mandarin');
            $table->string('slogan');
            $table->string('location');
            $table->longText('link_maps');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about');
    }
};