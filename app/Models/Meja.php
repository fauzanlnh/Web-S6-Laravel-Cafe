<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;
    public $primaryKey = 'no_meja';
    //$table untuk menentukan nama tabel
    protected $table = 'table_meja';
    //$fillable digunakan untuk menentukan field yang mana saja yang akan di insert kedalam database
    
    
}
