@extends('layouts.layoutSidebar')

@section('header')
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">

    <link rel="stylesheet" href="{{ asset('css/sale.css') }}?v={{ env('APP_VERSION', '1') }}">

    <style>
        #smallInfo{
            color: black !important;
            text-decoration: underline;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">   

@endsection


@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Ventas
@endsection

@section('subtitle')
Creacion de venta
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

    @if(isset($lowInventoryProducts) != null && count($lowInventoryProducts) > 0)
        <div class="row justify-content-center mt-3 mb-3">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <label>Producto esta por debajo de inventario</label>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <label><strong>Producto</strong></label>
                                <label><strong>Cantidad</strong></label>
                            </li>
                        <ul class="list-group">
                            @foreach($lowInventoryProducts as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $item["productName"] }}
                                <span class="badge badge-warning badge-pill">{{ $item["productQuantity"] }}</span>
                            </li>
                            @endforeach
                        </ul>
            
                    </div>
                </div>
            </div>
        </div>

    @endif

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form id="form_savesale" method="POST" action="{{ route('sale.store') }}" enctype="multipart/form-data">
                    
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input type="hidden" name="hProducts" id="hProducts">
                        <input type="hidden" name="hRouteValidateInventory" id="hRouteValidateInventory" value="{{ route('sale.validarExistencia') }}">

                        <!-- Fecha de venta -->
                        <div class="form-group row">
                            <label for="sale_date" class="col-lg-4 col-form-label text-lg-right">Fecha de venta<span class="asterisco">*</span></label>
                            <div class="col-lg-6">
                                <input id="sale_date" name="sale_date" autocomplete="off" type="text" class="form-control @error('sale_date') is-invalid @enderror" value="{{ old('sale_date') }}" required>

                                @error('sale_date')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div id="errorDivSaleDate"></div>
                            </div>
                        </div>

                        <!-- Cliente -->
                        <div class="form-group row">
                            <label for="client" class="col-md-4 col-form-label text-md-right">Cliente<span class="asterisco">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group" >
                                    <select class="custom-select @error('client') is-invalid @enderror" id="client" name="client" required>
                                        <option value="">-Seleccione-</option>
                                        @foreach($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }} {{ $client->lastName }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button style="height: 38px" id="btnAddSubtype" data-toggle="modal" data-target="#clientModal" title="Agregar nuevo cliente" class="btn btn-primary" type="button"><span class="icon-add" style="color: white !important;"></span></button>
                                    </div>

                                    @error('client')
                                        <span class="invalid-field" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div id="errorDivClient"></div>
                            </div>
                        </div>
                        
                        <!-- Id de la factura de la venta -->
                        <div class="form-group row">
                            <label for="invoice_sale" class="col-lg-4 col-form-label text-lg-right">Id factura<span class="asterisco">*</span></label>
                            <div class="col-lg-6">
                                <input maxlength="30" id="invoice_sale" name="invoice_sale" autocomplete="off" type="text" class="form-control @error('invoice_sale') is-invalid @enderror" value="{{ old('invoice_sale') }}" required>
                                @error('invoice_sale')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div id="errorDivInvoceSale"></div>
                            </div>
                        </div>

                        <!-- Id de orden de compra -->
                        <div class="form-group row">
                            <label for="id_order_sale" class="col-md-4 col-form-label text-md-right">Id orden de compra</label>
                            <div class="col-md-6">
                                <select class="form-control" id="id_order_sale" name="id_order_sale" >
                                    <option value="0">Seleccione...</option>
                                </select>
                            </div>
                        </div>
                            
                        <!-- Descripcion -->
                        <div class="row form-group">
                            <label for="observations" class="col-md-4 col-form-label text-md-right">Descripción</label>
                            <div class="col-md-6">
                                <textarea id="observations" name="observations" rows="7" class="form-control"></textarea>
                            </div>
                        </div>

                        <!-- Factura -->
                        <div class="row form-group">
                            <label for="invoice_filepdf" class="col-md-4 col-form-label text-md-right">Factura</label>
                            <div class="col-md-6">
                                <input type="file" id="invoice_filepdf" name="invoice_filepdf" accept="application/pdf" class="form-control mt-2" placeholder="Factura">
                            </div>
                        </div>

                        <div class="form-row">

                            <!-- Cantidad -->
                            <div class="form-group col-md-2">
                                <label for="quantity">Cantidad</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" min="1">
                            </div>

                            <!-- Productos -->
                            <div class="form-group col-md-10">
                                <label for="productList">Producto</label>
                                <div class="input-group">
                                    <select id="productList" name="productList" class="selectpicker form-control custom-select" data-live-search="true" onchange="onchage_product(this)">
                                        <option value="0" selected>Seleccione...</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">({{ $product->code }}) {{ $product->name}} - {{ $product->width }}/{{ $product->thickness }}/@if($product->length != "") {{ $product->length }} @else 0 @endif</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="form-row col-12 mb-3">
                            <label>&nbsp;</label>
                            <input type="button" value="Agregar" id="btnAddProduct" class="btn btn-primary" onclick="onclick_addProduct()">
                        </div>
                        <small class="form-text text-muted text-center" id="smallInfo"></small>

                        <table 
                            id="product_table"
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

                        <div id="message_alert-2" class="alert alert-primary" role="alert">
                        </div>
                        
                        <div class="form-group row mb-1 mt-3">
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

<!-- Modal section -->

<!-- modal Clientes -->
<div class="modal fade" id="clientModal" tabindex="-1" aria-labelledby="clientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
      
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="form_client" action="{{ route('userClient.storeAjax') }}" method="post">

                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" id="hClientAddRoute" value="{{ route('userClient.storeAjax') }}">
                
                    <!-- Nombre -->
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nombre<span>*</span></label>

                        <div class="col-md-6">
                            <input maxlength="20" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

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
                            <input maxlength="20" id="lastName" name="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" value="{{ old('lastName') }}" required>

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
                            <input maxlength="60" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">

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
                                @if($rol->nombre == 'Cliente')
                                <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                @endif
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
                            <label class="form-check-label" for="chkClient" >Cliente</label>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input type="checkbox" checked="checked" disabled="disabled" class="form-check-input" id="chkClient" name="chkClient">
                            </div>
                        </div>
                    </div>

                    <!-- contenedor cliente -->
                    <div class="container-hidden" id="divContainer">

                        <!-- RIF -->
                        <div class="form-group row">

                            <label for="rif" class="col-md-4 col-form-label text-md-right">Rif<span>*</span></label>

                            <div class="col-md-6">
                                <input maxlength="20" id="rif" type="text" class="form-control @error('rif') is-invalid @enderror uppercase-field" name="rif" >

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
                                <input maxlength="50" id="rsocial" name="rsocial" type="text" class="form-control @error('rsocial') is-invalid @enderror">

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

                    </div>

                    <!-- Mensaje de respuesta de la operación -->
                    <div id="message_alert_client" class="m-1">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="btnSaveClient">Guardar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<!-- End Modal section -->

</section>

@endsection

@section('script')
    <script src="{{ asset('js/jquery-validate-1_19.js') }}"></script>

    <script src="{{ asset('js/utils.js') }}?v={{ env('APP_VERSION', '1') }}"></script>

    <script src="{{ asset('js/bootstrap-table.min.js') }}"></script>
    
    <script src="{{ asset('js/sale.js') }}?v={{ env('APP_VERSION', '1') }}"></script>

    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

    <script>

        var order_sales = @json($orders);
        $(function(){
            Utils.hideAlert("message_alert-2");
        });    

    </script>

@endsection
