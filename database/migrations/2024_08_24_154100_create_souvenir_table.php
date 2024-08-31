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
        Schema::create('souvenir', function (Blueprint $table) {
            $table->id();
            $table->string('souvenir_category_id');
            $table->string('image');
            $table->string('name');
            $table->string('name_en');
            $table->string('name_mandarin');
            $table->string('slug');
            $table->longText('desc');
            $table->longText('desc_en');
            $table->longText('desc_mandarin');
            $table->integer('price');
            $table->integer('disc_price')->nullable();
            $table->string('link_shopee')->nullable();
            $table->string('link_amazon')->nullable();
            $table->string('link_alibaba')->nullable();
            $table->string('link_tokopedia')->nullable();
            $table->string('link_blibli')->nullable();
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
        Schema::dropIfExists('souvenir');
    }
};
