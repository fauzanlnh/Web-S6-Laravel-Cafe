<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Master;
class MasterController extends Controller
{
    //
    public function getLastId(){
        //$pegawai = Master::all()-orderBy('kd_pengguna');
        $pegawai = DB::table('table_master')->orderBy('kd_pengguna','desc')->get();
        return$pegawai;
    }
}
