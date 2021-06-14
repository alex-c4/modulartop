@extends('layouts.layoutSidebar')

@section('header')
    <link rel="stylesheet" href="{{ asset('/css/user-register.css') }}?v={{ env('APP_VERSION', '1') }}">
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
                    <form id="form_create_product" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                        <!-- Codigo -->
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">Código<span>*</span></label>
                            <div class="col-md-6">
                                <input id="code" name="code" type="text" class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}" required autofocus>

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
                                <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>

                                @error('name')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Categoria -->
                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">Categoria<span>*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" id="category" name="category">
                                @foreach($product_categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Subcategorias -->
                        <div class="form-group row">
                            <label for="subcategory" class="col-md-5 col-form-label text-md-right mt-4"><strong>Subcategorias</strong></label>
                        </div>

                        <!-- Acabados -->
                        <div class="form-group row">
                            <label for="sub_acabado" class="col-md-4 col-form-label text-md-right">Acabado<span>*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" id="sub_acabado" name="sub_acabado">
                                @foreach($product_subcategory_classification as $subcategory)
                                    @if($subcategory->id_product_subcategory == 1)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Efecto Visual -->
                        <div class="form-group row">
                            <label for="sub_efectov" class="col-md-4 col-form-label text-md-right">Efecto visual<span>*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" id="sub_efectov" name="sub_efectov">
                                @foreach($product_subcategory_classification as $subcategory)
                                    @if($subcategory->id_product_subcategory == 2)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endif
                                @endforeach
                                </select>
                                @error('sub_efectov')
                                    <span class="invalid-field text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Material -->
                        <div class="form-group row">
                            <label for="sub_material" class="col-md-4 col-form-label text-md-right">Material<span>*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" id="sub_material" name="sub_material">
                                @foreach($product_subcategory_classification as $subcategory)
                                    @if($subcategory->id_product_subcategory == 3)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endif
                                @endforeach
                                </select>
                                @error('sub_material')
                                    <span class="invalid-field text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Origen -->
                        <div class="form-group row">
                            <label for="sub_origen" class="col-md-4 col-form-label text-md-right">Origen<span>*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" id="sub_origen" name="sub_origen">
                                @foreach($product_subcategory_classification as $subcategory)
                                    @if($subcategory->id_product_subcategory == 4)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endif
                                @endforeach
                                </select>
                                @error('sub_origen')
                                    <span class="invalid-field text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Tipo de sustrato -->
                        <div class="form-group row">
                            <label for="sub_sustrato" class="col-md-4 col-form-label text-md-right">Tipo de sustrato<span>*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" id="sub_sustrato" name="sub_sustrato">
                                @foreach($product_subcategory_classification as $subcategory)
                                    @if($subcategory->id_product_subcategory == 5)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endif
                                @endforeach
                                </select>
                                @error('sub_sustrato')
                                    <span class="invalid-field text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Clasificación por colores -->
                        <div class="form-group row">
                            <label for="sub_color" class="col-md-4 col-form-label text-md-right">Clasificación por colores<span>*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" id="sub_color" name="sub_color">
                                @foreach($product_subcategory_classification as $subcategory)
                                    @if($subcategory->id_product_subcategory == 6)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endif
                                @endforeach
                                </select>
                                @error('sub_color')
                                    <span class="invalid-field text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Clasificacion -->
                        <!-- <div class="form-group row">
                            <label for="clasification" class="col-md-4 col-form-label text-md-right">Clasificación<span>*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" id="clasification" name="clasification">
                                @foreach($product_subcategory_classification as $classification)
                                    <option value="{{ $classification->id }}">{{ $classification->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div> -->
                        
                        <!-- Descripcion -->
                        <div class="row form-group">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descripción<span>*</span></label>
                            <div class="col-md-6">
                                <textarea id="description" name="description" rows="7" class="form-control" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    
                            </div>
                        </div>

                        <!-- Imagen -->
                        <div class="row form-group">
                            <label for="image_0" class="col-md-4 col-form-label text-md-right">Imagen<span>*</span></label>
                            <div class="col-md-6">
                                <input type="file" id="image_0" name="image_0" accept="image/png, image/jpeg, image/jpg" class="form-control mt-2" placeholder="Imagen" required> 
                            </div>
                            
                            @error('image_0')
                                <span class="invalid-field text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <!-- Precio -->
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Precio al público<span>*</span></label>
                            <div class="col-md-6">
                                <input id="price" name="price" type="number" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required>

                                @error('price')
                                    <span class="invalid-field text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Ficha tecnica -->
                        <div class="row form-group">
                            <label for="pdf_file" class="col-md-4 col-form-label text-md-right">Ficha técnica</label>
                            <div class="col-md-6">
                                <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf" class="form-control mt-2" placeholder="Ficha técnica">
                            </div>
                        </div>

                        <!-- Otras imagenes -->
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
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btnSave">
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

    <script src="{{ asset('js/utils.js') }}?v={{ env('APP_VERSION', '1') }}"></script>
    <script src="{{ asset('js/product-register.js') }}?v={{ env('APP_VERSION', '1') }}"></script>

@endsection
