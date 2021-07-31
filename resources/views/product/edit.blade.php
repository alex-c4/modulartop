@extends('layouts.layoutSidebar')

@section('header')
    <link rel="stylesheet" href="{{ asset('/css/product-register.css') }}?v={{ env('APP_VERSION', '1') }}">
@endsection


@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
¡Editar!
@endsection

@section('subtitle')
Edición de producto
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
            <div class="card" style="display: none;">
                <div class="card-body">
                    <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                    
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input type="hidden" name="hUrlDeleteImage" id="hUrlDeleteImage" value="{{ route('product.deleteimg') }}">

                        <!-- Categoria -->
                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">Categoria<span>*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" id="category" name="category" autofocus >
                                @foreach($product_categories as $category)
                                    @if($category->id == $product->id_product_category)
                                        <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Tipos -->
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Tipo<span>*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" id="type" name="type">
                                @foreach($product_types as $type)
                                    @if($type->id == $product->id_product_type)
                                        <option selected value="{{ $type->id }}">{{ $type->name }}</option>
                                    @else
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Sub Tipos -->
                        <div class="form-group row" id="div-subtypes" >
                            <label for="subtype" class="col-md-4 col-form-label text-md-right">Sub-Tipo<span>*</span></label>
                            <div class="col-md-6">
                                <div class="input-group" >
                                    <select class="custom-select" id="subtype" name="subtype" >
                                    @foreach($product_subtypes as $subtype)
                                        @if($subtype->type_id == $product->id_product_type)
                                            @if($subtype->id == $product->id_product_subtype)
                                                <option selected value="{{ $type->id }}">{{ $subtype->name }}</option>
                                            @else
                                                <option value="{{ $type->id }}">{{ $subtype->name }}</option>
                                            @endif
                                        @endif
                                    @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button style="height: 38px" id="btnAddSubtype" data-toggle="modal" data-target="#subtypeModal" title="Agregar nuevo sub-tipo" class="btn btn-primary" type="button"><span class="icon-add" style="color: white !important;"></span></button>
                                    </div>
                                </div>
                                <span class="invalid-field" role="alert" id="error-subtype">
                                    
                                </span>
                            </div>
                        </div>

                        <!-- Codigo -->
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">Código<span>*</span></label>
                            <div class="col-md-6">
                                <input maxlength="60" id="code" name="code" type="text" class="form-control @error('code') is-invalid @enderror" value="{{ $product->code }}" required autofocus>
                                @error('code')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Nombre -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre<span>*</span></label>
                            <div class="col-md-6">
                                <input maxlength="60" id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}" required>

                                @error('name')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Origen -->
                        <div class="form-group row">
                            <label for="origen" class="col-md-4 col-form-label text-md-right">Origen<span>*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" id="origen" name="origen">
                                @foreach($product_origen as $origen)
                                    @if($origen->id == $product->id_product_origen)
                                        <option selected value="{{ $origen->id }}">{{ $origen->name }}</option>
                                    @else
                                        <option value="{{ $origen->id }}">{{ $origen->name }}</option>
                                    @endif
                                @endforeach
                                </select>
                                @error('origen')
                                    <span class="invalid-field text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Acabados seccion -->
                        <div class="form-group row" id="subtitle-acabados" >
                            <label for="subcategory" class="col-md-5 col-form-label text-md-right mt-4"><strong>Acabados</strong></label>
                        </div>

                        <!-- Acabados -->
                        <div class="form-group row" id="div-acabados" >
                            <label for="acabado" class="col-md-4 col-form-label text-md-right">Acabado<span>*</span></label>
                            <div class="col-md-6">
                                <div class="input-group" >
                                    <select class="custom-select" id="acabado" name="acabado">
                                        @foreach($product_acabados as $acabado)
                                            @if($acabado->id == $product->id_product_acabado)
                                                <option selected value="{{ $acabado->id }}">{{ $acabado->name }}</option>
                                            @else
                                                <option value="{{ $acabado->id }}">{{ $acabado->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button style="height: 38px" id="btnAddAcabado" data-toggle="modal" data-target="#acabadoModal" title="Agregar nuevo Acabado" class="btn btn-primary" type="button"><span class="icon-add" style="color: white !important;"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sub-acabados -->
                        <div class="form-group row" id="div-subacabados" >
                            <label for="sub_acabado" class="col-md-4 col-form-label text-md-right">Sub-acabado</label>
                            <div class="col-md-6">
                                <div class="input-group" >
                                    <select class="custom-select" id="sub_acabado" name="sub_acabado">
                                        @foreach($product_subacabados as $subacabado)
                                            @if($subacabado->id == $product->id_product_subacabado)
                                                <option selected value="{{ $subacabado->id }}">{{ $subacabado->name }}</option>
                                            @else
                                                <option value="{{ $subacabado->id }}">{{ $subacabado->name }}</option>
                                            @endif
                                        @endforeach
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
                                <input maxlength="60" min="1" id="width" name="width" type="number" class="form-control @error('width') is-invalid @enderror" value="{{ $product->width }}" >

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
                                <input maxlength="60" min="1" id="thickness" name="thickness" type="number" class="form-control @error('thickness') is-invalid @enderror" value="{{ $product->thickness }}" >

                                @error('thickness')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Largo -->
                        <div class="form-group row" id="div-length" >
                            <label for="length" class="col-md-4 col-form-label text-md-right">Largo<span>*</span></label>
                            <div class="col-md-6">
                                <input maxlength="60" min="1" id="length" name="length" type="number" class="form-control @error('length') is-invalid @enderror" value="{{ $product->length }}">

                                @error('length')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Caracteristicas -->
                        <div class="form-group row" id="div-caracteristicas" >
                            <label for="subcategory" class="col-md-5 col-form-label text-md-right mt-4"><strong>Caracteristicas</strong></label>
                        </div>

                        <!-- Material -->
                        <div class="form-group row" id="div-material" >
                            <label for="material" class="col-md-4 col-form-label text-md-right">Material<span>*</span></label>
                            <div class="col-md-6">
                                <div class="input-group" >
                                    <select class="custom-select" id="material" name="material">
                                        @foreach($product_materials as $material)
                                            @if($material->id == $product->id_product_material)
                                                <option selected value="{{ $material->id }}">{{ $material->name }}</option>
                                            @else
                                                <option value="{{ $material->id }}">{{ $material->name }}</option>
                                            @endif
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
                            </div>
                        </div>

                        <!-- Tipo de sustrato -->
                        <div class="form-group row" id="div-sustrato">
                            <label for="sustrato" class="col-md-4 col-form-label text-md-right">Tipo de sustrato<span>*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" id="sustrato" name="sustrato">
                                @foreach($product_sustrato as $sustrato)
                                    @if($sustrato->id == $product->id_product_sustrato)
                                        <option selected value="{{ $sustrato->id }}">{{ $sustrato->name }}</option>
                                    @else
                                        <option value="{{ $sustrato->id }}">{{ $sustrato->name }}</option>
                                    @endif
                                @endforeach
                                </select>
                                @error('sustrato')
                                    <span class="invalid-field text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Clasificación por colores -->
                        <div class="form-group row" id="div-colors">
                            <label for="color" class="col-md-4 col-form-label text-md-right">Clasificación por colores<span>*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" id="color" name="color">
                                @foreach($product_colors as $color)
                                    @if($color->id == $product->id_product_color)
                                        <option selected value="{{ $color->id }}">{{ $color->name }}</option>
                                    @else
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endif
                                @endforeach
                                </select>
                                @error('color')
                                    <span class="invalid-field text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Descripcion -->
                        <div class="row form-group" id="div-description">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descripción<span>*</span></label>
                            <div class="col-md-6">
                                <textarea id="description" name="description" rows="7" class="form-control" required>{{ $product->description }}</textarea>
                                @error('description')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    
                            </div>
                        </div>

                        <!-- Imagen producto -->
                        <div class="form-group row">
                            <label class="col-md-6 col-form-label text-md-right mt-4"><strong>Imagen {{ $product->name }}</strong></label>
                            <div class="images-container-product">
                                <div class="image-trash">
                                    @if($product->img_product != "")
                                    <img src="{{ asset('images/image_products') }}/{{ $product->img_product }}" alt="{{ $product->name }}">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Imagen -->
                        <div class="row form-group">
                            <label for="image_0" class="col-md-4 col-form-label text-md-right">Imagen<span>*</span></label>
                            <div class="col-md-6">
                                <input type="file" id="image_0" name="image_0" accept="image/png, image/jpeg, image/jpg" class="form-control mt-2" placeholder="Imagen"> 
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
                                <input maxlength="60" type="text" name="image_alt" id="image_alt" class="form-control @error('image_alt') is-invalid @enderror" value="{{ $product->img_alt }}" >
                            </div>
                            @error('image_alt')
                                <span class="invalid-field text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Imagenes cargadas -->
                        <div class="form-group row">
                            <label for="subcategory" class="col-md-6 col-form-label text-md-right mt-4"><strong>Imagenes cargadas</strong></label>
                            <div class="images-container">
                                
                                @foreach($product_images as $image)
                                <div class="image-trash">
                                    <img src="{{ asset('images/image_products') }}/{{ $image->name }}" alt="{{ $product->name }}">
                                    <div class="div-trash">
                                        <span onclick="deleteImage({{ $image->id }}, '{{ $image->name }}', {{ $product->id }})" class="icon-trash"></span>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        
                        <!-- Imagen -->
                        <div class="row form-group">
                            <label for="image_1" class="col-md-4 col-form-label text-md-right">Otras imagenes</label>
                            <div class="col-md-6" id="container-img">
                                <input type="file" id="image_1" name="image_1" accept="image/png, image/jpeg, image/jpg" class="form-control mt-2" placeholder="Imagen"> 
                            </div>
                            <div class="col-md-12 text-center mt-2" id="btnAddImage" name="btnAddImage">
                                <button type="button" class="btn btn-primary">
                                    Agregar campo imagen
                                </button>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                                <a href="{{ route('product.index') }}" class="btn btn-primary ">Volver</a>
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

    <script src="{{ asset('js/utils.js') }}?v={{ env('APP_VERSION', '1') }}"></script>
    <script src="{{ asset('js/product/product.js') }}?v={{ env('APP_VERSION', '1') }}"></script>
    <script src="{{ asset('js/product/product-update.js') }}?v={{ env('APP_VERSION', '1') }}"></script>

    <script>
        var produc_types = @json($product_types);
        var produc_subtypes = @json($product_subtypes);
        var produc_subacabados = @json($product_subacabados);
        
    </script>

<script>

    $(function(){

        GLOBAL_URL = "{{ asset('images/image_products') }}";
        GLOBAL_PRODUCT_NAME = "{{ $product->name }}";

        @if($product->id_product_type == 2)
            // Ocultar secciones cuando es Tapacanto
            hideTableroSections();

            // dispara evento change de combo type
            // $("#type").trigger("change");
        @endif
            
        // mostrar formulario
        $(".card").show("slow");

    });

</script>

@endsection
