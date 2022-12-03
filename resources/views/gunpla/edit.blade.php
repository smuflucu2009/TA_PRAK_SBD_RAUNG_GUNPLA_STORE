@extends('template/dasaran1')
@section('inti_data')
<h1 style="color: rgb(255, 255, 255);">Edit Data Gundam</h1>
<h3 style="color: rgb(3, 52, 117);">Petunjuk ID Gunpla</h3>
<label style="color: rgb(243, 247, 9);">
    HG = AXXX, 
</label>
<label style="color: rgb(243, 247, 9);">
    MG = BXXX, 
</label>
<label style="color: rgb(243, 247, 9);">
    RG = CXXX, 
</label>
<label style="color: rgb(243, 247, 9);">
    PG = DXXX.
</label>
<form action='{{url('gunpla/'.$data->id_gunpla)}}' method='post'>
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{url('/gunpla')}}" class="btn btn-secondary"><< kembali</a>
        <div class="mb-3 row">
            <label for="id_gunpla" class="col-sm-2 col-form-label">ID Gunpla</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id_gunpla' value="{{ $data->id_gunpla }}" id="id_gunpla">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama_gunpla" class="col-sm-2 col-form-label">Nama Gunpla</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_gunpla' value="{{ $data->nama_gunpla }}" id="nama_gunpla">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="grade" class="col-sm-2 col-form-label">Grade</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name='grade' value="{{ $data->grade }}" id="grade">
                    <option selected>Gunpla</option>
                    <option value="HG">HG</option>
                    <option value="MG">MG</option>
                    <option value="RG">RG</option>
                    <option value="PG">PG</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="harga" class="col-sm-2 col-form-label">Harga Gunpla</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='harga' value="{{ $data->harga }}" id="harga">
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
