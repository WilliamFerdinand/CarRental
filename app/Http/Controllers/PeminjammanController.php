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
use DateTime;
use function Laravel\Prompts\confirm;

class PeminjammanController extends Controller
{
 
    function Pengembalian(){
        $pengembalianmobil = DB::table('peminjamman')->where('status','Berlangsung')->get()->toArray();
        return view('Main/pengembalian', ['pengembalian' => $pengembalianmobil]);
    }

    public function PengembalianAction(Request $request, $id)
    {
        $data['title'] = 'PengembalianAction';
        $peminjamman =peminjamman::findorfail($id);
        return view('Main/pengembalianAction',['peminjamman' => $peminjamman], $data);
    }

    public function Pengembalian_action(Request $request, $id)
    {
        $selesai =peminjamman::findorfail($id);
        $selesai -> status = "Selesai";
        $selesai -> save();
        return $this->addtransaksi($request);
    }


    public function addtransaksi( $request)
   {
    
        $addtransaksi = new transaksi([
            'idPeminjamman' => $request->idPeminjamman,
            'idUser' => $request->idUser,
            'idMobil' => $request->idMobil,
            'tanggalSewa' => $request->tanggalSewa,
            'tanggalKembali' => $request->tanggalKembali,
            'status' => "Selesai",
        ]);
        $addtransaksi->save();

        return redirect()->route('pengembalian')->with('success', 'Transaksi Selesai');
    }

    public function addrental()
    {
        $data['title'] = 'Rental Baru';
        $mobiltersedia = DB::table('mobil')->where('status','Vacant')->get()->toArray();
         
        return view('Main/rental', ['mobiltersedia' => $mobiltersedia], $data);

    }

    public function addrental_action($request,$hargatotal,$idMobil)
    {
        $request->validate([
            'idUser' => 'required',
            'idMobil' => 'required',
            'tanggalMulai' => 'required',
            'tanggalSelesai' => 'required',
            
        ]);

        $rental = new peminjamman([
            'idUser' => $request->idUser,
            'idMobil' => $request->idMobil,
            'tanggalMulai' => $request->tanggalMulai,
            'tanggalSelesai' => $request->tanggalSelesai,
            'totalHarga' => $hargatotal,
            'status' => "Berlangsung",
        ]);
        $rental->save();

        $selesai =mobil::findorfail($idMobil);
        $selesai -> status = "Selesai";
        $selesai -> save();
        
        return redirect()->route('addrental')->with('success', 'You have rented a car');
    }

    public function HitungTotal(Request $request)
    {
        $harga = $request->idMobil;
        $fdate = $request->tanggalMulai;
        $tdate = $request->tanggalSelesai;
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
       $days = $interval->format('%d');
       $hargamobil = DB::table('mobil')->where('idMobil',$harga)->value('harga');
       $hargatotal = $hargamobil * $days;

       $data['title'] = 'Rental Baru';
       
       return $this->addrental_action($request,$hargatotal);
      
    }


    

}

