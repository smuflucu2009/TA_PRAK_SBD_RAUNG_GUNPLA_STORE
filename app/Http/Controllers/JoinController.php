<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JoinController extends Controller
{
    function index() {
        return view('join.index');
    }

    public function join(){
        $joins = DB::table('join')
        ->join('gunpla', 'join.id_gunpla', '=', 'gunpla.id_gunpla')
        ->join('pembeli', 'join.id_pembeli', '=', 'pembeli.id_pembeli')
        ->join('gudang', 'join.id_gudang', '=', 'gudang.id_gudang')
        ->select('gudang.kota_gudang', 'gunpla.nama_gunpla', 'pembeli.nama_pembeli', 'pembeli.alamat_pembeli')
        ->get();

        return view('join.index')->with('joins', $joins);
    }
}
