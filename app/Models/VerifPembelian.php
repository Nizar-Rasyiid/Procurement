<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifPembelian extends Model
{
    use HasFactory;
    protected $fillable = ["id_do","tanggal","total_kg_tiba","gp","ekor","kg","susut","mati_susulan","tonal_final_kg","tonase_akhir","keterangan"];
    protected $table = 'verifpembelian';
}
