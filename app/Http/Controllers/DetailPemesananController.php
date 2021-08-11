<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail_Pemesanan;
use App\Models\Pemesanan;
class DetailPemesananController extends Controller
{
    // Mengambil semua data berdasarkan id_pesanan dan status pesanan = keranjang
    public function getAllByIdPesanan(){
        $id_pesanan = $this->getIdPesanan();
        if(count($id_pesanan) == 0){
            return $all_detail_id = [];
        }else{
            $all_detail_id = Detail_Pemesanan::select('*')
            ->where('id_pemesanan', '=', $id_pesanan[0]->id_pemesanan)
            ->where('status_pemesanan', '=', 'Keranjang')
            ->join('table_menu', 'table_menu.id_menu', '=', 'table_detail_pemesanan.id_menu')
            ->get();
            return $all_detail_id;
        }
    }
    // Mengambil semua data berdasarkan id_pesanan dan status pesanan = order
    public function getAllByIdPesananOrder(){
        $id_pesanan = $this->getIdPesanan();
        $all_detail_id = Detail_Pemesanan::select('*')
            ->where('id_pemesanan', '=', $id_pesanan[0]->id_pemesanan)
            ->where('status_pemesanan', '!=', 'Keranjang')
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
            $length = count($tes)-1;
            if($tes[$length]->status_pemesanan == 'Keranjang'){
                $jumlah_pesanan =$tes[$length]->jumlah_pesan+1;
                $status = Detail_Pemesanan::find($tes[$length]->id_detail);
                $status->update([
                    'jumlah_pesan' => $jumlah_pesanan,
                ]);
            }else{
                $status = Detail_Pemesanan::create([
                    'status_pemesanan' => 'Keranjang',
                    'id_pemesanan' => $request->id_pemesanan,
                    'id_menu' => $request->id_menu,
                    'jumlah_pesan' => 1,
                ]);
            }
            if($status){
                return redirect('Tamu/'.$request->no_meja.'/Order/Makanan');
            }else{
                return redirect('Tamu/'.$request->no_meja.'/Order/Makana');
            }
        }
    }
    //Menghapus Data Detail
    public function destroy($no_meja,$id_detail){
        $status = Detail_Pemesanan::find($id_detail);
        $status->delete();
        if($status){
            return redirect('Tamu/'.$this->getNoMeja().'/Order/Makanan');
        }else{
            return redirect('Tamu/'.$this->getNoMeja().'/Order/Makana');
        }
    }
    // Mengubah Status Menjadi Pesan
    public function updateStatusPesanan(){
        $id_pesanan = $this->getIdPesanan();
        $status = Detail_Pemesanan::where('id_pemesanan', '=', $id_pesanan[0]->id_pemesanan)
            ->where('status_pemesanan', '=', 'Keranjang')
            ->update(['status_pemesanan'=>'Order']);
        if($status){
            return redirect('Tamu/'.$this->getNoMeja().'/DaftarPesanan');
        }else{
            return redirect('Tamu/'.$this->getNoMeja().'/DaftarPesana');
        }
        
    }

    public function viewDaftarPesanan(){        
        $datapesanan = $this->getIdPesanan();
        if(count($datapesanan) == 0){
            return redirect('Tamu/Pemesanan');
        }else{
            $daftar_pesanankeranjang = $this->getAllByIdPesanan();
            $daftar_pesanan = $this->getAllByIdPesananOrder();
            return view('Tamu/daftarpemesanan', ['daftar_pesanan' => $daftar_pesanan, 'a' => $datapesanan, 'b' => $daftar_pesanankeranjang]);
        }
    }
    public function viewKoki(){
        $daftarpesanan = $this->getAllOrder();
        return view('Koki/pesananmasak', ['daftar_pesanan' => $daftarpesanan]);
    }
    public function getAllOrder(){
        $pesanan = Detail_Pemesanan::select('*')
        ->where('status_pemesanan', '!=', 'Keranjang')
        ->where('status_pemesanan', '!=', 'Sajikan')
        ->join('table_menu', 'table_menu.id_menu', '=', 'table_detail_pemesanan.id_menu')
        ->join('table_pemesanan', 'table_pemesanan.id_pemesanan', '=', 'table_detail_pemesanan.id_pemesanan')
        ->get();
        return $pesanan;

    }
    public function prosesMasak(Request $request){
        $status = Detail_Pemesanan::where('id_detail', '=', $request->id_detail)
            ->update(['status_pemesanan'=>'Masak']);
        if($status){
            return redirect('Koki');
        }else{
            return redirect('Koki');
        }
    }
    public function prosesSajikan(Request $request){
        $pesanan = Detail_Pemesanan::select('*')
        ->where('id_detail', '=', $request->id_detail)
        ->join('table_menu', 'table_menu.id_menu', '=', 'table_detail_pemesanan.id_menu')
        ->get();
        $status = Detail_Pemesanan::where('id_detail', '=', $request->id_detail)
           ->update(['status_pemesanan'=>'Sajikan',
            'total_per_detail'=> $pesanan[0]->jumlah_pesan*$pesanan[0]->harga_menu
        ]);
        if($status){
            return redirect('Koki');
        }else{
            return redirect('Koki');
        }
    }

    //Mengambil Id Pesanan dari No Meja
    public function getNoMeja(){
        $currentURL = \URL::current();
        $tes = explode('/',$currentURL);
        //return $tes[5]
        return $tes[8];
    }
    public function getIdPesanan(){
        /*$pemesanan = Pemesanan::where('no_meja', $this->getNoMeja())
                ->get();*/
        $pemesanan = Pemesanan::select('*')
            ->where('no_meja', '=', $this->getNoMeja())
            ->where('status_pembayaran', '=', "Masih")
            ->get();
        if($pemesanan){
            return $pemesanan;
        }else{
            $pemesanan =[];
        }
    }
}
