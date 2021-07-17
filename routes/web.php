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
//Route::get('/',[MakananController::class,'index']);

//Index
Route::get('/', function () {
    return view('login');
});
Route::get('/Login', function () {
    return view('login');
});
//Route::auth();
Route::post('Login/cekLogin', 'App\Http\Controllers\MasterController@cekLogin');
//Route::group(['middleware' => 'auth'], function () {
//Petugas    
//View
    //Admin
    Route::get('/Admin','App\Http\Controllers\PemesananController@index');
    Route::get('/Admin/Menu','App\Http\Controllers\MenuController@index');
    Route::get('/Admin/Menu/Tambah','App\Http\Controllers\MenuController@create');
    Route::get('/Admin/Menu/Ubah/{id}','App\Http\Controllers\MenuController@edit');
    Route::get('/Admin/Pegawai','App\Http\Controllers\PegawaiController@index');
    Route::get('/Admin/Pegawai/Tambah','App\Http\Controllers\PegawaiController@create');
    Route::get('/Admin/Pegawai/Ubah/{id}','App\Http\Controllers\PegawaiController@edit');
    Route::get('/Admin/Pemesanan','App\Http\Controllers\PemesananController@getTransaksi');
    Route::get('/Admin/Transaksi','App\Http\Controllers\PemesananController@viewDataTransaksi');
        //Koki
    Route::get('/Koki','App\Http\Controllers\DetailPemesananController@viewKoki');
        //Petugas / Kasir
    Route::get('/Petugas','App\Http\Controllers\PemesananController@viewPetugas');
    Route::get('/Petugas/Checkout/{id_pemesanan}','App\Http\Controllers\PemesananController@viewCheckout');
    //CRUD
        //Admin
    Route::post('/Admin/Menu/Save', 'App\Http\Controllers\MenuController@store');
    Route::patch('/Admin/Menu/Ubah/{id}', 'App\Http\Controllers\MenuController@update');
    Route::delete('/Admin/Menu/Delete/{id}','App\Http\Controllers\MenuController@destroy');
    Route::post('/Admin/Pegawai/Save', 'App\Http\Controllers\PegawaiController@store');
    Route::patch('/Admin/Pegawai/Ubah/{id}', 'App\Http\Controllers\PegawaiController@update');
    Route::delete('/Admin/Pegawai/Delete/{id}','App\Http\Controllers\PegawaiController@destroy');
        //Koki
    Route::patch('/Koki/Sajikan/{id_detail}', 'App\Http\Controllers\DetailPemesananController@prosesSajikan');
    Route::patch('/Koki/Masak/{id_detail}', 'App\Http\Controllers\DetailPemesananController@prosesMasak');
        //Petugas / Kasir
    Route::patch('/Petugas/Checkout/{id_pemesanan}', 'App\Http\Controllers\PemesananController@prosesCheckout');    
//});


//Tamu
//View
Route::get('/Tamu/Pemesanan','App\Http\Controllers\PemesananController@create');
Route::get('/Tamu/{no_meja}/Order/Makanan','App\Http\Controllers\MenuController@createMakanan');
Route::get('/Tamu/{no_meja}/Order/Minuman','App\Http\Controllers\MenuController@createMinuman');
Route::get('/Tamu/{no_meja}/Order/detailMenu/{id}','App\Http\Controllers\MenuController@detailMenu'); 
Route::get('/Tamu/{no_meja}/DaftarPesanan','App\Http\Controllers\DetailPemesananController@viewDaftarPesanan');
Route::get('/Tamu/{no_meja}/Pesanan/Bayar', 'App\Http\Controllers\PemesananController@viewInvoice');

//CRUD
Route::post('/Tamu/Pemesanan/Save', 'App\Http\Controllers\PemesananController@store');
Route::post('/Tamu/Order/Save', 'App\Http\Controllers\DetailPemesananController@storeDetail');
Route::delete('/Tamu/{no_meja}/Detail_Pesanan/Delete/{id_detail}','App\Http\Controllers\DetailPemesananController@destroy');
Route::patch('/Tamu/{no_meja}/Pesanan/Order', 'App\Http\Controllers\DetailPemesananController@updateStatusPesanan');
//Route::patch('/Tamu/{no_meja}/Pesanan/Bayar', 'App\Http\Controllers\DetailPemesananController@updatePembayaran');


    



//Cekout
