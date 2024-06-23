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
        Schema::create('pertumbuhans', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16);
            $table->string('tanggal_posyandu', 15);
            $table->integer('berat_badan');
            $table->integer('tinggi_badan');
            $table->integer('umur');
            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('anaks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertumbuhans');
    }
};
