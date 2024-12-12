<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table = 'paket';

    protected $fillable = ['nama_paket', 'harga_paket','jenis_paket_id','total_harga_paket','tipe'];

    public function pesanan(){
        return $this->hasMany(Pesanan::class);
    }

    public function jenispaket(){
        return $this->belongsTo(Jenispaket::class,'jenis_paket_id','id');
    }
}