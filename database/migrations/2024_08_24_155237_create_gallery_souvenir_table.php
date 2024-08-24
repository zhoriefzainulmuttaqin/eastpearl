<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gallery_souvenir', function (Blueprint $table) {
            $table->id();
            $table->foreignId('souvenir_id');
            $table->string('image_name');
            $table->string('desc');
            $table->string('desc_en');
            $table->string('desc_mandarin');
            $table->string('image');
            //automaticaly created_at and updated_at
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable()->default(DB::raw('NULL'))->onUpdate(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_souvenir');
    }
};