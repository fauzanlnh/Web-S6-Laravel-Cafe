<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
class MenuController extends Controller
{
    //Menampilkan Data 
    public function index(){
        //return"Menu Index";
        $menu = Menu::all();
        return view('Makanan/index', ['menu' => $menu]);
    }
    //Menampilkan Form Input
    public function create(){
        return view('Makanan/formtambah');
    }
    //Menyimpan Data Ke Database
    public function store(Request $request){
        $this->validate($request,[
            'nama_menu' => "required",
            'harga_menu' => "required",
        ]);
        $status = Menu::create([
            'nama_menu' => $request->nama_menu,
            'harga_menu' => $request->harga_menu,
            'kategori' => $request->kategori,
            'status' => $request->status,
        ]);
        if($status){
            return redirect('/Admin/Menu')->with('success', 'Menu Berhasil Ditambahkan');
        }else{
            return redirect('/Admin/Menu')->with('error', 'Menu Gagal Ditambahkan');
        }
    }
    //Menampilkan Form Edit Beserta Data Yang Akan diEdit
    public function edit($id_menu){
        $menu = Menu::find($id_menu);
        return view('Makanan/formtambah', ['menu' => $menu]);
    }
    //Mengubah Data Yang di Update kedalam Database
    public function update(Request $request, $id_menu){
        $this->validate($request,[
            'nama_menu' => "required",
            'harga_menu' => "required",
        ]);
        $status = Menu::find($id_menu);
        $status->update([
            'nama_menu' => $request->nama_menu,
            'harga_menu' => $request->harga_menu,
            'kategori' => $request->kategori,
            'status' => $request->status,
        ]);
        if($status){
            return redirect('/Admin/Menu')->with('success', 'Menu Berhasil Diubah');
        }else{
            return redirect('/Admin/Menu')->with('error', 'Menu Gagal Diubah');
        }

    }
    //Menghapus Data Makanan
    public function destroy($id_menu){
        $status = Menu::find($id_menu);
        $status->delete();
        if($status){
            return redirect('/Admin/Menu')->with('success', 'Menu Berhasil Dihapus');
        }else{
            return redirect('/Admin/Menu')->with('error', 'Menu Gagal Dihapus');
        }
    }
}
