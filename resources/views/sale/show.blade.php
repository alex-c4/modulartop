@extends('layouts.layoutSidebar')

@section('header')
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">

    <link rel="stylesheet" href="{{ asset('css/sale.css') }}?v={{ env('APP_VERSION', '1') }}">
@endsection


@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Ventas
@endsection

@section('subtitle')
Consultar venta
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


    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form id="form_savesale" method="POST" action="{{ route('sale.store') }}" enctype="multipart/form-data">
                    

                        <!-- Fecha de venta -->
                        <div class="form-group row">
                            <label for="sale_date" class="col-lg-4 col-form-label text-lg-right">Fecha de venta</label>
                            <div class="col-lg-6">
                                <input disabled id="sale_date" name="sale_date" type="text" class="form-control" value="{{ explode(' ', $sale->sale_date)[0] }}">
                            </div>
                        </div>

                        <!-- Cliente -->
                        <div class="form-group row">
                            <label for="client" class="col-md-4 col-form-label text-md-right">Cliente</label>
                            <div class="col-md-6">
                                <input disabled id="client" name="client" type="text" class="form-control" value="{{ $sale->clientName }} {{ $sale->clientLastName }}">
                            </div>
                        </div>
                        
                        <!-- Id de la factura de la venta -->
                        <div class="form-group row">
                            <label for="invoice_sale" class="col-lg-4 col-form-label text-lg-right">Id factura</label>
                            <div class="col-lg-6">
                                <input disabled disabled maxlength="30" id="invoice_sale" name="invoice_sale" autocomplete="off" type="text" class="form-control" value="{{ $sale->id_invoice_sale }}" required>
                            </div>
                        </div>

                        <!-- Id de orden de venta -->
                        <div class="form-group row">
                            <label for="id_order_sale" class="col-md-4 col-form-label text-md-right">Id requerimiento</label>
                            <div class="col-md-6">
                                <input disabled maxlength="30" id="id_order_sale" name="id_order_sale" autocomplete="off" type="text" class="form-control" value="{{ $sale->id_order_sale }}" required>

                            </div>
                        </div>

                        <!-- Descripcion -->
                        <div class="row form-group">
                            <label for="observations" class="col-md-4 col-form-label text-md-right">Descripción</label>
                            <div class="col-md-6">
                                <textarea disabled id="observations" name="observations" rows="7" class="form-control">{{ $sale->observations }}</textarea>
                            </div>
                        </div>

                        <!-- Factura -->
                        <div class="row form-group">
                            <label for="invoice_filepdf" class="col-md-4 col-form-label text-md-right">Factura</label>
                            <div class="col-md-6">
                                @if($sale->invoice_filepdf != "")
                                    <a href="{{ asset('invoice_client_bySale') }}/{{ $sale->invoice_filepdf }}" target="_blank">{{ $sale->invoice_filepdf }}</a>
                                @else
                                    <label class="col-form-label text-md-right">No posee factura.</label>
                                @endif

                            </div>
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
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        <div class="form-group row mb-1 mt-3">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('sale.saleslist') }}" class="btn btn-primary">Volver</a>
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

    <script src="{{ asset('js/bootstrap-table.min.js') }}"></script>
    
    <script>
        var sale_items = @json($sale_items);

        $(function(){
            
            $table = $('#product_table');
            $table.bootstrapTable('destroy').bootstrapTable({
                locale: "es-ES"
            });

            sale_items.forEach(item => {
                $table.bootstrapTable('append', item);
                
            });

        });

    </script>

@endsection
