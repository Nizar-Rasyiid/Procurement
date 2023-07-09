<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APSuplier extends Model
{
    protected $fillable = ["id_customer","tanggal","status"];
    protected $table = 'ap';
}
