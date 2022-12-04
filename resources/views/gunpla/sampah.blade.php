@extends('template/dasaran1')
@section('inti_data')
<h1>Sampah Data Gunpla</h1>
<p style="color: rgb(255, 255, 255);">
Halaman berisi sampah - sampah data Gunpla.
</p>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{url('/gunpla')}}" type="button" class="btn btn-secondary"><< kembali</a>
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
                        <a href="{{ route('gunpla.restore', $item->id_gunpla) }}" class="btn btn-primary btn-sm">Restore</a>
                        <form onsubmit="return confirm('Yakin ingin menghapus permanen data ini?')" class="d-inline" action="{{ url('gunpla/'.$item->id_gunpla) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">H.Del</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection