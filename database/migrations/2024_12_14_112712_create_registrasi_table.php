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
        Schema::create('registrasi', function (Blueprint $table) {
            $table->id('id_reg');
            $table->unsignedBigInteger('id_pasien');
            $table->unsignedBigInteger('id_dokter');
            $table->dateTime('tanggal_registrasi');
            $table->enum('status_pemeriksaan', ['sudah', 'belum']);
            $table->enum('status_pembayaran', ['sudah', 'belum']);
            $table->boolean('pengingat_terkirim')->default(false);

            // Foreign keys
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade');
            $table->foreign('id_dokter')->references('id_dokter')->on('dokter')->onDelete('cascade');

            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasi');
    }
};
