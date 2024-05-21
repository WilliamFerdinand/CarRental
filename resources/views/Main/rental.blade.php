
@extends('layouts.app',['activePage' => 'buatrental', 'title' => 'Aplikasi reservasi mobil'])
@section('content')
    <div class="container py-5">
        <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1>Rental Mobil</h1>
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        @php
        $value = session('id');
        $hargatotal =""
         @endphp
        <form action="{{route('addrental1')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label hidden>ID User<span class="text-danger" hidden>*</span></label>
                <input class="form-control " type="text" name="idUser" value="{{ $value }}" hidden/>
            </div>
            <div class="mb-3">
            <label for="Mobil">Mobil<span class="text-danger">*</span></label>
            <select name=idMobil class="form-control" required>   
            <option value="">Pilih Mobil </option>
            @foreach ($mobiltersedia as $item)
            <option value="{{$item->idMobil}}">{{$item->namaMobil}} | {{$item->merek}} | {{$item->model}} | {{$item->jenis}} | {{$item->harga}}</option>
            @endforeach
            </select>
            </div>
            <div class="mb-3">
                <label>Tanggal Mulai <span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="tanggalMulai" value="{{ old('tanggalMulai') }}"/>
            </div>
            <div class="mb-3">
                <label>Tanggal Selesai<span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="tanggalSelesai" value="{{ old('tanggalSelesai') }}"/>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Rental Mobil </button>
            </div>
    </div>
</form>
</div>
</body>

</html>
@endsection
