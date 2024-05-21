<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    
    protected $table = 'transaksi';
    public $timestamps = false;

    protected $fillable = [
        'idPeminjamman',
        'idUser',
        'idMobil',
        'tanggalSewa',
        'tanggalKembali',
        'status',

    ];

    public function peminjamman(){
        return $this-hasMany(user::class);
        return $this->hasMany(mobil::class);
        return $this->hasMany(peminjamman::class);
     }
}
