@extends('layouts.layoutSidebar')

@section('header')
    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}?v={{ env('APP_VERSION', '1') }}">

    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">
    
@endsection


@section('content')

@section('banner')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/novedades/newsletter-novedades.jpg') }});" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5 mx-auto mt-lg-5 text-center">
                <h1>Compras</h1>
                <p class="mb-5"><strong class="text-white">Creacion de una nueva compra</strong></p>
        
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
        <h2 class="section-title mb-3 text-black">Nueva compra</h2>
        </div>
    </div>

    <!-- mensaje para la creacion de las compras -->
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
                    <form id="form_savepurchase" method="POST" action="{{ route('purchase.store') }}">
                    
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input type="hidden" name="hProducts" id="hProducts">

                        <!-- Fecha de compra -->
                        <div class="form-group row">
                            <label for="purchase_date" class="col-lg-4 col-form-label text-lg-right">Fecha de compra<span>*</span></label>
                            <div class="col-lg-6">
                                <input id="purchase_date" name="purchase_date" autocomplete="off" type="text" class="form-control @error('purchase_date') is-invalid @enderror" value="{{ old('purchase_date') }}" required>

                                @error('purchase_date')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Proveedores -->
                        <div class="row form-group" >
                            <label class="col-lg-4 col-form-label text-lg-right" for="provider">Proveedor<span>*</span></label>
                            <div class="col-md-6">
                                <div class="input-group" >
                                    <select class="custom-select" id="provider" name="provider">
                                        @foreach($providers as $provider)
                                            <option value="{{ $provider->id }}">{{ $provider->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button style="height: 38px" id="btnAddProvider" data-toggle="modal" data-target="#providerModal" title="Agregar nuevo proveedor" class="btn btn-primary" type="button"><span class="icon-add" style="color: white !important;"></span></button>
                                    </div>
                                </div>
                                <small id="addMessage" name="addMessage" class="form-text text-muted"></small>
                            </div>
                        </div>

                        <!-- Id de factura -->
                        <div class="form-group row">
                            <label for="id_invoice" class="col-lg-4 col-form-label text-lg-right">Id de factura<span>*</span></label>
                            <div class="col-lg-6">
                                <input id="id_invoice" name="id_invoice" type="text" class="form-control @error('id_invoice') is-invalid @enderror" value="{{ old('id_invoice') }}" required>
                                @error('id_invoice')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Observaciones -->
                        <div class="form-group row">
                            <label for="observations" class="col-lg-4 col-form-label text-lg-right">Observaciones</label>
                            <div class="col-lg-6">
                                <textarea id="observations" name="observations" rows="7" class="form-control">{{ old('observations') }}</textarea>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="quantity">Cantidad</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" min="1">
                            </div>


                            <div class="form-group col-md-8">
                                <label for="productList">Producto</label>
                                <div class="input-group" >
                                    <select class="custom-select" id="productList" name="productList" onchange="onchage_product(this)">
                                        <option value="0" selected>Seleccione...</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button style="height: 38px" data-toggle="modal" data-target="#productModal" title="Nuevo producto" class="btn btn-primary" type="button"><span class="icon-add" style="color: white !important;"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row col-12 mb-3">
                            <label>&nbsp;</label>
                            <input type="button" value="Agregar" class="btn btn-primary" onclick="onclick_addProduct()">
                        </div>

                        <!-- <div class="form-row col-12"> -->
                            <table 
                                id="purchase-table"
                                data-toggle="table"
                                locale="es-ES">
                                <thead>
                                    <tr>
                                        <th data-field="id" data-visible="false" ></th>
                                        <th data-field="name" >Producto</th>
                                        <th data-field="quantity" >Cantidad</th>
                                        <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">&nbsp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        <!-- </div> -->

                        
<br>
                        
                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary" id="btnSave" name="btnSave">
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


<!-- modal para agregar nuevo proveedor -->
<div class="modal fade" id="providerModal" tabindex="-1" aria-labelledby="providerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <input type="hidden" id="hRouteProvider" value="{{ route('provider.storeajax') }}">

        <div class="form-group">
            <label for="txtProviderName">Nuevo proveedor</label>
                <input type="text" class="form-control" id="txtProviderName">
            </div>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="onclick_addProvider()">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- modal para agregar nuevo producto -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('product.storeajax') }}" method="post" id="form_create_product">

            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            
            <!-- Codigo -->
            <div class="form-group row">
                <label for="code" class="col-md-4 col-form-label text-md-right">Código<span>*</span></label>
                <div class="col-md-6">
                    <input id="code" name="code" type="text" class="form-control" >
                    <span class="invalid-field" role="alert" style="display:none" id="code-msg">
                        <strong>Campo obligatorio</strong>
                    </span>
                </div>
            </div>

            <!-- Nombre -->
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre<span>*</span></label>
                <div class="col-md-6">
                    <input id="name" name="name" type="text" class="form-control" >
                    <span class="invalid-field" role="alert" style="display:none" id="name-msg">
                        <strong>Campo obligatorio</strong>
                    </span>
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
                    
                </div>
            </div>

            <!-- Descripcion -->
            <div class="row form-group">
                <label for="description" class="col-md-4 col-form-label text-md-right">Descripción<span>*</span></label>
                <div class="col-md-6">
                    <textarea id="description" name="description" rows="7" class="form-control"></textarea>
                    <span class="invalid-field" role="alert" style="display:none" id="description-msg">
                        <strong>Campo obligatorio</strong>
                    </span>
                </div>
            </div>

            <!-- Imagen -->
            <div class="row form-group">
                <label for="image_0" class="col-md-4 col-form-label text-md-right">Imagen<span>*</span></label>
                <div class="col-md-6">
                    <input type="file" id="image_0" name="image_0" accept="image/png, image/jpeg, image/jpg" class="form-control mt-2" placeholder="Imagen" required>
                    <span class="invalid-field" role="alert" style="display:none" id="image_0-msg">
                        <strong>Campo obligatorio</strong>
                    </span> 
                </div>
                
            </div>


            <!-- Precio -->
            <div class="form-group row">
                <label for="price" class="col-md-4 col-form-label text-md-right">Precio al público<span>*</span></label>
                <div class="col-md-6">
                    <input id="price" name="price" type="number" class="form-control">
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

            <div id="message_alert">
                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="btnSaveProduct" >Guardar</button>
            </div>

      </form><!-- Fin form -->
      
    </div>
  </div>
</div>


</section>

@endsection

@section('script')

    <script src="{{ asset('bootstrap-table.min') }}"></script>

    <script src="{{ asset('js/locale/bootstrap-table-es-ES.min.js') }}"></script>

    <script src="{{ asset('js/utils.js') }}?v={{ env('APP_VERSION', '1') }}"></script>
    
    <script src="{{ asset('js/purchase.js') }}?v={{ env('APP_VERSION', '1') }}"></script>

@endsection
