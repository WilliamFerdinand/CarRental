<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Models\peminjamman;
use App\Models\User;
use App\Models\mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
{
    function index(){
        $data['title'] = 'riwayat';
        $transaksi = DB::table('transaksi')
        ->get()->toArray();
        return view('Main/riwayat', ['riwayat' => $transaksi],$data);
    }
    function riwayatusr(){
        $data['title'] = 'riwayat';
        $id= Session('id');
        $transaksi = DB::table('transaksi')->where('idUser', $id)->get()->toArray();
        return view('Main/riwayatusr', ['riwayat' => $transaksi],$data);
    }
}
