<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    //$table untuk menentukan nama tabel
    protected $table = 'table_pemesanan';
    public $primaryKey = 'id_pemesanan';
    //$fillable digunakan untuk menentukan field yang mana saja yang akan di insert kedalam database
    protected $fillable = [
        'tanggal_pemesanan', 'no_meja', 'status_pembayaran', 'total_pembayaran'
    ];
}
