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
        Schema::create('deliveryOrder', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_so');
            $table->string('id_customer');
            $table->string('id_suplier');
            $table->string('tanggal_pembelian');
            $table->integer('kandang');
            $table->string('nama_supir');
            $table->string('nomor_kendaraan');
            $table->string('nomor_sim');
            $table->integer('hargaPerKg');
            $table->integer('total_ekor');
            $table->integer('total_kg');
            $table->string('keterangan');
            $table->integer('uang_jalan');
            $table->integer('uang_tangkap');
            $table->integer('solar');
            $table->integer('etoll');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveryOrder');
    }
};
