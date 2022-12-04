@extends('template/dasaran1')
@section('inti_data')
<h1>Halaman Pembeli</h1>
<p style="color: rgb(255, 255, 255);">
Halaman berisi list Pembeli.
</p>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="pb-3">
	    <form action={{ route('pembeli.cari') }} method="GET" >
		<input type="search" name="caripembeli" placeholder="Cari pembeli euy .." value="{{ Request::get('caripembeli')}}">
		<button class="btn btn-primary" type="submit">cari </button>
	    </form>
    </div>
    <div class="d-flex justify-content-between">
        <a href="{{ route('pembeli.create') }}" class="btn btn-primary">+++</a>
        <a href="{{ route('pembeli.sampah') }}" class="btn btn-info">Recycle Bin</a>
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
                        <form onsubmit="return confirm('Yakin ingin menghapus sementara data ini?')" class="d-inline" method="POST" action="{{ route('pembeli.softdelete', $item->id_pembeli) }}">
                            @csrf
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">S.Del</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> 
@endsection