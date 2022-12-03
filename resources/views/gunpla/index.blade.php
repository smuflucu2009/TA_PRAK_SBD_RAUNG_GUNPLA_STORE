@extends('template/dasaran1')
@section('inti_data')
<h1>Halaman Gunpla</h1>
<p style="color: rgb(255, 255, 255);">
Halaman berisi list Gunpla.
</p>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="pb-3">
        <form class="d-flex" action="{{url('/gunpla')}}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
    <div class="d-flex justify-content-between">
        <a href="{{ url('/gunpla-add')}}" class="btn btn-primary">+++</a>
        <a href="#" class="btn btn-info">Sampah Masyarakat</a>
    </div>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th class="col-md-1">ID Gunpla</th>
                <th class="col-md-1">Nama Gunpla</th>
                <th class="col-md-1">Grade Gunpla</th>
                <th class="col-md-1">Harga Gunpla</th>
                <th class="col-md-1">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id_gunpla}}</td>
                    <td>{{ $item->nama_gunpla}}</td>
                    <td>{{ $item->grade}}</td>
                    <td>{{ $item->harga}}</td>
                    <td>
                        <a href='{{ url('gunpla/'.$item->id_gunpla.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                        <a href='#' class="btn btn-danger btn-sm">Hapus Empuk</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->withQueryString()->links() }}
</div> 
@endsection