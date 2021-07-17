<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pemesanan;
use App\Models\Detail_Pemesanan;
use App\Models\Meja;
use Carbon\Carbon;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MejaController;
class PemesananController extends Controller
{
    public $aaa=1;
    //Menampilkan Data 
    public function index(){
        $transaksi = DB::table('table_pemesanan')
            ->selectRaw('COUNT(table_pemesanan.id_pemesanan) as total_transaksi, SUM(total_pembayaran)as total_pemasukan')
            ->get();
        $menu =  DB::table('table_menu')
            ->selectRaw('COUNT(table_menu.id_menu) as total_menu')
            ->get();
        $pegawai=  DB::table('table_pegawai')
            ->selectRaw('COUNT(table_pegawai.kd_pegawai) as total_pegawai')
            ->get();
        $barchartMinuman= DB::table('table_detail_pemesanan')
            ->selectRaw('month(tanggal_pemesanan) as "bulan",year(tanggal_pemesanan) as "year", SUM(jumlah_pesan) as jumlah_minuman, monthname(tanggal_pemesanan) as namabulan')
            ->join('table_menu', 'table_menu.id_menu', '=', 'table_detail_pemesanan.id_menu')
            ->join('table_pemesanan', 'table_pemesanan.id_pemesanan', '=', 'table_detail_pemesanan.id_pemesanan')
            ->where('kategori', '=', 'minuman')
            ->groupBy('bulan')
            ->orderBy('year', 'desc')
            ->orderBy('bulan', 'desc')
            ->limit(12)
            ->get();
        $barchartMakanan= DB::table('table_detail_pemesanan')
            ->selectRaw('month(tanggal_pemesanan) as "bulan",year(tanggal_pemesanan) as "year", SUM(jumlah_pesan) as jumlah_minuman, monthname(tanggal_pemesanan) as namabulan')
            ->join('table_menu', 'table_menu.id_menu', '=', 'table_detail_pemesanan.id_menu')
            ->join('table_pemesanan', 'table_pemesanan.id_pemesanan', '=', 'table_detail_pemesanan.id_pemesanan')
            ->where('kategori', '=', 'makanan')
            ->groupBy('bulan')
            ->orderBy('year', 'desc')
            ->orderBy('bulan', 'desc')
            ->limit(12)
            ->get();
        $lineChartPendaptan= DB::table('table_pemesanan')
            ->selectRaw('month(tanggal_pemesanan) as "bulan",year(tanggal_pemesanan) as "year", SUM(total_pembayaran) as pendapatan_perbulan, monthname(tanggal_pemesanan) as namabulan')
            ->groupBy('bulan')
            ->orderBy('year', 'desc')
            ->orderBy('bulan', 'desc')
            ->limit(12)
            ->get();
        /*echo $transaksi."<br>";
        echo $menu."<br>";
        echo $pegawai."<br>";
        echo $barchartMinuman."<br>";
        echo $lineChartPendaptan."<br>";*/
        return view('Admin/index',['transaksi' => $transaksi, 'menu' => $menu, 'pegawai' => $pegawai, 'barmin' => $barchartMinuman, 'barman' => $barchartMakanan, 'pendapatan' => $lineChartPendaptan]);
    }
    //Menampilkan Form Input
    public function create(){
        $meja = new MejaController();
        $no_meja = $meja->getNoMeja();
        return view('Tamu/formtambahpesanan', ['no_meja' => $no_meja]);
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
        $meja = new MejaController();
        $status2 = $meja->updateStatus($request->no_meja);
        if($status && $status2){
            return redirect('Tamu/'.$request->no_meja.'/Order/Makanan');
        }else{
            return "Data Gagal Dimasukkan";
        }
    }
    //Menampilkan Invoice
    public function viewInvoice(){
        $detail_controller= new DetailPemesananController();
        $datapesanan = $detail_controller->getIdPesanan();
        if(count($datapesanan) == 0){
            return redirect('Tamu/Pemesanan');
        }else{
            $daftar_pesanan = Detail_Pemesanan::select('*')
                ->where('table_detail_pemesanan.id_pemesanan', '=', $datapesanan[0]->id_pemesanan)
                ->where('status_pemesanan', '=', 'Sajikan')
                ->join('table_menu', 'table_menu.id_menu', '=', 'table_detail_pemesanan.id_menu')
                ->join('table_pemesanan', 'table_pemesanan.id_pemesanan', '=', 'table_detail_pemesanan.id_pemesanan')
                ->get();
            if(count($daftar_pesanan) == 0){
                return view('Tamu/invoice', ['daftar_pesanan' => [], 'a' => $datapesanan]);
            }
            if($daftar_pesanan[0]->status_pembayaran == 'Masih'){
                return view('Tamu/invoice', ['daftar_pesanan' => $daftar_pesanan, 'a' => $datapesanan]);
            }
        }
    }
    public function viewPetugas(){
        $daftar_pesanan = DB::table('table_detail_pemesanan')
            ->selectRaw('table_pemesanan.id_pemesanan, sum(total_per_detail) as total')
            ->where('status_pembayaran', '=', 'Masih')
            ->where('table_detail_pemesanan.status_pemesanan', '=', 'Sajikan')
            ->join('table_pemesanan', 'table_pemesanan.id_pemesanan', '=', 'table_detail_pemesanan.id_pemesanan')
            ->groupBy('table_pemesanan.id_pemesanan')
            ->get();
        return view('Petugas/checkout', ['daftar_pesanan' => $daftar_pesanan]);
    }
    public function viewCheckout(){
        $daftar_pesanan = DB::table('table_detail_pemesanan')
            ->selectRaw('table_pemesanan.id_pemesanan, sum(total_per_detail) as total')
            ->where('table_pemesanan.id_pemesanan', '=', $this->getIdPemesanan())
            ->join('table_pemesanan', 'table_pemesanan.id_pemesanan', '=', 'table_detail_pemesanan.id_pemesanan')
            ->groupBy('table_pemesanan.id_pemesanan')
            ->get();
        $daftar_pesanan2 = Detail_Pemesanan::select('*')
        ->where('table_detail_pemesanan.id_pemesanan', '=', $this->getIdPemesanan())
        ->where('status_pemesanan', '=', 'Sajikan')
        ->join('table_menu', 'table_menu.id_menu', '=', 'table_detail_pemesanan.id_menu')
        ->join('table_pemesanan', 'table_pemesanan.id_pemesanan', '=', 'table_detail_pemesanan.id_pemesanan')
        ->get();
        return view('Petugas/detailcheckout', ['daftar_pesanan' => $daftar_pesanan, 'daftar_pesanan2' => $daftar_pesanan2]);
    }
    public function viewLaporanPenjualan(){
        return view('Admin/laporanpenjualan');
    }
    public function prosesCheckout(Request $request){
        //echo $request->no_meja."<br>";
        //echo $request->total2;
        $status = Pemesanan::where('id_pemesanan', '=', $this->getIdPemesanan())
           ->update(['status_pembayaran'=>'Dibayar',
            'total_pembayaran'=> $request->total2
        ]);
        $status2 = Meja::where('no_meja', '=', $request->no_meja)
           ->update(['status'=>'Kosong']);
        if($status){
            return redirect('Petugas');
        }else{
            //return redirect('Koki');
            echo"error";
        }
    }
    public function getIdPemesanan(){
        $currentURL = \URL::current();
        $tes = explode('/',$currentURL);
        return $tes[9];
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
        return view('Tamu/index', ['pemesanan' => $pemesanan]); 
    }
    public function viewDataTransaksi(){
        $pemesanan = Pemesanan::where('status_pembayaran', 'Dibayar')->get(); 
        return view('Admin/indextransaksi', ['pemesanan' => $pemesanan]); 
    }
}
