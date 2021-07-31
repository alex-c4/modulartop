@extends('layouts.layoutSidebar')

@section('header')
    <link rel="stylesheet" href="{{ asset('/css/user-register.css') }}?v={{ env('APP_VERSION', '1') }}">
@endsection

@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Informacion
@endsection

@section('subtitle')
Información registrada del usuario
@endsection


<section class="blog-section spad" id="blog">

        <div class="container">
        <br>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-body">
                            <form method="POST" id="formEditUser" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                                @csrf
                                <!-- Nombre -->
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                                    <div class="col-md-6">
                                        <input disabled id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autofocus>
                                    </div>
                                </div>

                                <!-- Apellido -->
                                <div class="form-group row">
                                    <label for="lastName" class="col-md-4 col-form-label text-md-right">Apellido</label>

                                    <div class="col-md-6">
                                        <input disabled id="lastName" name="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" value="{{ $user->lastName }}" required>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Correo electrónico</label>

                                    <div class="col-md-6">
                                        <input disabled id="email" disabled type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group row" style="display: flex; justify-content: center;">
                                    <div class="text-center">
                                        <img src="{{ asset('images/customers_logos/avatars') }}/{{ $user->avatar }}" width="100px" class="rounded" alt="...">
                                    </div>
                                </div>

                                <!-- Telefono del cliente -->
                                <div class="form-group row">
                                    <label for="clientPhone" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                                    <div class="col-md-6">
                                        <input disabled id="clientPhone" type="number" class="form-control" name="clientPhone" value="{{ $user->phone }}">
                                    </div>
                                </div>

                                <!-- Direccion del cilente -->
                                <div class="form-group row">
                                    <label for="clientAddress" class="col-md-4 col-form-label text-md-right">Dirección</label>

                                    <div class="col-md-6">
                                        <textarea disabled class="form-control" id="clientAddress" name="clientAddress" rows="3">{{ $user->address }}</textarea>
                                    </div>
                                </div>

                                <!-- Es cliente -->
                                <div class="form-group row">
                                    <div class="col-md-4 text-md-right">
                                        <label class="form-check-label" for="chkClient">Cliente</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input disabled type="checkbox" @if($isCompanyClient == true) checked @endif class="form-check-input" id="chkClient" name="chkClient">
                                        </div>
                                    </div>
                                </div>

                                <!-- contenedor cliente -->
                                <div class="container-hidden" id="divContainer">

                                    <!-- RIF -->
                                    <div class="form-group row">

                                        <label for="rif" class="col-md-4 col-form-label text-md-right">Rif</label>

                                        <div class="col-md-6">
                                            <input disabled id="rif" type="text" class="form-control @error('rif') is-invalid @enderror uppercase-field" name="rif" value="{{ $user->rif }}" >
                                        </div>
                                    </div>

                                    <!-- Razon social -->
                                    <div class="form-group row">

                                        <label for="rsocial" class="col-md-4 col-form-label text-md-right">Razón social</label>

                                        <div class="col-md-6">
                                            <input disabled id="rsocial" name="rsocial" type="text" class="form-control @error('rsocial') is-invalid @enderror" value="{{ $user->razonSocial }}">
                                        </div>
                                    </div>

                                    <!-- Direccion del cliente -->
                                    <div class="form-group row">
                                        <label for="companyAddress" class="col-md-4 col-form-label text-md-right">Dirección fiscal</label>

                                        <div class="col-md-6">
                                            <textarea disabled class="form-control" id="companyAddress" name="companyAddress" rows="3">{{ $user->companyAddress }}</textarea>
                                        </div>
                                    </div>

                                    <!-- Telefono -->
                                    <div class="form-group row">
                                        <label for="companyPhone" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                                        <div class="col-md-6">
                                            <input disabled id="companyPhone" type="number" class="form-control" name="companyPhone" value="{{ $user->companyPhone }}">
                                        </div>
                                    </div>

                                    <!-- <div class="form-group row" style="display: flex; justify-content: center;">
                                        <div class="text-center">
                                            <img src="{{ asset('images/customers_logos/companyLogo') }}/{{ $user->companyLogo }}" width="100px" class="rounded" alt="...">
                                        </div>
                                    </div> -->

                                </div><!-- fin contenedor cliente -->
    
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <a href="{{route('user.showUser')}}" class="btn btn-primary">Volver</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <br>

                </div>
            </div>
        </div>
    </section>

<!-- </div> -->
@endsection

@section('script')
    <script src="{{ asset('js/user-register.js') }}?v={{ env('APP_VERSION', '1') }}"></script>

    <script>
        $(function() {
            @if($isCompanyClient == true)
                $("#chkClient").trigger("change")
            @endif
        });
    </script>
@endsection

