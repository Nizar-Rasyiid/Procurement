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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_do');
            $table->unsignedBigInteger('id_so');
            $table->unsignedBigInteger('id_supplier');
            $table->date('tanggal');
            $table->boolean('status');
            $table->timestamps();
    
            $table->foreign('id_do')->references('id')->on('do');
            $table->foreign('id_so')->references('id')->on('so');
            $table->foreign('id_supplier')->references('id_suplier')->on('suplier');
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
