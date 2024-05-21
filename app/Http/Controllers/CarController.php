<?php

namespace App\Http\Controllers;


use App\Models\mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    function index(){
        
        $mobil = DB::table('mobil')->get()->toArray();
        return view('Main/mobil', ['mobil' => $mobil]);
    }
   
    public function addmobil()
    {
       
        return view('Main/addmobil');
    }

    public function addmobil_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'merk' => 'required',
            'model' => 'required',
            'jenis' => 'required',
            'noplat' => 'required',
            'harga' => 'required',
        ]);

        $mobil = new mobil([
            'namaMobil' => $request->name,
            'merek' => $request->merk,
            'model' => $request->model,
            'jenis' => $request->jenis,
            'noPlat' => $request->noplat,
            'harga' => $request->harga,
            'status' => "Vacant",
        ]);
        $mobil->save();

        return redirect()->route('mobil')->with('success', 'New car has been added');
    }

}
