<?php

namespace App\Http\Controllers;
use App\Models\Pembeli;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index() {
        $data = DB::select('SELECT * FROM pembeli where deleted_at is null');
        return view('pembeli.index')
        ->with('data', $data);
    }

    public function cariPembeli(Request $request) {
        $caripembeli = $request->caripembeli;

        $data = DB::table('pembeli')
        ->where('id_pembeli', 'like', "%$caripembeli%")
        ->orWhere('nama_pembeli', 'like', "%$caripembeli%")
        ->orWhere('alamat_pembeli', 'like', "%$caripembeli%")
        ->get();

        return view('pembeli.index')
            ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembeli.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('id_pembeli', $request->id_pembeli);
        Session::flash('nama_pembeli', $request->nama_pembeli);
        Session::flash('alamat_pembeli', $request->alamat_pembeli);

        $request->validate([
            'id_pembeli' => 'required|numeric|unique:Pembeli,id_pembeli',
            'nama_pembeli' => 'required',
            'alamat_pembeli' => 'required',
        ], [
            'id_pembeli.required' => 'ID pembeli wajib diisi',
            'id_pembeli.numeric' => 'ID pembeli wajib berupa angka',
            'id_pembeli.unique' => 'ID pembeli sudah ada',
            'nama_pembeli.required' => 'Nama pembeli wajib diisi',
            'alamat_pembeli.required' => 'Nama pengarang buku wajib diisi',

        ]);
        DB::insert('INSERT INTO pembeli(id_pembeli, nama_pembeli, alamat_pembeli) VALUES (:id_pembeli, :nama_pembeli, :alamat_pembeli)',
        [
            'id_pembeli' => $request->id_pembeli,
            'nama_pembeli' => $request->nama_pembeli,
            'alamat_pembeli' => $request->alamat_pembeli,
        ]
        );
        return redirect()->to('/pembeli')->with('success', 'Berhasil menambahkan data Pembeli');
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
        $data = DB::table('pembeli')->where('id_pembeli', $id)->first();
        return view('Pembeli.edit')->with('data', $data);
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
            'nama_pembeli' => 'required',
            'alamat_pembeli' => 'required',
        ], [
            'nama_pembeli.required' => 'Nama pembeli wajib diisi',
            'alamat_pembeli.required' => 'Alamat pembeli wajib diisi',
        ]);
        DB::update('UPDATE pembeli SET nama_pembeli = :nama_pembeli, alamat_pembeli = :alamat_pembeli WHERE id_pembeli = :id',
        [
            'id' => $id,
            'nama_pembeli' => $request->nama_pembeli,
            'alamat_pembeli' => $request->alamat_pembeli,
        ]
        );
        return redirect()->to('/pembeli')->with('success', 'Berhasil update data pembeli');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('DELETE FROM pembeli WHERE id_pembeli = :id_pembeli', ['id_pembeli' => $id]);
        return redirect()->route('pembeli.index')->with('success', 'Berhasil hapus data pembeli secara permanen');
    }

    public function softDelete($id) {
        DB::update('UPDATE pembeli SET deleted_at = now() WHERE id_pembeli = :id_pembeli', ['id_pembeli' => $id]);
        return redirect()->route('pembeli.index')->with('success', 'Berhasil hapus data pembeli secara sementara');
    }

    public function restore($id){
        DB::update('UPDATE pembeli SET deleted_at = null WHERE id_pembeli = :id_pembeli', ['id_pembeli' => $id]);
        return redirect()->route('pembeli.index')->with('success', 'Data pembeli telah dikembalikan');
    }

    public function Pembelisampah() {
        $data = DB::select('SELECT * FROM pembeli where deleted_at is not null');
        return view('pembeli.sampah')
        ->with('data', $data);
    }
}
