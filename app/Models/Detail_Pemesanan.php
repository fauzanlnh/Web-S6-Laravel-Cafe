<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Pemesanan extends Model
{
    use HasFactory;
    //
    protected $table = 'table_detail_pemesanan';
    public $primaryKey = 'id_detail';
    //$fillable digunakan untuk menentukan field yang mana saja yang akan di insert kedalam database
    protected $fillable = [
        'status_pemesanan', 'id_pemesanan', 'id_menu', 'jumlah_pesan'
    ];
    public function Menu(){
        return $this->hasOne('App\Models\Menu');
    }
}
