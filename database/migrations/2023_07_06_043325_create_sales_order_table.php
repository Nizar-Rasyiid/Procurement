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
        Schema::create('salesOrder', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_so');
            $table->string('id_customer');
            $table->string('tanggal');
            $table->integer('jumlahKg');
            $table->integer('hargaPerKg');
            $table->string('keterangan');
            $table->string('order_type');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salesOrder');
    }
};
