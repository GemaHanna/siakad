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
        Schema::create('jadwal_akademiks', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->string('Kode_mk');
            $table->unsignedBigInteger('id_ruang');
            $table->unsignedBigInteger('id_Gol');
        
            $table->foreign('Kode_mk')->references('Kode_mk')->on('matakuliahs')->onDelete('cascade');
            $table->foreign('id_ruang')->references('id')->on('ruangs')->onDelete('cascade');
            $table->foreign('id_Gol')->references('id')->on('golongans')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_akademiks');
    }
};
