<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $fillable = ["id_suplier","nama_suplier","alamat","nomor_telepon_suplier","npwp","nomor_npwp","ktp"];

    protected $table = 'suplier';

    public function deliveryOrder(){
        return $this->hasMany(DeliveryOrder::class,'id_suplier');
    }
    public function transaksi(){
        return $this->hasMany(Transaksi::class,'id_suplier');
    }
}
