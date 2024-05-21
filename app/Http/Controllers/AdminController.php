<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
 function index(){
    return view('welcome');
 }

 function Admin(){
    return view('welcome')->with('Admin'.'$hakakses');
 }

}
