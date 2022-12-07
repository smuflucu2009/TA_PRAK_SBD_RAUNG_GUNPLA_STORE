<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = DB::select('SELECT * FROM gudang where deleted_at is null');
        return view('gudang.index')
        ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gudang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('id_gudang', $request->id_gudang);
        Session::flash('kota_gudang', $request->kota_gudang);

        $request->validate([
            'id_gudang' => 'required|unique:Gudang,id_gudang',
            'kota_gudang' => 'required',
        ], [
            'id_gudang.required' => 'ID gudang wajib diisi',
            'id_gudang.unique' => 'ID gudang sudah ada',
            'kota_gudang.required' => 'Nama kota wajib diisi',
        ]);
        DB::insert('INSERT INTO gudang(id_gudang, kota_gudang) VALUES (:id_gudang, :kota_gudang)',
        [
            'id_gudang' => $request->id_gudang,
            'kota_gudang' => $request->kota_gudang,
        ]
        );
        return redirect()->route('gudang.index')->with('success', 'Berhasil menambahkan data gudang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data = DB::table('gudang')->where('id_gudang', $id)->first();
        return view('gudang.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request) {
        $request->validate([
            'id_gudang' => 'required',
            'kota_gudang' => 'required',
        ], [
            'id_gudang.required' => 'ID gudang wajib diisi',
            'kota_gudang.required' => 'Nama kota wajib diisi',
        ]);
        DB::update('UPDATE gudang SET id_gudang = :id_gudang, kota_gudang = :kota_gudang WHERE id_gudang = :id',
        [
            'id' => $id,
            'id_gudang' => $request->id_gudang,
            'kota_gudang' => $request->kota_gudang,
        ]
        );
        return redirect()->route('gudang.index')->with('success', 'Berhasil update data gudang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
