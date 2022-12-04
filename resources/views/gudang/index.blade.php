@extends('template/dasaran1')
@section('inti_data')
<h1>Halaman Gudang</h1>
<p style="color: rgb(255, 255, 255);">
Halaman berisi list Gudang, Rencananya sih gitu
</p>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th class="col-md-1">ID Gudang</th>
                <th class="col-md-1">Kota Gudang</th>
                <th class="col-md-1">Nama Gundam</th>
                <th class="col-md-1">Nama Pembeli</th>
                <th class="col-md-1">Alamat Pembeli</th>
                <th class="col-md-1">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gudang as $item)
                <tr>
                    <td>{{ $item->id_gudang}}</td>
                    <td>{{ $item->kota_gudang}}</td>
                    <td>
                        @foreach ($item->gunpla as $data)
                            {{$data->nama_gunpla}}
                        @endforeach</td>
                    <td>
                        @foreach ($item->pembeli as $data)
                            {{$data->nama_pembeli}}
                            {{$data->alamat_pembeli}}
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> 
@endsection