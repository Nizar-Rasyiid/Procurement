<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ["id_do","id_so","id_suplier","tanggal","status"];
    protected $table = 'transaksi';

    public function customer()  {
        return $this->belongsTo(Customer::class,'id_customer');
    }
    public function salesOrder()  {
        return $this->belongsTo(SalesOrder::class,'id_so');
    }
    public function deliveryOrder()  {
        return $this->belongsTo(DeliveryOrder::class,'id_do');
    }
}

