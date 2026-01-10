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
        Schema::table('page_headers', function (Blueprint $table) {
            $table->string('btn_primary_text_id')->nullable();
            $table->string('btn_primary_text_en')->nullable();
            $table->string('btn_primary_url')->nullable();

            $table->string('btn_secondary_text_id')->nullable();
            $table->string('btn_secondary_text_en')->nullable();
            $table->string('btn_secondary_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_headers', function (Blueprint $table) {
            //
        });
    }
};
