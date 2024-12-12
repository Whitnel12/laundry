<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $table = 'promo';

    protected $fillable = ['nama_promo', 'jenis_promo','nilai_promo','status'];

    public function pesanan(){
        return $this->hasMany(Pesanan::class);
    }
}