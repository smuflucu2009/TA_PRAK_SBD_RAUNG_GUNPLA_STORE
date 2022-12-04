@extends('template/dasaran1')
@section('inti_data')
<h1>Sampah Data Gunpla</h1>
<p style="color: rgb(255, 255, 255);">
Halaman berisi sampah - sampah data Gunpla.
</p>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href="{{url('/pembeli')}}" type="button" class="btn btn-secondary"><< kembali</a>
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
                        <a href="{{ route('pembeli.restore', $item->id_pembeli) }}" class="btn btn-primary">Restore</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection