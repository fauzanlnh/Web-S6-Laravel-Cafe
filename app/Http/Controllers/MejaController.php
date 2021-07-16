<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja;
class MejaController extends Controller
{
    //
    public function getNoMeja(){        
        $meja = Meja::where('status', '=', 'Kosong')->get();
        return $meja;
    }
    public function updateStatus($no_meja){
        $status = Meja::where('no_meja', '=', $no_meja)
            ->update(['status'=>'Terisi']);
        return $status;
    }

}
