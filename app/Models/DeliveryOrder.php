<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    protected $fillable = ["id_so","id_customer","id_suplier","tanggal_pembelian","kandang","nama_supir","nomor_kendaraan","nomor_sim","hargaPerKg","total_ekor","total_kg","keterangan","uang_jalan","uang_tangkap","status"];
    protected $table = 'deliveryorder';

    public function suplier()  {
        return $this->belongsTo(Suplier::class,'id_suplier');
    }
    public function salesOrder()  {
        return $this->belongsTo(SalesOrder::class,'id_so');
    }
    public function customer() {
        return $this->belongsTo(Customer::class, 'id_customer');
    }


}
