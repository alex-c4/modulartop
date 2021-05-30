@extends('layouts.layoutSidebar')

@section('header')
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">

    <link rel="stylesheet" href="{{ asset('css/sale.css') }}?v={{ env('APP_VERSION', '1') }}">
@endsection


@section('content')

@section('banner')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/novedades/newsletter-novedades.jpg') }});" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5 mx-auto mt-lg-5 text-center">
                <h1>Ventas</h1>
                <p class="mb-5"><strong class="text-white">Creacion de venta</strong></p>
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
        <h2 class="section-title mb-3 text-black">Nueva venta</h2>
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

                        <!-- Fecha de venta -->
                        <div class="form-group row">
                            <label for="sale_date" class="col-lg-4 col-form-label text-lg-right">Fecha de venta<span>*</span></label>
                            <div class="col-lg-6">
                                <input id="sale_date" name="sale_date" autocomplete="off" type="text" class="form-control @error('sale_date') is-invalid @enderror" value="{{ old('sale_date') }}" required>

                                @error('sale_date')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Cliente -->
                        <div class="form-group row">
                            <label for="client" class="col-md-4 col-form-label text-md-right">Cliente<span>*</span></label>
                            <div class="col-md-6">
                                <select class="form-control @error('client') is-invalid @enderror" id="client" name="client" required>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }} {{ $client->lastName }}</option>
                                @endforeach
                                </select>

                                @error('client')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Id de la factura de la venta -->
                        <div class="form-group row">
                            <label for="invoice_sale" class="col-lg-4 col-form-label text-lg-right">Id factura<span>*</span></label>
                            <div class="col-lg-6">
                                <input id="invoice_sale" name="invoice_sale" autocomplete="off" type="text" class="form-control @error('invoice_sale') is-invalid @enderror" value="{{ old('invoice_sale') }}" required>

                                @error('invoice_sale')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Id de orden de vanta -->
                        <div class="form-group row">
                            <label for="id_order_sale" class="col-md-4 col-form-label text-md-right">Id orden de compra<span>*</span></label>
                            <div class="col-md-6">
                                <select class="form-control" id="id_order_sale" name="id_order_sale" >
                                    <option value="0">Seleccione...</option>
                                @foreach($orders as $order)
                                    <option value="{{ $order->orderSaleId }}">{{ $order->orderSaleId }} - {{ $order->orderSaleCreatedAt }} - {{ $order->userName }} {{ $order->userLastName }}</option>
                                @endforeach
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
                            <div class="form-group col-md-2">
                                <label for="quantity">Cantidad</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" min="1">
                            </div>


                            <div class="form-group col-md-10">
                                <label for="productList">Producto</label>
                                <select class="custom-select" id="productList" name="productList" onchange="onchage_product(this)">
                                    <option value="0" selected>Seleccione...</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row col-12 mb-3">
                            <label>&nbsp;</label>
                            <input type="button" value="Agregar" class="btn btn-primary" onclick="onclick_addProduct()">
                        </div>

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

</section>

@endsection

@section('script')

    <script src="{{ asset('bootstrap-table.min') }}"></script>
    
    <script src="{{ asset('js/sale.js') }}?v={{ env('APP_VERSION', '1') }}"></script>

@endsection
