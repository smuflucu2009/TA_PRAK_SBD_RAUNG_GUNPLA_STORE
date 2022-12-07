@extends('template/dasaran1')
@section('inti_data')
<h1>Halaman Join</h1>
<p style="color: rgb(255, 255, 255);">
</p>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <table class="table table-striped text-center">
        <thead>
            <tr>
              <th>No</th>
              <th>Kota Cabang Terdekat</th>
              <th>Nama Gunpla</th>
              <th>Nama Pembeli</th>
              <th>Alamat Pembeli</th>
            </tr>
          </thead>
          <tbody>
              @php $no = 1; @endphp
              @foreach ($joins as $join)
                  <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $join->kota_gudang }}</td>
                        <td>{{ $join->nama_gunpla }}</td>
                        <td>{{ $join->nama_pembeli }}</td>
                        <td>{{ $join->alamat_pembeli }}</td>
                  </tr>
              @endforeach
          </tbody>
    </table>
</div>
@endsection
