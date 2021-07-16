<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;
    public $primaryKey = 'kd_pengguna';
    //$table untuk menentukan nama tabel
    protected $table = 'table_master';
    protected $fillable = [
        'username', 'password', 'hak_akses'
    ];
}
