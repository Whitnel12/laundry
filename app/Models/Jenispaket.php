<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenispaket extends Model
{
    use HasFactory;

    
    protected $table = 'jenis_paket';

    protected $fillable = ['nama_jenis', 'waktu_pengerjaan','potongan_harga','biaya_tambahan'];

    public function paket(){
        return $this->hasMany(Paket::class,'jenis_paket_id','id');
    }
}