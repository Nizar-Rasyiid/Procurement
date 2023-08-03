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
        Schema::create('verifpembelian', function (Blueprint $table) {
            $table->id();
            $table->string("id_do");
            $table->string("tanggal");
            $table->integer("total_kg_tiba");
            $table->integer("gp");
            $table->integer("ekor");
            $table->integer("kg");
            $table->integer("susut");
            $table->integer("mati_susulan");
            $table->integer("total_final_kg");
            $table->integer("tonase_akhir");
            $table->string("keterangan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifpembelian');
    }
};
