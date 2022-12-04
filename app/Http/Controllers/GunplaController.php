<?php

namespace App\Http\Controllers;

use App\Models\Gunpla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class GunplaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index() {
        $data = DB::select('SELECT * FROM gunpla where deleted_at is null');
        return view('gunpla.index')
        ->with('data', $data);
        
    }

    public function cariGunpla(Request $request) {
        $carigunpla = $request->carigunpla;

        $data = DB::table('gunpla')
        ->where('id_gunpla', 'like', "%$carigunpla%")
        ->orWhere('nama_gunpla', 'like', "%$carigunpla%")
        ->orWhere('grade', 'like', "%$carigunpla%")
        ->orWhere('harga', 'like', "%$carigunpla%")
        ->get();

        return view('gunpla.index')
            ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gunpla.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('id_gunpla', $request->id_pembeli);
        Session::flash('nama_gunpla', $request->nama_gunpla);
        Session::flash('grade', $request->grade);
        Session::flash('harga', $request->harga);

        $request->validate([
            'id_gunpla' => 'required|unique:Gunpla,id_gunpla',
            'nama_gunpla' => 'required',
            'grade' => 'required',
            'harga' => 'required',
        ], [
            'id_gunpla.required' => 'ID gunpla wajib diisi',
            'id_gunpla.unique' => 'ID gunpla sudah ada',
            'nama_gunpla.required' => 'Nama gunpla wajib diisi',
            'grade.required' => 'Grade gunpla wajib diisi',
            'harga.required' => 'Harga gunpla wajib diisi',
        ]);
        DB::insert('INSERT INTO gunpla(id_gunpla, nama_gunpla, grade, harga) VALUES (:id_gunpla, :nama_gunpla, :grade, :harga)',
        [
            'id_gunpla' => $request->id_gunpla,
            'nama_gunpla' => $request->nama_gunpla,
            'grade' => $request->grade,
            'harga' => $request->harga,
        ]
        );
        return redirect()->route('gunpla.index')->with('success', 'Berhasil menambahkan data gunpla');
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
    public function edit($id)
    {
        $data = DB::table('gunpla')->where('id_gunpla', $id)->first();
        return view('gunpla.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_gunpla' => 'required',
            'nama_gunpla' => 'required',
            'grade' => 'required',
            'harga' => 'required',
        ], [
            'id_gunpla.required' => 'ID gunpla wajib diisi',
            'nama_gunpla.required' => 'Nama gunpla wajib diisi',
            'grade.required' => 'Grade gunpla wajib diisi',
            'harga.required' => 'Harga gunpla wajib diisi',
        ]);
        DB::update('UPDATE gunpla SET id_gunpla = :id_gunpla, nama_gunpla = :nama_gunpla, grade = :grade, harga = :harga WHERE id_gunpla = :id',
        [
            'id' => $id,
            'id_gunpla' => $request->id_gunpla,
            'nama_gunpla' => $request->nama_gunpla,
            'grade' => $request->grade,
            'harga' => $request->harga,
        ]
        );
        return redirect()->route('gunpla.index')->with('success', 'Berhasil update data gunpla');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('DELETE FROM gunpla WHERE id_gunpla = :id_gunpla', ['id_gunpla' => $id]);
        return redirect()->route('gunpla.index')->with('success', 'Berhasil hapus data gunpla secara permanen');
    }

    public function softDelete($id) {
        DB::update('UPDATE gunpla SET deleted_at = now() WHERE id_gunpla = :id_gunpla', ['id_gunpla' => $id]);
        return redirect()->route('gunpla.index')->with('success', 'Berhasil hapus data gunpla secara sementara');
    }

    public function restore($id){
        // DB::table('pelanggan')->update(['is_deleted' => 0]);
        DB::update('UPDATE gunpla SET deleted_at = null WHERE id_gunpla = :id_gunpla', ['id_gunpla' => $id]);
        return redirect()->route('gunpla.index')->with('success', 'Data gunpla telah dikembalikan');
    }

    public function Gunplasampah() {
        $data = DB::select('SELECT * FROM gunpla where deleted_at is not null');
        return view('gunpla.sampah')
        ->with('data', $data);
    }
}

