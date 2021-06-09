<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
class PemesananController extends Controller
{
     //Menampilkan Data 
     public function index(){
        $pemesanan = Pemesanan::where('status_pembayaran', 'masih')->get(); 
 
	    // mengirim data pegawai ke view pegawai 
	    return view('Pemesanan/index', ['pemesanan' => $pemesanan]); 
    }
    //Menampilkan Form Input
    public function create(){

    }
    //Menyimpan Data Ke Database
    public function store(){

    }
    //Menampilkan Form Edit Beserta Data Yang Akan diEdit
    public function edit(){

    }
    //Mengubah Data Yang di Update kedalam Database
    public function update(){

    }
    //Menghapus Data Makanan
    public function destroy(){
        
    }
}
