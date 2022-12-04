<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;
    protected $table = "pembeli";
    protected $fillable = ['id_pembeli', 'nama_pembeli', 'alamat_pembeli'];
    public $timestamps = false;

}
