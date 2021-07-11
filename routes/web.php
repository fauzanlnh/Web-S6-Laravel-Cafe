<?php

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

Route::get('/', function () {
    return view('login');
});


//Route::get('/',[MakananController::class,'index']);
Route::get('/Admin','App\Http\Controllers\PemesananController@index');
//Menu
Route::get('/Admin/Menu','App\Http\Controllers\MenuController@index');
//Tambah Menu
Route::get('/Admin/Menu/Tambah','App\Http\Controllers\MenuController@create');
Route::post('/Admin/Menu/Save', 'App\Http\Controllers\MenuController@store');
//Ubah Menu
Route::get('/Admin/Menu/Ubah/{id}','App\Http\Controllers\MenuController@edit');
Route::patch('/Admin/Menu/Ubah/{id}', 'App\Http\Controllers\MenuController@update');
//Hapus Menu
Route::delete('/Admin/Menu/Delete/{id}','App\Http\Controllers\MenuController@destroy');

//Pemesanan
Route::get('/Admin/Pemesanan','App\Http\Controllers\PemesananController@getTransaksi');

//Tambah Data Pemesanan / Transaksi
Route::get('/Tamu/Pemesanan','App\Http\Controllers\PemesananController@create');
Route::post('/Tamu/Pemesanan/Save', 'App\Http\Controllers\PemesananController@store');

//Pemesanan Menu
    //View
Route::get('/Tamu/{no_meja}/Order/Makanan','App\Http\Controllers\MenuController@createMakanan');
Route::get('/Tamu/{no_meja}/Order/Minuman','App\Http\Controllers\MenuController@createMinuman');
Route::get('/Tamu/{no_meja}/Order/detailMenu/{id}','App\Http\Controllers\MenuController@detailMenu'); 
    //CRUD
Route::post('/Tamu/Order/Save', 'App\Http\Controllers\DetailPemesananController@storeDetail');
Route::delete('Tamu/{no_meja}/Detail_Pesanan/Delete/{id_detail}','App\Http\Controllers\DetailPemesananController@destroy');
//Cekout
