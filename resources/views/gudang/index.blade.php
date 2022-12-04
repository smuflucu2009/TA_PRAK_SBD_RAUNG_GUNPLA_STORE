@extends('template/dasaran1')
@section('inti_data')
<h1>Halaman Gudang</h1>
<p style="color: rgb(255, 255, 255);">
Halaman berisi list Gudang, Rencananya sih gitu
</p>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="d-flex justify-content-between">
        <a href="{{ route('gudang.create') }}" class="btn btn-primary">+++</a>
    </div>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th class="col-md-1">ID Gudang</th>
                <th class="col-md-1">Kota</th>
                <th class="col-md-1">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id_gudang}}</td>
                    <td>{{ $item->kota_gudang}}</td>
                    <td>
                        <a href='{{ url('gudang/'.$item->id_gudang.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
