<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    protected $fillable = ["id_do","id_customer","tanggal","jumlahKg","hargaPerKg","keterangan","status"];

    protected $table = 'deliveryorder';


    public function customer()  {
        return $this->belongsTo(Customer::class,'id_customer');
    }
    use HasFactory;
}
