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
        Schema::create('k_r_s', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('k_r_s');
    }
};
