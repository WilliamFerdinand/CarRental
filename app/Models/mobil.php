<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobil extends Model
{
    use HasFactory;

    protected $table = 'mobil';
    
    public $timestamps = false;
 
     protected $fillable = [
         'namaMobil',
         'merek',
         'model',
         'jenis',
         'noPlat',
         'harga',
         'status',
 
     ];

     public function mobil(){
        return $this->belongTo(peminjamman::class);
        return $this->belongTo(transaksi::class);
     }
}
