<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $primaryKey = 'id_suplier';
    protected $fillable = ["id_suplier","nama_suplier","alamat","nomor_telepon_suplier"];

    protected $table = 'suplier';

    public function deliveryOrder(){
        return $this->hasMany(DeliveryOrder::class,'id_suplier');
    }
}
