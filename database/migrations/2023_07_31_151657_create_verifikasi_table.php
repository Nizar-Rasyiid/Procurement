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
        Schema::create('verifikasi', function (Blueprint $table) {
            $table->id();
            $table->string('id_verifikasi');
            $table->string('id_do');
            $table->date('tanggal_verifikasi');
            $table->integer('gp');
            $table->float('kg');
            $table->integer('mati_susulan');
            $table->float('tonase_akhir');
            $table->float('total_kg_tiba');
            $table->integer('ekor');
            $table->float('susut');
            $table->float('kg_susut');
            $table->integer('gp_normal');
            $table->integer('gp_rp');
            $table->float('normal');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifikasi');
    }
};
