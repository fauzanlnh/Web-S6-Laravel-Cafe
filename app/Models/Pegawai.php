<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    //$primaryKey untuk menentukan primary key pada tabel
    public $primaryKey = 'kd_pegawai';
    //$table untuk menentukan nama tabel
    protected $table = 'table_pegawai';
    //$fillable digunakan untuk menentukan field yang mana saja yang akan di insert kedalam database
    protected $fillable = [
        'nama_pegawai', 'notlp_pegawai', 'almt_pegawai', 'kd_penguna'
    ];
}
