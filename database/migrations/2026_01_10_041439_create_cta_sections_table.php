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
        Schema::create('cta_sections', function (Blueprint $table) {
            $table->id();

            $table->string('title_id');
            $table->string('title_en');

            $table->text('desc_id');
            $table->text('desc_en');

            $table->string('btn_primary_id');
            $table->string('btn_primary_en');

            $table->string('btn_secondary_id');
            $table->string('btn_secondary_en');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cta_sections');
    }
};
