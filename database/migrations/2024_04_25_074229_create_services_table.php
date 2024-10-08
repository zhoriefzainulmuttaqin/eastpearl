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
            $table->longText('long_desc');
            $table->longText('long_desc_en');
            $table->longText('long_desc_mandarin');
            $table->integer('price');
            $table->foreignId('categories_id');
            $table->string('meeting_point');
            $table->string('bulan_terbaik');
            $table->string('aktivitas_fisik');
            $table->string('durasi');
            $table->integer('minimal_peserta');

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