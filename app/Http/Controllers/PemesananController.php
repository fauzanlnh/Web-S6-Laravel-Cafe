<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Detail_Pemesanan;
use Carbon\Carbon;
use App\Http\Controllers\MenuController;
class PemesananController extends Controller
{
    public $aaa=1;
    //Menampilkan Data 
    public function index(){
        
    }
    //Menampilkan Form Input
    public function create(){
        return view('Pemesanan/formtambahpesanan');
    }
    //Menyimpan Data Ke Database
    public function store(Request $request){
        $tanggal = Carbon::now();
        $tanggal->toDateString();
        $status = Pemesanan::create([
            'tanggal_pemesanan' => $tanggal,
            'no_meja' => $request->no_meja,
            'status_pembayaran' => 'Masih',
            'total_pembayaran' => 0,
        ]);
        if($status){
            //return redirect('Tamu/Order/'.$request->no_meja);
            return redirect('Tamu/'.$request->no_meja.'/Order/Makanan');
        }else{
            return "Data Gagal Dimasukkan";
        }
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
    //View Admin
    public function getTransaksi(){
        $pemesanan = Pemesanan::where('status_pembayaran', 'masih')->get(); 
        // mengirim data pegawai ke view pegawai 
        return view('Pemesanan/index', ['pemesanan' => $pemesanan]); 
    }
}
