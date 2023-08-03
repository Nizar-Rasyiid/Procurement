<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSo extends Model
{
    protected $fillable = ["id_payment_so",'id_so','id_verifikasi','jumlah_bayar','bukti_bayar_penjualan','keterangan'];
    protected $table = 'payment_so';

    public function salesOrder()  {
        return $this->belongsTo(SalesOrder::class,'id_so');
    }
    public function verifikasi()  {
        return $this->belongsTo(Verifikasi::class,'id_verifikasi ');
    }
}
