<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    //$primaryKey untuk menentukan primary key pada tabel
    public $primaryKey = 'id_menu';
    //$table untuk menentukan nama tabel
    protected $table = 'table_menu';
    //$fillable digunakan untuk menentukan field yang mana saja yang akan di insert kedalam database
    protected $fillable = [
        'nama_menu', 'harga_menu', 'kategori', 'status'
    ];
    public function Detail_Pemesanan(){
        return $this->hasMany('App\Models\Detail_Pemesanan');
    }
}
