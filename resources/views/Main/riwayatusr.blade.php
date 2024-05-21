@extends('layouts.app',['activePage' => 'riwayatusr', 'title' => 'Aplikasi reservasi mobil'])
@section('content')
    <div class="w-800 center border rounded px-3 py-3 mt-3">
    <h2>Riwayat Transaksi Berjalan</h2>
    <div class="ml-2">
    </div>

<div class="row mt-4">
    <table class="table table-dark table-hover table-condensed">
      <thead>
        <tr>
          <th><strong>No</strong></th>
          <th><strong>ID Peminjamman</strong></th>
          <th><strong>ID User</strong></th>
          <th><strong>ID Mobil</strong></th>
          <th><strong>Tanggal Mulai</strong></th>
          <th><strong>Tanggal Selesai</strong></th>
          <th><strong>Status</strong></th>
        </tr>
      </thead>
      <tbody>
        @foreach($riwayat as $key => $data)
            <tr>
                <th>{{ $data->idTransaksi}}</th> <br>
                <th>{{ $data->idPeminjamman}}</th> <br>
                <th>{{ $data->idUser}}</th> <br>
                <th>{{ $data->idMobil}}</th> <br>
                <th>{{ $data->tanggalSewa}}</th>
                <th>{{ $data->tanggalKembali}}</th>
                <th>{{ $data->status}}</th>
            </tr>
        @endforeach
      </tbody>
    </table>
</div>
  </div>
</div>
@endsection