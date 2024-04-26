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
        Schema::create('services_facilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('services_id');
            $table->foreignId('facilities_id');
            $table->timestamps();

            $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('facilities_id')->references('id')->on('facilities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_facilities');
    }
};