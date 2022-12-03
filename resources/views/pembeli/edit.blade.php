@extends('template/dasaran1')
@section('inti_data')
<h1>Edit Data Pembeli</h1>
<form action='{{url('pembeli/'.$data->id_pembeli)}}' method='post'>
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{url('/pembeli')}}" class="btn btn-secondary"><< kembali</a>
        <div class="mb-3 row">
            <label for="id_pembeli" class="col-sm-2 col-form-label">ID Pembeli</label>
            <div class="col-sm-10">
                {{ $data->id_pembeli}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama_pembeli" class="col-sm-2 col-form-label">Nama Pembeli</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_pembeli' value="{{ $data->nama_pembeli }}" id="nama_pembeli">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat_pembeli" class="col-sm-2 col-form-label">Alamat Pembeli</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alamat_pembeli' value="{{ $data->alamat_pembeli }}" id="alamat_pembeli">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="biaya" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
            </div>
        </div>
    </div>
</form>

<!-- AKHIR FORM -->
@endsection
