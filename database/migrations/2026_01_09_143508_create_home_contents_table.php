<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_contents', function (Blueprint $table) {
            $table->id();

            // HERO TEXT
            $table->string('hero_title_id');
            $table->string('hero_title_en');

            $table->text('hero_subtitle_id');
            $table->text('hero_subtitle_en');

            // HERO IMAGE
            $table->string('hero_image')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_contents');
    }
};
