<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjamman extends Model
{
    use HasFactory;

    
    protected $table = 'peminjamman';
    protected $primaryKey = 'idPeminjamman';
    public $timestamps = false;

    protected $fillable = [
        'idUser',
        'idMobil',
        'tanggalMulai',
        'tanggalSelesai',
        'totalHarga',
        'status',

    ];
    public function peminjamman(){
        return $this-hasMany(user::class);
        return $this->hasMany(mobil::class);
     }
}
