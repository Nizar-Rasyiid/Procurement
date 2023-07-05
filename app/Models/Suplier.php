<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $fillable = ["id_suplier","nama_suplier","alamat","nomor_telepon_suplier"];
    protected $table = 'customer';
}
