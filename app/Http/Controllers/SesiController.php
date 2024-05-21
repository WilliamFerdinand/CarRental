<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use session;
use Hash;

class SesiController extends Controller
{
    
    function loginmasuk()
    {
        return view('auth/login');
    }

    function login(Request $request)
    {
   
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data=user::where('email', $request->email)->first();
        if($data){
        if(Hash::check($request->password,$data->password)) {
            $hak = DB::table('user')->where(['email' => $request->email])->get()->value('hakAkses');
            $idusr= DB::table('user')->where(['email' => $request->email])->get()->value('idUser');
            $nmusr= DB::table('user')->where(['email' => $request->email])->get()->value('namaUser');
            Session(['value' => 'logged']);
            Session(['hak'=>$hak ]);
            Session(['id'=> $idusr ]);
            Session(['namausr'=> $nmusr ]);
            return view('dashboard');
         }else{
            return redirect('/login')->withErrors('Email atau Password yang dimasukkan tidak sesuai')-> withInput();
        }   
    }else{
        return redirect('/login')->withErrors('Akun tidak ditemukan, silahkan registrasi')-> withInput();
    }
}

    public function welcome()
    {
        
        $status= Session($value);
        if($status =="logged"){
       
        }else{
            return view('dashboard');
        }
    }
    public function home()
    {
            
            return view('welcome', $data);
    }
    public function logout(Request $request)
    {
       $request->session()->flush();
        return redirect('dashboard');
    }
}