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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique();

            $table->string('title_id');
            $table->string('title_en');

            $table->string('category_id');
            $table->string('category_en');

            $table->string('location_id')->nullable();
            $table->string('location_en')->nullable();

            $table->string('image');
            $table->text('excerpt_id')->nullable();
            $table->text('excerpt_en')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
