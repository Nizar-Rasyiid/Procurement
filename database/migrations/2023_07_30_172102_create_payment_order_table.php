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
        Schema::create('payment_order', function (Blueprint $table) {
            $table->id();
            $table->string("id_payment_order");
            $table->string("id_do");
            $table->bigInteger("harga_total");     
            $table->bigInteger("total_bayar");
            $table->string("bukti_bayar");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_order');
    }
};
