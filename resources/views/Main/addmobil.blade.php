@extends('layouts/app',['activePage' => 'mobil','title' => 'Aplikasi reservasi mobil'])
@section('content')
    <div class="container py-5 ">
        <div class="w-50 center border rounded px-3 py-3 mx-auto bg-dark-subtle">
        <h1>Add Mobil</h1>
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('addmobil.action') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Name <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}" />
            </div>
            <div class="mb-3">
                <label>Merek<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="merk" value="{{ old('merk') }}" />
            </div>
            <div class="mb-3">
                <label>Model<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="model" value="{{ old('model') }}"/>
            </div>
            <div class="mb-3">
                <label>Jenis<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="jenis" value="{{ old('jenis') }}"/>
            </div>
            <div class="mb-3">
                <label>No Plat<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="noplat" value="{{ old('noplat') }}" />
            </div>
            <div class="mb-3">
                <label>Harga<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="harga" value="{{ old('harga') }}" />
            </div>
            <div class="mb-3">
                <a class="btn btn-danger" href="{{ route('mobil') }}">Back</a>
                <button class="btn btn-primary">Tambah Baru</button>
            </div>
        </form>
    </div>
</div>
</body></html>
@endsection
