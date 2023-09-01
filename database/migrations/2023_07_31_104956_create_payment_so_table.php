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
        Schema::create('payment_so', function (Blueprint $table) {
            $table->id();
            $table->string('id_payment_so');
            $table->string('id_so');
            $table->string('id_verifikasi');
            $table->bigInteger('harga_total');
            $table->bigInteger('jumlah_bayar');
            $table->string('bukti_bayar_penjualan');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_so');
    }
};
