@extends('layouts/app',['activePage' => 'pengembalian', 'title' => 'Aplikasi reservasi mobil'])
@section('content')
    <div class="w-800 center border rounded px-3 py-3 mt-3">
    <h1>Transaksi Berlangsung</h1>
    <div class="ml-2">
    </div>

<div class="row mt-2 ml-2 mr-1">
    <table class="table table-dark table-hover table-condensed">
      <thead>
        <tr>
          <th><strong>No</strong></th>
          <th><strong>ID User</strong></th>
          <th><strong>ID Mobil</strong></th>
          <th><strong>Tanggal Mulai</strong></th>
          <th><strong>Tanggal Selesai</strong></th>
          <th><strong>Total Harga</strong></th>
          <th><strong>Status</strong></th>
          <th><strong>Action</strong></th>
        </tr>
      </thead>
      <tbody>
        @foreach($pengembalian as $key => $data)
            <tr>
                <th>{{ $data->idPeminjamman}}</th> <br>
                <th>{{ $data->idUser}}</th> <br>
                <th>{{ $data->idMobil}}</th> <br>
                <th>{{ $data->tanggalMulai}}</th>
                <th>{{ $data->tanggalSelesai}}</th>
                <th>{{ $data->totalHarga}}</th>
                <th>{{ $data->status}}</th>
                <th><a class="btn btn-primary" href="/pengembalianAction2/{{$data->idPeminjamman}}">Selesaikan</a></th>
            </tr>
        @endforeach
      </tbody>
    </table>
</div>
  </div>
</div>
@endsection