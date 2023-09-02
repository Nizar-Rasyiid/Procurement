<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['id_transaksi'
                            ,'id_do'
                            ,'id_so'
                            ,'id_payment_so'
                            ,'id_payment_do'
                            ,'id_verifikasi'
                            ,'id_supplier'
                            ,'id_customer'
                            ,'tanggal_do'
                            ,'tanggal_so'
                            ,'customer'
                            ,'suplier'
                            ,'status'];
    protected $table = 'transaksi';

    public function customer()  {
        return $this->belongsTo(Customer::class,'id_customer');
    }
    public function suplier()  {
        return $this->belongsTo(Suplier::class,'id_suplier');
    }
    public function salesOrder()  {
        return $this->belongsTo(SalesOrder::class,'id_so');
    }
    public function deliveryOrder()  {
        return $this->belongsTo(DeliveryOrder::class,'id_do');
    }

    public function paymentSo()  {
        return $this->belongsTo(PaymentSo::class,'id_payment_so');
    }
    public function paymentOrder()  {
        return $this->belongsTo(PaymentOrder::class,'id_payment_do');
    }
    public function verifikasi()  {
        return $this->belongsTo(Verifikasi::class,'id_verifikasi');
    }
}

