@extends('template/dasaran1')
@section('inti_data')
<h1>Halaman Pembeli</h1>
<p style="color: rgb(255, 255, 255);">
Halaman berisi list Pembeli.
</p>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="pb-3">
        <form class="d-flex" action="{{url('/pembeli')}}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
    <div class="d-flex justify-content-between">
        <a href="{{ url('/pembeli-add')}}" class="btn btn-primary">+++</a>
        <a href="#" class="btn btn-info">Sampah Masyarakat</a>
    </div>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-1">ID Pembeli</th>
                <th class="col-md-1">Nama Pembeli</th>
                <th class="col-md-1">Alamat Pembeli</th>
                <th class="col-md-1">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($data as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->id_pembeli}}</td>
                    <td>{{ $item->nama_pembeli}}</td>
                    <td>{{ $item->alamat_pembeli}}</td>
                    <td>
                        <a href='{{ url('pembeli/'.$item->id_pembeli.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                        <a href='#' class="btn btn-danger btn-sm">Hapus Empuk</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->withQueryString()->links() }}
</div> 
@endsection