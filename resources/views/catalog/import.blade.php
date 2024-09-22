@extends('layouts.layoutSidebar')

@section('header')
    <link rel="stylesheet" href="{{ asset('/css/catalog-import.css') }}?v={{ env('APP_VERSION', '1') }}">
@endsection

@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Catalogo
@endsection

@section('subtitle')
Importar catálogo
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
    
    <!-- mensaje para la importacion de los catalogos -->
    @if(isset($msgCatalog) != null)
        <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{$msgCatalog}}</strong> 
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
                    <form id="form_catalog" method="POST" action="{{ route('catalog.store') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                        <!-- Tipos -->
                        <div class="form-group row" id="div-types">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Tipo<span>*</span></label>
                            <div class="col-md-6">
                                <div class="input-group" >
                                    <select class="custom-select" id="type" name="type" autofocus>
                                        <option value="">-Seleccione-</option>
                                        @foreach($product_types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button style="height: 38px" id="btnAddType" data-toggle="modal" data-target="#typeModal" title="Agregar nuevo tipo" class="btn btn-primary" type="button"><span class="icon-add" style="color: white !important;"></span></button>
                                    </div>
                                </div>
                                <div id="errorDivType"></div>
                                @error('type')
                                    <span class="invalid-field text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Aliado comercial (proyectistas) -->
                        <div class="form-group row" id="div-proyectistas">
                            <label for="proyectistas" class="col-md-4 col-form-label text-md-right">Aliado comercial<span>*</span></label>
                            <div class="col-md-6">
                                <div class="input-group" >
                                    <select class="custom-select" id="proyectista" name="proyectista" autofocus >
                                        <option value="">-Seleccione-</option>
                                        @foreach($proyectistas as $proyectista)
                                            <option value="{{ $proyectista->id }}">{{ $proyectista->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button style="height: 38px" id="btnAddProyectista" data-toggle="modal" data-target="#proyectistaModal" title="Agregar nuevo proyectista" class="btn btn-primary" type="button"><span class="icon-add" style="color: white !important;"></span></button>
                                    </div>
                                </div>
                                <div id="errorDivProyectista"></div>
                                @error('type')
                                    <span class="invalid-field text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Imagen -->
                        <div class="row form-group">
                            <label for="catalog" class="col-md-4 col-form-label text-md-right">Catálogo<span>*</span></label>
                            <div class="col-md-6">
                                <input type="file" id="catalog" name="catalog" accept="application/pdf" class="form-control mt-2" placeholder="Imagen" > 
                                <div id="errorDivCatalog"></div>
                                @error('catalog')
                                    <span class="invalid-field text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>

                        <br>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btnSave" name="btnSave" disabled>
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

<script src="{{ asset('js/jquery-validate-1_19.js') }}"></script>
<script src="{{ asset('js/catalog/catalog.js') }}?v={{ env('APP_VERSION', '1') }}"></script>

<script>
    $(function(){
        validator();
    });

    $("#btnSave").prop("disabled", false);
</script>
@endsection
