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
        Schema::create('presensi_akademiks', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->date('tanggal');
            $table->string('status_kehadiran');
            $table->string('NIM');
            $table->string('Kode_mk');
        
            $table->foreign('NIM')->references('NIM')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('Kode_mk')->references('Kode_mk')->on('matakuliahs')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi_akademiks');
    }
};
