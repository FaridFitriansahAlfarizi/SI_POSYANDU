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
        Schema::create('anaks', function (Blueprint $table) {
            $table->string('nik', 16)->primary();
            $table->string('nik_orang_tua', 16);
            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('penduduks');
            $table->foreign('nik_orang_tua')->references('nik')->on('orang_tuas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anaks');
    }
};
