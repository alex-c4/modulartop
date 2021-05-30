@extends('layouts.layoutSidebar')

@section('header')
    <link rel="stylesheet" href="{{ asset('/css/product-register.css') }}?v={{ env('APP_VERSION', '1') }}">
@endsection


@section('content')

@section('banner')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/novedades/newsletter-novedades.jpg') }});" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5 mx-auto mt-lg-5 text-center">
                <h1>¡Editar!</h1>
                <p class="mb-5"><strong class="text-white">Edición de producto</strong></p>
        
            </div>
        </div>
    </div>

    <!-- <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a> -->
</div> 

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

    <div class="row mb-5">
        <div class="col-12 text-center">
        <h2 class="section-title mb-3 text-black">Producto</h2>
        </div>
    </div>

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
                    <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                    
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input type="hidden" name="hUrlDeleteImage" id="hUrlDeleteImage" value="{{ route('product.deleteimg') }}">

                        <!-- Codigo -->
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">Código<span>*</span></label>
                            <div class="col-md-6">
                                <input id="code" name="code" type="text" class="form-control @error('code') is-invalid @enderror" value="{{ $product->code }}" required autofocus>

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
                                <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}" required>

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
                                    @if($type->id == $product->id_product_id)
                                        <option selected value="{{ $type->id }}">{{ $type->name }}</option>
                                    @else
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endif
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
                                        @if($subcategory->id == $product->id_subcategory_acabado)
                                            <option selected value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @else
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endif
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
                                        @if($subcategory->id == $product->id_subcategory_efecto_v)
                                            <option selected value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @else
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endif
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
                                        @if($subcategory->id == $product->id_subcategory_material)
                                            <option selected value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @else
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endif
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
                                        @if($subcategory->id == $product->id_subcategory_origen)
                                            <option selected value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @else
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endif
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
                                        @if($subcategory->id == $product->id_subcategory_sustrato)
                                            <option selected value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @else
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endif
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
                                        @if($subcategory->id == $product->id_subcategory_color)
                                            <option selected value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @else
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endif
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


                        <!-- Precio -->
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Precio al público<span>*</span></label>
                            <div class="col-md-6">
                                <input id="price" name="price" type="number" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}" required>

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

                        <!-- Ficha tecnica cargada-->
                        <div class="row form-group">
                            <label for="pdf_file" class="col-md-4 col-form-label text-md-right"><span class="icon-file-pdf-o"></span></label>
                            <div class="col-md-6">
                                <a href="{{ asset('ficha_tecnica') }}/{{ $product->pdf_file }}" target="_blank" rel="noopener noreferrer">{{ $product->pdf_file }}</a>
                            </div>
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

    <script src="{{ asset('js/utils.js') }}?v={{ env('APP_VERSION', '1') }}"></script>
    <script src="{{ asset('js/product-register.js') }}?v={{ env('APP_VERSION', '1') }}"></script>
<script>

    $(function(){

        GLOBAL_URL = "{{ asset('images/image_products') }}";
        GLOBAL_PRODUCT_NAME = "{{ $product->name }}";

    });

</script>

@endsection
