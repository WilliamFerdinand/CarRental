@extends('layouts/app',['activePage' => 'pengembalianaction', 'title' => 'Aplikasi reservasi mobil'])
@section('content')
    <div class="container py-5">
        <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1>Selesaikan Transaksi</h1>
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="/PengembalianAction/{{$peminjamman -> idPeminjamman}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <div class="mb-3">
                <label>Id Peminjamman <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="idPeminjamman" value="{{ $peminjamman -> idPeminjamman}}" readonly/>
            </div>
            <div class="mb-3">
                <label>ID User<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="idUser" value="{{ $peminjamman -> idUser}}" readonly/>
            </div>
            <div class="mb-3">
                <label>ID Mobil<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="idMobil" value="{{ $peminjamman -> idMobil}}" readonly/>
            </div>
            <div class="mb-3">
                <label>Tanggal Sewa<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="tanggalSewa" value="{{ $peminjamman -> tanggalMulai }}" readonly/>
            </div>
            <div class="mb-3">
                <label>Tanggal Selesai<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="tanggalKembali" value="{{ $peminjamman -> tanggalSelesai}}" readonly/>
            </div>
            <div class="mb-3">
                <label>Harga<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="harga" value="{{ $peminjamman -> totalHarga}}" readonly/>
            </div>
            <div class="mb-3">
                <a class="btn btn-danger" href="{{ route('pengembalian') }}">Back</a>
                <button class="btn btn-primary">Selesaikan Transaksi</button>
            </div>
        </form>
    </div>
</div>
</body></html>
@endsection
