<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ["id_customer","nama","nomor_telepon","alamat","tipe_customer","nomor_npwp","npwp","ktp"];
    protected $table = 'customer';

    public function salesOrders(){
        return $this->hasMany(SalesOrder::class,'id_customer');
    }

}
