<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    // protected $fillable = ['nama_pesanan', 'harga_pelanggan','status_pesanan','berat','total_harga'];
    protected $fillable = ['paket_id','user_id','promo_id','status_pesanan','berat','total_harga'];

    public function paket(){
        return $this->belongsTo(Paket::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function promo(){
        return $this->belongsTo(Promo::class);
    }
}