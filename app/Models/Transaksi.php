<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ["id_do","id_so","id_suplier","tanggal","status"];
    protected $table = 'transaksi';
}
