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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->string('nik', 16)->primary();
            $table->string('nama', 100);
            $table->enum('jenis_kelamin', ['LAKI-LAKI', 'PEREMPUAN']);
            $table->string('tempat_lahir', 30);
            $table->string('tanggal_lahir', 15);
            $table->string('agama', 10);
            $table->string('pendidikan', 50);
            $table->string('jenis_pekerjaan', 100);
            $table->string('golongan_darah', 15)->nullable();
            $table->string('status_perkawinan', 30);
            $table->string('tanggal_perkawinan', 15)->nullable();
            $table->string('status_hubungan_keluarga', 30);
            $table->string('kewarganegaraan', 5);
            $table->string('username', 30);
            $table->string('password', 60);
            $table->enum('level', ['PENDUDUK', 'PETUGAS', 'ADMIN']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};
