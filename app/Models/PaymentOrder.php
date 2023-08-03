<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentOrder extends Model
{
    use HasFactory;
    protected $fillable = ["id_do","harga_total","total_bayar","bukti_bayar"];
    protected $table = 'payment_order';

    public function deliveryOrder()  {
        return $this->belongsTo(DeliveryOrder::class,'id_do');
    }
}
