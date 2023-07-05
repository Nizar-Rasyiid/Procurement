<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ["id_customer","nama","nomor_telepon","alamat"];
    protected $table = 'customer';
}
