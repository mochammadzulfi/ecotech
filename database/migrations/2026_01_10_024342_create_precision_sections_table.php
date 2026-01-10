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
        Schema::create('precision_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('precision_section_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('label_id');
            $table->string('label_en');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('precision_sections');
    }
};
