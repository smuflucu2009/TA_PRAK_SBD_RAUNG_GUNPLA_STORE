@extends('template/dasaran1')
@section('inti_data')
<h1>Halaman Gunpla</h1>
<p style="color: rgb(255, 255, 255);">
Halaman berisi list Gunpla.
</p>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="pb-3">
	    <form action={{ route('gunpla.cari') }} method="GET" >
		<input type="search" name="carigunpla" placeholder="Cari gunpla .." value="{{ Request::get('carigunpla')}}">
		<button class="btn btn-primary" type="submit">cari </button>
	    </form>
    </div>
    <div class="d-flex justify-content-between">
        <a href="{{ route('gunpla.create') }}" class="btn btn-primary">+++</a>
        <a href="{{ route('gunpla.sampah') }}" class="btn btn-info">Recycle Bin</a>
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
                        <form onsubmit="return confirm('Yakin ingin menghapus permanen data ini?')" class="d-inline" action="{{ url('gunpla/'.$item->id_gunpla) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Hard Del</button>
                        </form>
                        <form onsubmit="return confirm('Yakin ingin menghapus sementara data ini?')" class="d-inline" method="POST" action="{{ route('gunpla.softdelete', $item->id_gunpla) }}">
                            @csrf
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Soft Del</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> 
@endsection