<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Master;
use Validator;
use Hash;
use Session;
class MasterController extends Controller
{
    public function showFormLogin()
    {
        return view('login');
    }
    public function cekLogin(Request $request)
    {
        $rules = [
            'username'                 => 'required',
            'password'              => 'required|string'
        ];
 
        $messages = [
            'username.required'        => 'username wajib diisi',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $data = [
            'username'     => $request->input('username'),
            'password'  => $request->input('password'),
        ];
 
        Auth::attempt($data);
 
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            $listMa = Master::select('hak_akses')
                ->where('username', '=', $request->input('username'))
                ->get();
            if($listMa[0]->hak_akses == 'Admin'){
                return redirect('Admin');
            }else if($listMa[0]->hak_akses == 'Petugas'){
                return redirect('Petugas');
            }else if($listMa[0]->hak_akses == 'Koki'){
                return redirect('Koki');
            }else{
                Session::flash('error', 'username atau password salah');
                return redirect('Login');    
            }
            echo $listMa[0]->hak_akses;

        } else { // false
            //Login Fail
            Session::flash('error', 'username atau password salah');
            return redirect('Login');
        }
 
    }
    //
    public function getLastId(){
        //$pegawai = Master::all()-orderBy('kd_pengguna');
        $pegawai = DB::table('table_master')->orderBy('kd_pengguna','desc')->get();
        return$pegawai;
    }
}
