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

Route::get('/Admin/Menu/Tambah','App\Http\Controllers\MenuController@create');
Route::post('/Admin/Menu/Save', 'App\Http\Controllers\MenuController@store');

Route::get('/Admin/Menu/Ubah/{id}','App\Http\Controllers\MenuController@edit');
Route::patch('/Admin/Menu/Ubah/{id}', 'App\Http\Controllers\MenuController@update');

Route::delete('/Admin/Menu/Delete/{id}','App\Http\Controllers\MenuController@destroy');