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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            // $table->string('id_transaksi');
            // $table->string('id_do');
            $table->string('id_so');
            $table->string('id_payment_so');
            // $table->string('id_payment_do');
            $table->string('id_verifikasi');
            // $table->string('id_supplier');
            // $table->string('id_customer');
            // $table->date('tanggal_do');
            // $table->date('tanggal_so');
            // $table->string('customer');
            // $table->string('suplier');
            // $table->boolean('status')->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
