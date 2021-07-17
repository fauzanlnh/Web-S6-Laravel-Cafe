<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Master;
use App\Http\Controllers\MasterController;
use Hash;
class PegawaiController extends Controller
{
    //
    public function index(){
        //return"pegawai Index";
        $pegawai = Pegawai::all();
        return view('Admin/indexpegawai', ['pegawai' => $pegawai]);
    }
    //Menampilkan Form Input
    public function create(){
        $Master = new MasterController();
        $data_master = $Master->getLastId();
        return view('Admin/formtambahpegawai', ['ld_baru' => $data_master[0]->kd_pengguna+1]);
    }
    //Menyimpan Data Ke Database
    public function store(Request $request){
        $this->validate($request,[
            'nama_pegawai' => "required",
            'notlp_pegawai' => "required",
            'almt_pegawai' => "required",
            'kd_pengguna' => "required",
            'username' => "required",
            'hak_akses' => "required"
        ]);
        $status2 = Master::create([
            'hak_akses' => $request->hak_akses,
            'username' => $request->username,
            'password' => Hash::make($request->username),
        ]); 
        $status = Pegawai::create([
            'nama_pegawai' => $request->nama_pegawai,
            'notlp_pegawai' => $request->notlp_pegawai,
            'almt_pegawai' => $request->almt_pegawai,
            'kd_penguna' => $request->kd_pengguna,
        ]); 
        
        if($status && $status2){
            return redirect('/Admin/Pegawai')->with('success', 'pegawai Berhasil Diubah');
        }else{
            return redirect('/Admin/Pegawai')->with('error', 'pegawai Gagal Diubah');
        }
        
    }
   
    //Menampilkan Form Edit Beserta Data Yang Akan diEdit
    public function edit($id_pegawai){
        $pegawai = Pegawai::select('*')
        ->where('kd_pegawai', '=', $id_pegawai)
        ->join('table_master', 'table_master.kd_pengguna', '=', 'table_pegawai.kd_penguna')
        ->get();
        return view('Admin/formtambahpegawai', ['pegawai' => $pegawai]);
    }
    //Mengubah Data Yang di Update kedalam Database
    public function update(Request $request, $id_pegawai){
        $this->validate($request,[
            'nama_pegawai' => "required",
            'notlp_pegawai' => "required",
            'almt_pegawai' => "required",
            'kd_pengguna' => "required",
            'username' => "required",
            'hak_akses' => "required"
        ]);
        $status = Pegawai::find($id_pegawai);
        $status->update([
            'nama_pegawai' => $request->nama_pegawai,
            'notlp_pegawai' => $request->notlp_pegawai,
            'almt_pegawai' => $request->almt_pegawai,
            'kd_penguna' => $request->kd_pengguna,
        ]);
        $status2= Master::find($request->kd_pengguna);
        $status2->update([
            'hak_akses' => $request->hak_akses,
            'username' => $request->username,
            'password' => Hash::make($request->username),
        ]);
        if($status && $status2){
            return redirect('/Admin/Pegawai')->with('success', 'pegawai Berhasil Diubah');
        }else{
            return redirect('/Admin/Pegawai')->with('error', 'pegawai Gagal Diubah');
        }

    }
    //Menghapus Data Makanan
    public function destroy($id_pegawai){
        $status = Pegawai::find($id_pegawai);
        $status->delete();
        if($status){
            return redirect('/Admin/Pegawai')->with('success', 'pegawai Berhasil Dihapus');
        }else{
            return redirect('/Admin/Pegawai')->with('error', 'pegawai Gagal Dihapus');
        }
    }

}
