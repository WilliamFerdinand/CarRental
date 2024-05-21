<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\user as Authenticatable;
//use Illuminate\Notifications\Notifiable;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Authenticatable
{
    use HasFactory;
   
    protected $table = 'user';
    protected $primaryKey = 'idUser';
    
   public $timestamps = false;

    protected $fillable = [
        'namaUser',
        'email',
        'password',
        'noHP',
        'noSIM',
        'hakAkses',

    ];
    public function user(){
        return $this->belongTo(peminjamman::class);
        return $this->belongTo(transaksi::class);
     }
    
}
