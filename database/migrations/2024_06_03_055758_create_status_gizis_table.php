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
        Schema::create('status_gizis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pertumbuhan')->unsigned();
            $table->integer('ranking');
            $table->timestamps();

            $table->foreign('id_pertumbuhan')->references('id')->on('pertumbuhans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_gizis');
    }
};
