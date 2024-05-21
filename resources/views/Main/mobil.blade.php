@extends('layouts/app',['activePage' => 'mobil', 'title' => 'Aplikasi reservasi mobil'])
@section('content')
    <div class="w-800 center border rounded px-3 py-3 mt-3">
    <h1>List Mobil</h1>
    <div class="ml-2">
        <a class="btn btn-primary" href="{{ route('addmobil') }}">Tambah</a>
    </div>
<div class="row mt-2 ml-2 mr-1">
    <table class="table table-dark table-hover table-condensed">
      <thead>
        <tr>
          <th><strong>No</strong></th>
          <th><strong>Nama Mobil</strong></th>
          <th><strong>Merek</strong></th>
          <th><strong>Model</strong></th>
          <th><strong>Jenis</strong></th>
          <th><strong>No Plat</strong></th>
          <th><strong>Harga</strong></th>
          <th><strong>Status</strong></th>
        </tr>
      </thead>
      <tbody>
        @foreach($mobil as $key => $data)
            <tr>
                <th>{{ $data->idMobil}}</th> <br>
                <th>{{ $data->namaMobil}}</th> <br>
                <th>{{ $data->merek}}</th> <br>
                <th>{{ $data->model}}</th>
                <th>{{ $data->jenis}}</th>
                <th>{{ $data->noPlat}}</th>
                <th>{{ $data->harga}}</th>
                <th>{{ $data->status}}</th>
            </tr>
        @endforeach
      </tbody>
    </table>
</div>
  </div>
</div>
@endsection