<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Margin extends Model
{
    protected $fillable = ["id_margin","id_so","id_do","id_verif"];
    protected $table = 'margin';

    public function salesOrder()  {
        return $this->belongsTo(SalesOrder::class,'id_so');
    }
    public function deliveryOrder()  {
        return $this->belongsTo(DeliveryOrder::class,'id_do');
    }
    public function verifikasi(){
        return $this->belongsTo(Verifikasi::class, 'id_verifikasi');
    }
}
