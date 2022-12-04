<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Gudang extends Model
{
    use HasFactory;
    protected $table = "gudang";
    protected $fillable = ['id_gudang', 'kota_gudang'];
    public $timestamps = false;
}
