<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gunpla extends Model
{
    use HasFactory;
    protected $table = "gunpla";
    protected $fillable = ['id_gunpla', 'nama_gunpla', 'grade', 'harga'];
    public $timestamps = false;
}
