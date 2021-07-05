@extends('layouts.layout')

@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/banner/fabricacion.jpg') }});" data-aos="fade">
    <div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-5 mx-auto mt-lg-5 text-center">
        <h1>Bienvenido</h1>
        <p class="mb-5"><strong class="text-white">reset clave.</strong></p>
        
        </div>
    </div>
    </div>

    <!-- <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a> -->
</div> 

<section class="blog-section spad" id="blog">

<div class="container">
<br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">Reestablecer password</div> -->

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Correo electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Clave</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar clave</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Restablecer clave
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</section>
@endsection
