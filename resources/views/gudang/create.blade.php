@extends('template/dasaran1')
@section('inti_data')
<h1>Buat Data Gudang</h1>
<form action='{{url('/gudang')}}' method='post'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ route('gudang.index') }}" class="btn btn-secondary"><< kembali</a>
        <div class="mb-3 row">
            <label for="id_gudang" class="col-sm-2 col-form-label">ID Gudang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id_gudang' value="{{ Session::get('id_gudang')}}" id="id_gudang">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kota_gudang" class="col-sm-2 col-form-label">Pilihan</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name='kota_gudang' value="{{ Session::get('kota_gudang')}}" id="kota_gudang">
                    <option selected>Kota</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Semarang">Semarang</option>
                    <option value="Yogyakarta">Yogyakarta</option>
                    <option value="Surabaya">Surabaya</option>
                    <option value="Jambi">Jambi</option>
                </select>
            </div>
        </div>   
        <div class="mb-3 row">
            <label for="submit" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
            </div>
        </div>
    </div>
</form>
@endsection
