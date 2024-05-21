@extends('layouts/app', ['activePage' => 'register', 'title' => 'Aplikasi reservasi mobil'])

@section('content')
    <div class="full-page register-page section-image" data-color="black">
        <div class="content">
            <div class="container py-5">
                <div class="w-50 center border rounded px-3 py-3 mx-auto bg-light">
                <h1>Register</h1>
                @if($errors->any())
                @foreach($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
                @endif
                <form action="{{ route('register.action') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name" value="{{ old('name') }}" />
                    </div>
                    <div class="mb-3">
                        <label>Email<span class="text-danger">*</span></label>
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" />
                    </div>
                    <div class="mb-3">
                        <label>Password <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="password" />
                    </div>
                    <div class="mb-3">
                        <label>Password Confirmation<span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="password_confirm" />
                    </div>
                    <div class="mb-3">
                        <label>No HP<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="noHP" value="{{ old('noHP') }}" />
                    </div>
                    <div class="mb-3">
                        <label>No SIM<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="noSIM" value="{{ old('noSIM') }}" />
                    </div>
                    <div class="mb-3">
                        <a class="btn btn-danger" href="{{ route('login') }}">Back</a>
                        <button class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
                            </div>
                            <div class="col">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-warning alert-dismissible fade show" >
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>
                                        {{ $error }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();

            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
    </script>
@endpush