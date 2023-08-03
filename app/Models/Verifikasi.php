<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verifikasi extends Model
{
    protected $fillable = [
                'id_verifikasi',
                'id_do',
                'tanggal_verifikasi',
                'gp',
                'kg',
                'mati_susulan',
                'tonase_akhir',
                'total_kg_tiba',
                'ekor',
                'susut',
                'normal',
                'kg_susut',
                'gp_normal',
                'gp_rp',
                'keterangan'
            ];

    protected $table = 'verifikasi';

    public function paymentSo()  {
        return  $this -> belongsTo(PaymentSo::class,'id_verifikasi');
     }
     public function deliveryOrder()  {
        return  $this -> belongsTo(DeliveryOrder::class,'id_do');
     }
}
