@extends('layouts.layoutSidebar')

@section('content')

@section('banner')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/novedades/newsletter-novedades.jpg') }});" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5 mx-auto mt-lg-5 text-center">
                <h1>Usuario</h1>
                <p class="mb-5"><strong class="text-white">Inactivar usuario</strong></p>
        
            </div>
        </div>
    </div>

    <!-- <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a> -->
</div> 

@endsection

<div class="container">
<br>
    <div class="row justify-content-center">
        <div class="card-body">
            <form method="POST" action="{{ route('user.inactive') }}" >
                @csrf
                <input type="hidden" name="hIdUser" name="hIdUser" value="{{ $user->id }}">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                    <div class="col-md-6">
                        <input disabled id="name" type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                </div>

                <!-- Apellido -->
                <div class="form-group row">
                    <label for="lastName" class="col-md-4 col-form-label text-md-right">Apellido</label>

                    <div class="col-md-6">
                        <input disabled id="lastName" name="lastName" type="text" class="form-control" value="{{ $user->lastName }}" >
                    </div>
                </div>

                <!-- Direccion del cilente -->
                <div class="form-group row">
                    <label for="cause" class="col-md-4 col-form-label text-md-right">Motivo de desactivación</label>

                    <div class="col-md-6">
                        <textarea class="form-control" id="cause" name="cause" rows="3">{{ old('cause') }}</textarea>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
