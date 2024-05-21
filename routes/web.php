<?php

use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\PeminjammanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
   
   
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('home');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');


    Route::get('/login', [SesiController::class,'loginmasuk'])->name('login');
    Route::post('/login', [SesiController::class,'login'])->name('loginAuth');

    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'register_action'])->name('register.action');


    Route::get('welcome', [SesiController::class, 'welcome']);

    
    Route::get('/welcome', [SesiController::class, 'home']);
   

    Route::get('/mobil', [CarController::class, 'index']);
    Route::get('mobil', [CarController::class, 'index'])->name('mobil');
    Route::get('/addmobil', [CarController::class, 'addmobil'])->name('addmobil');
    Route::post('/addmobil', [CarController::class, 'addmobil_action'])->name('addmobil.action');

    
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');


    Route::get('/pengembalian', [PeminjammanController::class, 'Pengembalian'])->name('pengembalian');
    Route::get('/pengembalianAction2/{id}', [PeminjammanController::class, 'pengembalianAction'])->name('pengembalianAction');
    Route::put('/PengembalianAction/{id}', [PeminjammanController::class, 'pengembalian_action'])->name('pengembalianAction2');


    Route::get('/rental', [PeminjammanController::class, 'addrental'])->name('addrental');
   

    Route::post('/rentalhitung', [PeminjammanController::class, 'HitungTotal'])->name('addrental1');
    Route::post('/rental', [PeminjammanController::class, 'addrental_action'])->name('addrental.action');


    Route::get('/riwayatusr', [RiwayatController::class, 'riwayatusr'])->name('riwayatrental');

    
    Route::get('logout', [SesiController::class, 'logout']);

