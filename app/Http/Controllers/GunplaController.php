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
    function index(Request $request) {
        // $data = Gunpla::orderby('id_gunpla', 'desc')->paginate(4);
        // return view('gunpla/index')->with('data', $data);
        $katakunci = $request->katakunci;
        $jumlahbaris = 3;
        if (strlen($katakunci)) {
            $data = DB::table('gunpla')->where('id_gunpla', 'like', "%$katakunci%")
            ->orWhere('nama_gunpla', 'like', "%$katakunci%")
            ->orWhere('grade', 'like', "%$katakunci%")
            ->orWhere('harga', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        }else{
            $data = DB::table('gunpla')->orderBy('id_gunpla', 'desc')->paginate(3);
        }
        return view('gunpla/index')->with('data', $data);
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
        return redirect()->to('/gunpla')->with('success', 'Berhasil menambahkan data Pembeli');
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
        return view('Gunpla.edit')->with('data', $data);
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
        DB::update('UPDATE gunpla SET id_gunpla = :id_gunpla, nama_gunpla = :nama_gunpla, grade = :grade, harga = :harga WHERE id_gunpla = :id',
        [
            'id' => $id,
            'id_gunpla' => $request->id_gunpla,
            'nama_gunpla' => $request->nama_gunpla,
            'grade' => $request->grade,
            'harga' => $request->harga,
        ]
        );
        return redirect()->to('/gunpla')->with('success', 'Berhasil update data gunpla');
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

