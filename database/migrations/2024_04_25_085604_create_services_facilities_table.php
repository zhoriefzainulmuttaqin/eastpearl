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
            $table->foreignId('id_services');
            $table->foreignId('id_facilities');
            $table->timestamps();

            $table->foreign('id_services')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('id_facilities')->references('id')->on('facilities')->onDelete('cascade');
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
