<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail_Pemesanan;
use App\Models\Pemesanan;
class DetailPemesananController extends Controller
{
    // Mengambil semua data berdasarkan id_pesanan
    public function getAllByIdPesanan(){
        $id_pesanan = $this->getIdPesanan();
        $all_detail_id = Detail_Pemesanan::select('*')
            ->where('id_pemesanan', '=', $id_pesanan[0]->id_pemesanan)
            ->join('table_menu', 'table_menu.id_menu', '=', 'table_detail_pemesanan.id_menu')
            ->get();
        return $all_detail_id;
    }
    //Mengambil 1 Data
    public function getPerDetail($id_pemesanan, $id_menu){
        $detail = Detail_Pemesanan::select('*')
            ->where('id_pemesanan', '=', $id_pemesanan) 
            ->where('id_menu', '=',$id_menu)
            ->get();
        return $detail;
    }
    // Menyimpan Data Detail
    public function storeDetail(Request $request){
        $id_pemesanan = $request->id_pemesanan;
        $id_menu =$request->id_menu;
        $tes = $this->getPerDetail($id_pemesanan, $id_menu);
        echo$tes."<br>";
        echo$id_menu."<br>";
        echo$id_pemesanan;
        if(count($tes) ==0){
            $status = Detail_Pemesanan::create([
                'status_pemesanan' => 'Keranjang',
                'id_pemesanan' => $request->id_pemesanan,
                'id_menu' => $request->id_menu,
                'jumlah_pesan' => 1,
            ]);
            if($status){
                return redirect('Tamu/'.$request->no_meja.'/Order/Makanan');
            }else{
                return redirect('Tamu/'.$request->no_meja.'/Order/Makana');
            }
        }else{
            $jumlah_pesanan =$tes[0]->jumlah_pesan+1;
            $status = Detail_Pemesanan::find($tes[0]->id_detail);
            $status->update([
                'jumlah_pesan' => $jumlah_pesanan,
            ]);
            if($status){
                return redirect('Tamu/'.$request->no_meja.'/Order/Makanan');
            }else{
                return redirect('Tamu/'.$request->no_meja.'/Order/Makana');
            }
        }
        
    }
    //Menghapus Data Detail
    public function destroy($no_meja,$id_detail){
        $id_detail;
        $status = Detail_Pemesanan::find($id_detail);
        $status->delete();
        if($status){
            return redirect('Tamu/'.$this->getNoMeja().'/Order/Makanan');
        }else{
            return redirect('Tamu/'.$this->getNoMeja().'/Order/Makana');
        }
    }

    //Mengambil Id Pesanan dari No Meja
    public function getNoMeja(){
        $currentURL = \URL::current();
        $tes = explode('/',$currentURL);
        return $tes[8];
    }
    public function getIdPesanan(){
        /*$pemesanan = Pemesanan::where('no_meja', $this->getNoMeja())
                ->get();*/
        $pemesanan = Pemesanan::select('*')
            ->where('no_meja', '=', $this->getNoMeja())
            ->where('status_pembayaran', '=', "Masih")
            ->get();
        return $pemesanan;
    }
}
