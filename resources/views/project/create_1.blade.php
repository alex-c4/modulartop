@extends('layouts.layoutSidebar')

@section('header')
    <link rel="stylesheet" href="{{ asset('css/project.css')}}?v={{ env('APP_VERSION') }}">
@endsection

@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Proyecto
@endsection

@section('subtitle')
Creación proyecto
@endsection


<section class="blog-section spad" id="blog">
<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-info ">
                <!-- <i class="fas fa-align-left"></i> -->
                <span class="icon-align-left"></span>
                <!-- <span>Toggle Sidebar</span> -->
            </button>

        </div>
    </nav>


    <!-- mensaje para la creacion de los post -->
    @if(isset($msgPost) != null)
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{$msgPost}}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form id="form_project" method="POST" action="{{ route('project.store') }}" enctype="multipart/form-data">
                    
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                        <!-- Proyectistas -->
                        <div class="row form-group" >
                            <label class="col-md-4 col-form-label text-md-right" for="proyectista">Proyectista<span>*</span></label>
                            <div class="col-md-6">
                                <select class="custom-select @error('proyectista') is-invalid @enderror" id="proyectista" name="proyectista">
                                    <option value>Seleccione...</option>
                                    @foreach($proyectistas as $proyectista)
                                        <option value="{{ $proyectista->id }}">{{ $proyectista->name }}</option>
                                    @endforeach
                                </select>
                                @error('proyectista')
                                    <span class="invalid-field text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Nombre -->
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">Nombre<span>*</span></label>
                            <div class="col-md-6">
                                <input maxlength="120" id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autofocus>
                                @error('name')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Cover photo -->
                        <div class="row form-group">
                            <label for="cover_photo" class="col-md-4 col-form-label text-md-right">Foto portada<span>*</span></label>
                            <div class="col-md-6">
                                <input type="file" id="cover_photo" name="cover_photo" accept="image/png, image/jpeg, image/jpg" class="form-control @error('cover_photo') is-invalid @enderror" placeholder="Imagen"> 
                            </div>
                            
                            @error('cover_photo')
                                <span class="invalid-field text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <!-- cover photo alt_text -->
                        <div class="row form-group">
                            <label for="cover_photo_alt_text" class="col-md-4 col-form-label text-md-right">Texto alternativo<span>*</span></label>
                            <div class="col-md-6">
                                <textarea maxlength="60" id="cover_photo_alt_text" name="cover_photo_alt_text" rows="2" class="form-control @error('cover_photo_alt_text') is-invalid @enderror" >{{ old('cover_photo_alt_text') }}</textarea>
                                @error('cover_photo_alt_text')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    
                            </div>
                        </div>


                        <!-- Descripcion -->
                        <div class="row form-group">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descripción<span id="span_description"></span></label>
                            <div class="col-md-6">
                                <textarea id="description" name="description" rows="4" class="form-control @error('description') is-invalid @enderror" >{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    
                            </div>
                        </div>

                        <!-- Plane photo -->
                        <div class="row form-group">
                            <label for="plane_photo" class="col-md-4 col-form-label text-md-right">Foto del plano</label>
                            <div class="col-md-6">
                                <input type="file" id="plane_photo" name="plane_photo" accept="image/png, image/jpeg, image/jpg" class="form-control @error('plane_photo') is-invalid @enderror" placeholder="Imagen"> 
                            </div>
                        </div>

                        <!-- Ubication -->
                        <div class="row form-group">
                            <label for="ubication" class="col-md-4 col-form-label text-md-right">Ubicación</label>
                            <div class="col-md-6">
                                <textarea id="ubication" name="ubication" rows="4" class="form-control" >{{ old('ubication') }}</textarea>
                            </div>
                        </div>

                        <!-- Client name -->
                        <div class="form-group row d-none" id="div_client_name">
                            <label for="client_name" class="col-md-4 col-form-label text-md-right">Nombre del cliente<span>*</span></label>
                            <div class="col-md-6">
                                <input maxlength="60" id="client_name" name="client_name" type="text" class="form-control @error('client_name') is-invalid @enderror" value="{{ old('client_name') }}" >
                                @error('client_name')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Fecha -->
                        <div class="form-group row d-none" id="div_project_date">
                            <label for="project_date" class="col-md-4 col-form-label text-md-right">Fecha<span>*</span></label>
                            <div class="col-md-6">
                                <input id="project_date" name="project_date" autocomplete="off" type="text" class="form-control @error('project_date') is-invalid @enderror" value="{{ old('project_date') }}" >

                                @error('project_date')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Partner company -->
                        <div class="form-group row d-none" id="div_partner_company">
                            <label for="partner_company" class="col-md-4 col-form-label text-md-right">Empresa aliada<span>*</span></label>
                            <div class="col-md-6">
                                <input maxlength="60" id="partner_company" name="partner_company" type="text" class="form-control @error('partner_company') is-invalid @enderror" value="{{ old('partner_company') }}" >
                                @error('partner_company')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Proveedores -->
                        <div class="row form-group d-none" id="div_provider">
                            <label class="col-md-4 col-form-label text-md-right" for="provider">Proveedor<span>*</span></label>
                            <div class="col-md-6">
                                <select class="custom-select" id="provider" name="provider">
                                    <option value="0">Seleccione...</option>
                                    @foreach($providers as $provider)
                                        <option value="{{ $provider->id }}">{{ $provider->name}}</option>
                                    @endforeach
                                </select>
                                @error('provider')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-1 mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btnSave" name="btnSave">
                                    Guardar
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

@section('script')

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script> -->

    <script src="{{ asset('js/jquery-validate-1_19.js') }}"></script>
    <script src="{{ asset('js/project.js') }}?v={{ env('APP_VERSION') }}"></script>

@endsection
