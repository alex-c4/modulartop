@extends('layouts.layoutSidebar')

@section('header')
    <link rel="stylesheet" href="{{ asset('/css/product-register.css') }}?v={{ env('APP_VERSION', '1') }}">
@endsection


@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Productos
@endsection

@section('subtitle')
Creacion de nuevos productos
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
                    <form id="form_product" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        
                        <!-- General -->
                        <div class="form-group row">
                            <label class="col-md-5 col-form-label text-md-right mt-4"><strong>General</strong></label>
                        </div>

                        <!-- Categoria -->
                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">Categoria<span>*</span></label>
                            <div class="col-md-6">
                                <div class="input-group" >
                                    <select class="custom-select" id="category" name="category" autofocus >
                                        <option value="">-Seleccione-</option>
                                    @foreach($product_categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button style="height: 38px" id="btnAddCategory" data-toggle="modal" data-target="#categoryModal" title="Agregar nueva categoria" class="btn btn-primary" type="button"><span class="icon-add" style="color: white !important;"></span></button>
                                        <button style="height: 38px" id="btnDeleteCategory" data-toggle="modal" data-target="#CategoryDeleteModal" title="Eliminar categoria seleccionada" class="btn btn-secondary" type="button"><span class="icon-minus" style="color: white !important;"></span></button>
                                    </div>
                                </div>
                                <div id="errorDivCategory"></div>
                            </div>
                        </div>

                        <!-- Tipos -->
                        <div class="form-group row" id="div-types" style="display: none">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Tipo<span>*</span></label>
                            <div class="col-md-6">
                                <div class="input-group" >
                                    <select class="custom-select" id="type" name="type" >
                                        <option value="">-Seleccione-</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button style="height: 38px" id="btnAddCategory" data-toggle="modal" data-target="#typeModal" title="Agregar nueva categoria" class="btn btn-primary" type="button"><span class="icon-add" style="color: white !important;"></span></button>
                                    </div>
                                </div>
                                <div id="errorDivType"></div>
                            </div>
                        </div>

                        <!-- Sub Tipos -->
                        <div class="form-group row" id="div-subtypes" style="display: none">
                            <label for="subtype" class="col-md-4 col-form-label text-md-right">Sub-Tipo<span>*</span></label>
                            <div class="col-md-6">
                                <div class="input-group" >
                                    <select class="custom-select" id="subtype" name="subtype" >
                                        <option value="">-Seleccione-</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button style="height: 38px" id="btnAddSubtype" data-toggle="modal" data-target="#subtypeModal" title="Agregar nuevo sub-tipo" class="btn btn-primary" type="button"><span class="icon-add" style="color: white !important;"></span></button>
                                    </div>
                                </div>
                                <div id="errorDivSubtype"></div>
                                <span class="invalid-field" role="alert" id="error-subtype"></span>
                            </div>
                        </div>
                        
                        <!-- Codigo -->
                        <div class="form-group row" id="div-code" style="display: none">
                            <label for="code" class="col-md-4 col-form-label text-md-right">Código<span>*</span></label>
                            <div class="col-md-6">
                                <input maxlength="60" id="code" name="code" type="text" class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}" >

                                @error('code')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Nombre -->
                        <div class="form-group row" id="div-name" style="display: none">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre<span>*</span></label>
                            <div class="col-md-6">
                                <input maxlength="60" id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" >

                                @error('name')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Origen -->
                        <div class="form-group row" id="div-origen" style="display: none">
                            <label for="origen" class="col-md-4 col-form-label text-md-right">Origen<span>*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" id="origen" name="origen" >
                                @foreach($product_origen as $origen)
                                    <option value="{{ $origen->id }}">{{ $origen->name }}</option>
                                @endforeach
                                </select>
                                @error('origen')
                                    <span class="invalid-field text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- cantidad inicial -->
                        <div class="form-group row" id="div-cantinit" style="display: none">
                            <label for="cantinit" class="col-md-4 col-form-label text-md-right">Cantidad inicial</label>
                            <div class="col-md-6">
                                <input id="cantinit" name="cantinit" type="number" class="form-control" value="{{ old('cantinit') }}" min="0" placeholder="0">
                            </div>
                        </div>

                        <!-- Acabados seccion -->
                        <div class="form-group row" id="subtitle-acabados" style="display: none">
                            <label for="subcategory" class="col-md-5 col-form-label text-md-right mt-4"><strong>Acabados</strong></label>
                        </div>

                        <!-- Acabados -->
                        <div class="form-group row" id="div-acabados" style="display: none">
                            <label for="acabado" class="col-md-4 col-form-label text-md-right">Acabado<span>*</span></label>
                            <div class="col-md-6">
                                <div class="input-group" >
                                    <select class="custom-select" id="acabado" name="acabado">
                                        <option value="">-Seleccione-</option>
                                        @foreach($product_acabados as $acabado)
                                            <option value="{{ $acabado->id }}">{{ $acabado->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button style="height: 38px" id="btnAddAcabado" data-toggle="modal" data-target="#acabadoModal" title="Agregar nuevo Acabado" class="btn btn-primary" type="button"><span class="icon-add" style="color: white !important;"></span></button>
                                    </div>
                                </div>
                                <div id="errorDivAcabado"></div>
                            </div>
                        </div>

                        <!-- Sub-acabados -->
                        <div class="form-group row" id="div-subacabados" style="display: none">
                            <label for="sub_acabado" class="col-md-4 col-form-label text-md-right">Sub-acabado</label>
                            <div class="col-md-6">
                                <div class="input-group" >
                                    <select class="custom-select" id="sub_acabado" name="sub_acabado">
                                        <option value="">-Seleccione-</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button style="height: 38px" id="btnAddSubAcabado" data-toggle="modal" data-target="#subacabadoModal" title="Agregar nuevo Sub-acabado" class="btn btn-primary" type="button"><span class="icon-add" style="color: white !important;"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Dimensiones -->
                        <div class="form-group row">
                            <label for="subcategory" class="col-md-5 col-form-label text-md-right mt-4"><strong>Dimensiones</strong></label>
                        </div>

                        <!-- Ancho -->
                        <div class="form-group row">
                            <label for="width" class="col-md-4 col-form-label text-md-right">Ancho<span>*</span></label>
                            <div class="col-md-6">
                                <input maxlength="60" min="1" id="width" name="width" type="number" class="form-control @error('width') is-invalid @enderror" value="{{ old('width') }}" >

                                @error('width')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Espesor -->
                        <div class="form-group row">
                            <label for="thickness" class="col-md-4 col-form-label text-md-right">Espesor<span>*</span></label>
                            <div class="col-md-6">
                                <input maxlength="60" min="1" id="thickness" name="thickness" type="number" class="form-control @error('thickness') is-invalid @enderror" value="{{ old('thickness') }}" >

                                @error('thickness')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Largo -->
                        <div class="form-group row" id="div-length" style="display: none">
                            <label for="length" class="col-md-4 col-form-label text-md-right">Largo<span>*</span></label>
                            <div class="col-md-6">
                                <input maxlength="60" min="1" id="length" name="length" type="number" class="form-control @error('length') is-invalid @enderror" value="{{ old('length') }}">

                                @error('length')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Caracteristicas -->
                        <div class="form-group row" id="div-caracteristicas" style="display: none">
                            <label for="subcategory" class="col-md-5 col-form-label text-md-right mt-4"><strong>Caracteristicas</strong></label>
                        </div>

                        <!-- Material -->
                        <div class="form-group row" id="div-material" style="display: none">
                            <label for="material" class="col-md-4 col-form-label text-md-right">Material<span>*</span></label>
                            <div class="col-md-6">
                                <div class="input-group" >
                                    <select class="custom-select" id="material" name="material">
                                        <option value="">-Seleccione-</option>
                                    @foreach($product_materials as $material)
                                        <option value="{{ $material->id }}">{{ $material->name }}</option>
                                    @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button style="height: 38px" id="btnAddMaterial" data-toggle="modal" data-target="#materialModal" title="Agregar nuevo Material" class="btn btn-primary" type="button"><span class="icon-add" style="color: white !important;"></span></button>
                                    </div>

                                    @error('material')
                                        <span class="invalid-field text-center" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div id="errorDivMaterial"></div>
                            </div>
                        </div>

                        <!-- Tipo de sustrato -->
                        <div class="form-group row" id="div-sustrato" style="display: none">
                            <label for="sustrato" class="col-md-4 col-form-label text-md-right">Tipo de sustrato<span>*</span></label>
                            <div class="col-md-6">
                                <div class="input-group" >
                                    <select class="custom-select" id="sustrato" name="sustrato">
                                        <option value="">-Seleccione-</option>
                                        @foreach($product_sustrato as $sustrato)
                                            <option value="{{ $sustrato->id }}">{{ $sustrato->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button style="height: 38px" id="btnAddSustrato" data-toggle="modal" data-target="#sustratoModal" title="Agregar nuevo Tipo de Sustrato" class="btn btn-primary" type="button"><span class="icon-add" style="color: white !important;"></span></button>
                                    </div>

                                    @error('sustrato')
                                        <span class="invalid-field text-center" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div id="errorDivSustrato"></div>
                            </div>
                        </div>

                        <!-- Clasificación por colores -->
                        <div class="form-group row" id="div-colors" style="display: none">
                            <label for="color" class="col-md-4 col-form-label text-md-right">Clasificación por colores<span>*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="custom-select" id="color" name="color">
                                        <option value="">-Seleccione-</option>
                                    @foreach($product_colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button style="height: 38px" id="btnAddColor" data-toggle="modal" data-target="#colorModal" title="Agregar nuevo Color" class="btn btn-primary" type="button"><span class="icon-add" style="color: white !important;"></span></button>
                                    </div>

                                    @error('color')
                                        <span class="invalid-field text-center" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div id="errorDivColor"></div>
                            </div>
                        </div>
                        
                        <!-- Descripcion -->
                        <div class="row form-group" id="div-description" style="display: none">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descripción<span>*</span></label>
                            <div class="col-md-6">
                                <textarea id="description" name="description" rows="7" class="form-control" >{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    
                            </div>
                        </div>

                        <!-- Imagen -->
                        <div class="row form-group">
                            <label for="image_0" class="col-md-4 col-form-label text-md-right">Imagen Principal<span>*</span></label>
                            <div class="col-md-6">
                                <input type="file" id="image_0" name="image_0" accept="image/png, image/jpeg, image/jpg" class="form-control mt-2" placeholder="Imagen" > 
                                <small id="sizeImage" class="form-text text-muted sizeImage">Tamaño de la imagen (300 x 400 pixeles)</small>
                            </div>
                            
                            @error('image_0')
                                <span class="invalid-field text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Texto Alternativo -->
                        <div class="row form-group">
                            <label for="image_alt" class="col-md-4 col-form-label text-md-right">Texto alternativo<span>*</span></label>
                            <div class="col-md-6">
                                <input maxlength="60" type="text" name="image_alt" id="image_alt" class="form-control @error('image_alt') is-invalid @enderror" value="{{ old('image_alt') }}" >
                            </div>
                            @error('image_alt')
                                <span class="invalid-field text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <hr>

                        <!-- Otras imagenes -->
                        <div class="row form-group">
                            <label for="image_1" class="col-md-4 col-form-label text-md-right">Imagen de galería</label>
                            <div class="col-md-6" id="container-img">
                                <input type="file" id="image_1" name="image_1" accept="image/png, image/jpeg, image/jpg" class="form-control mt-2" placeholder="Imagen"> 
                                <input maxlength="60" type="text" name="image_alt_1" id="image_alt_1" class="form-control mt-1" placeholder="Texto alternativo">
                            </div>
                        </div>
                        
                        <div class="col-md-12 text-center mt-2">
                            <div class="alert alert-warning" role="alert" id="msgInfoAddImg"></div>
                        </div>

                        <div class="col-md-12 text-center mt-2" id="btnAddImage" name="btnAddImage">
                            <button type="button" class="btn btn-primary">
                                Agregar campo imagen
                            </button>
                        </div>

                        <br>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btnSave" disabled>
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


<!-- Modal section -->

<!-- modal Agregar categoria -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <input type="hidden" id="hRouteAddCategory" value="{{ route('product.addCategory') }}">

                <div class="form-group">
                    <label for="txtCategory">Nueva Categoria</label>
                    <input type="text" class="form-control" id="txtCategory">
                </div>

                <div id="msgCategoryModal" name="msgCategoryModal" class="alert" role="alert"></div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="Utils.clearModal(['txtCategory'], 'msgCategoryModal')">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="onclick_addCategory()">Guardar</button>
            </div>

        </div>
    </div>
</div>
<!-- Modal Eliminar categoria -->
<div class="modal fade" id="CategoryDeleteModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminara Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <input type="hidden" id="hRouteDeleteCategory" value="{{ route('product.deleteCategory') }}">

                <div class="form-group">
                    <!-- <label for="msgCategory"></label> -->
                    <div id="msgCategory"></div>
                </div>

                <div id="msgCategoryDelete" name="msgCategoryDelete" class="alert" role="alert"></div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="Utils.clearModal(['txtCategory'], 'msgCategoryModal')">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="onclick_deleteCategory()">Eliminar</button>
            </div>

        </div>
    </div>
</div>

<!-- modal tipo -->
<div class="modal fade" id="typeModal" tabindex="-1" aria-labelledby="typeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Tipo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <input type="hidden" id="hRouteAddType" value="{{ route('product.addType') }}">

                <!-- categorias -->
                <div class="form-group">
                    <label for="modal_category_modal">Categorías</label>
                    <select class="form-control" id="modal_category_modal" name="modal_category_modal">
                        @foreach($product_categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="txtCategory">Nuevo Tipo</label>
                    <input type="text" class="form-control" id="txtType" name="txtType">
                </div>

                <div id="msgTypeModal" name="msgTypeModal" class="alert" role="alert"></div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="Utils.clearModal(['txtType'], 'msgTypeModal')">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="onclick_addType()">Guardar</button>
            </div>

        </div>
    </div>
</div>

<!-- modal Subtipo -->
<div class="modal fade" id="subtypeModal" tabindex="-1" aria-labelledby="subtypeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Sub-Tipo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
            
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" id="hRouteAddSubType" value="{{ route('product.addSubType') }}">
            
                <!-- Tipos -->
                <div class="form-group">
                    <label for="modal_type">Tipo</label>
                    <select class="form-control" id="modal_type" name="modal_type">
                        <option value="0">-Seleccione-</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="txtSubType">Nuevo Sub-Tipo</label>
                    <input type="text" class="form-control" id="txtSubType">
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="onclick_addSubType()">Guardar</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal Acabado -->
<div class="modal fade" id="acabadoModal" tabindex="-1" aria-labelledby="acabadoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Acabado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
            
                <input type="hidden" id="hRouteAddAcabado" value="{{ route('product.addAcabado') }}">

                <div class="form-group">
                    <label for="txtAcabado">Nuevo Acabado</label>
                    <input type="text" class="form-control" id="txtAcabado">
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="onclick_addAcabado()">Guardar</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal Sub-acabado -->
<div class="modal fade" id="subacabadoModal" tabindex="-1" aria-labelledby="subacabadoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Sub-acabado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
            
                <input type="hidden" id="hRouteAddSubacabado" value="{{ route('product.addSubacabado') }}">

                <!-- Acabados -->
                <div class="form-group">
                    <label for="modal_type">Acabados</label>
                    <select class="form-control" id="modal_acabado" name="modal_acabado">
                        @foreach($product_acabados as $acabado)
                            <option value="{{ $acabado->id }}">{{ $acabado->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="txtSubacabado">Nuevo Sub-acabado</label>
                    <input type="text" class="form-control" id="txtSubacabado">
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="onclick_addSubacabado()">Guardar</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal Materiales -->
<div class="modal fade" id="materialModal" tabindex="-1" aria-labelledby="materialModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
            
                <input type="hidden" id="hRouteAddMaterial" value="{{ route('product.addMaterial') }}">

                <!-- Material -->
                <div class="form-group">
                    <label for="txtMaterial">Nuevo Material</label>
                    <input type="text" class="form-control" id="txtMaterial">
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="onclick_addMaterial()">Guardar</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal Sustrato -->
<div class="modal fade" id="sustratoModal" tabindex="-1" aria-labelledby="sustratoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Sustrato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
            
                <input type="hidden" id="hRouteAddSustrato" value="{{ route('product.addSustrato') }}">

                <!-- Sustrato -->
                <div class="form-group">
                    <label for="txtSustrato">Nuevo Sustrato</label>
                    <input type="text" class="form-control" id="txtSustrato">
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="onclick_addSustrato()">Guardar</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal Color -->
<div class="modal fade" id="colorModal" tabindex="-1" aria-labelledby="colorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Color</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
            
                <input type="hidden" id="hRouteAddColor" value="{{ route('product.addColor') }}">

                <!-- Color -->
                <div class="form-group">
                    <label for="txtColor">Nuevo Color</label>
                    <input type="text" class="form-control" id="txtColor">
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="onclick_addColor()">Guardar</button>
            </div>

        </div>
    </div>
</div>

<!-- End Modal section -->

</section>

@endsection

@section('script')
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script> -->
    <script src="{{ asset('js/jquery-validate-1_19.js') }}"></script>

    <script src="{{ asset('js/utils.js') }}?v={{ env('APP_VERSION', '1') }}"></script>
    <script src="{{ asset('js/product/product.js') }}?v={{ env('APP_VERSION', '1') }}"></script>
    <script src="{{ asset('js/product/product-register.js') }}?v={{ env('APP_VERSION', '1') }}"></script>

    <script>
        var produc_types = @json($product_types);
        var produc_subtypes = @json($product_subtypes);
        var produc_subacabados = @json($product_subacabados);
        
    </script>

    <script>

        $(function(){
            $("#msgCategoryModal").hide();
            validator_default();
            Utils.hideAlert("msgInfoAddImg");

        });

        $("#btnSave").prop("disabled", false);
        
    </script>
@endsection
