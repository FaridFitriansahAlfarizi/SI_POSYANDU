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
        Schema::create('imunisasis', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16);
            $table->string('tanggal_imunisasi', 15);
            $table->string('imunisasi', 30);
            $table->string('vitamin', 30);
            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('anaks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imunisasis');
    }
};
