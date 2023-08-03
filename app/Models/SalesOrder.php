<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    protected $fillable = ["id_so","id_customer","tanggal","jumlahKg","hargaPerKg","keterangan","status"];

    protected $table = 'salesorder';


    public function customer()  {
        return $this->belongsTo(Customer::class,'id_customer');
    }
    
    public function deliveryOrder()  {
        return $this->belongsTo(DeliveryOrder::class,'id_do');
    }

    public function paymentSo()  {
        return $this->belongsTo(PaymentSo::class,'id_so');
    }

}
