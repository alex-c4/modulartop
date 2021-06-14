@extends('layouts.layoutSidebar')

@section('header')
    <link rel="stylesheet" href="{{ asset('/css/user-register.css') }}?v={{ env('APP_VERSION', '1') }}">
@endsection

@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Usuario
@endsection

@section('subtitle')
Crear nuevo usuario
@endsection


<section class="blog-section spad" id="blog">
        @if(isset($msg) != null)
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{$msg}}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            </div>
        @endif

        <div class="container">
        
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-body">
                            <form method="POST" action="{{ route('userClient.store') }}" >
                                @csrf
                                <!-- Nombre -->
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Nombre<span>*</span></label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Apellido -->
                                <div class="form-group row">
                                    <label for="lastName" class="col-md-4 col-form-label text-md-right">Apellido<span>*</span></label>

                                    <div class="col-md-6">
                                        <input id="lastName" name="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" value="{{ old('lastName') }}" required>

                                        @error('lastName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Correo electrónico<span>*</span></label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Telefono del cliente -->
                                <div class="form-group row">
                                    <label for="clientPhone" class="col-md-4 col-form-label text-md-right">Teléfono<span>*</span></label>

                                    <div class="col-md-6">
                                        <input id="clientPhone" type="number" class="form-control" name="clientPhone" value="{{ old('clientPhone') }}" required>
                                        @error('clientPhone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Rol en el sistema  -->
                                <div class="form-group row">
                                    <label for="rolId" class="col-md-4 col-form-label text-md-right">Rol<span>*</span></label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="rolId" name="rolId">
                                        @foreach($roles as $rol)
                                            <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Direccion del cilente -->
                                <div class="form-group row">
                                    <label for="clientAddress" class="col-md-4 col-form-label text-md-right">Dirección<span>*</span></label>

                                    <div class="col-md-6">
                                        <textarea class="form-control" id="clientAddress" name="clientAddress" rows="3" required>{{ old('clientAddress') }}</textarea>
                                    </div>
                                </div>

                                <!-- Es cliente -->
                                <div class="form-group row">
                                    <div class="col-md-4 text-md-right">
                                        <label class="form-check-label" for="chkClient">Cliente</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="chkClient" name="chkClient">
                                        </div>
                                    </div>
                                </div>

                                <!-- contenedor cliente -->
                                <div class="container-hidden" id="divContainer">

                                    <!-- RIF -->
                                    <div class="form-group row">

                                        <label for="rif" class="col-md-4 col-form-label text-md-right">Rif<span>*</span></label>

                                        <div class="col-md-6">
                                            <input id="rif" type="text" class="form-control @error('rif') is-invalid @enderror uppercase-field" name="rif" >

                                            @error('rif')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Razon social -->
                                    <div class="form-group row">

                                        <label for="rsocial" class="col-md-4 col-form-label text-md-right">Razón social<span>*</span></label>

                                        <div class="col-md-6">
                                            <input id="rsocial" name="rsocial" type="text" class="form-control @error('rsocial') is-invalid @enderror">

                                            @error('rsocial')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Direccion del cliente -->
                                    <div class="form-group row">
                                        <label for="companyAddress" class="col-md-4 col-form-label text-md-right">Dirección fiscal<span>*</span></label>

                                        <div class="col-md-6">
                                            <textarea class="form-control @error('companyAddress') is-invalid @enderror" id="companyAddress" name="companyAddress" rows="3"></textarea>
                                            @error('companyAddress')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Telefono -->
                                    <div class="form-group row">
                                        <label for="companyPhone" class="col-md-4 col-form-label text-md-right">Teléfono<span>*</span></label>

                                        <div class="col-md-6">
                                            <input id="companyPhone" type="number" class="form-control @error('companyPhone') is-invalid @enderror" name="companyPhone" >
                                            @error('companyPhone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Tipo de empresa  -->
                                    <div class="form-group row">
                                        <label for="company_type" class="col-md-4 col-form-label text-md-right">Tipo de empresa<span>*</span></label>
                                        <div class="col-md-6">
                                            <select class="form-control" id="company_type" name="company_type">
                                            @foreach($company_types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>



                                </div><!-- fin contenedor cliente -->

                                <div class="form-group row">
                                    <div class="col-md-3 text-md-right">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-6">
                                        <small id="emailHelp" class="form-text text-muted"><span>*</span> Campos obligatorios</small>
                                    </div>
                                </div>
    
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Registrar
                                        </button>
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
@endsection