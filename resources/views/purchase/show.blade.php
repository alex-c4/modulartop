@extends('layouts.layoutSidebar')

@section('header')
    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}?v={{ env('APP_VERSION', '1') }}">
    
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">   

@endsection


@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Compras
@endsection

@section('subtitle')
Consultar compra
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
                    <form id="form_savepurchase" name="form_savepurchase" method="POST" action="{{ route('purchase.store') }}">
                    
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input type="hidden" name="hProducts" id="hProducts">

                        <!-- Fecha de compra -->
                        <div class="form-group row">
                            <label for="purchase_date" class="col-lg-4 col-form-label text-lg-right">Fecha de compra</label>
                            <div class="col-lg-6">
                                <input id="purchase_date" name="purchase_date" type="text" class="form-control" value="{{ $purchase->purchase_date }}" readonly>
                            </div>
                        </div>

                        <!-- Proveedores -->
                        <div class="row form-group" >
                            <label class="col-lg-4 col-form-label text-lg-right" for="provider">Proveedor</label>
                            <div class="col-md-6">
                                <select class="custom-select" id="provider" name="provider" disabled>
                                    @foreach($providers as $provider)
                                        @if($purchase->id_provider == $provider->id)
                                            <option selected value="{{ $provider->id }}">{{ $provider->name}}</option>
                                        @else
                                            <option value="{{ $provider->id }}">{{ $provider->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>

                        <!-- Id de factura -->
                        <div class="form-group row">
                            <label for="id_invoice" class="col-lg-4 col-form-label text-lg-right">Id de factura</label>
                            <div class="col-lg-6">
                                <input maxlength="30" id="id_invoice" name="id_invoice" type="text" class="form-control" value="{{ $purchase->id_invoice }}" readonly>
                            </div>
                        </div>

                        <!-- Observaciones -->
                        <div class="form-group row">
                            <label for="observations" class="col-lg-4 col-form-label text-lg-right">Observaciones</label>
                            <div class="col-lg-6">
                                <textarea id="observations" name="observations" rows="7" class="form-control" readonly>{{ $purchase->observations }}</textarea>
                            </div>
                        </div>


                        <table 
                            id="purchase-table"
                            data-toggle="table"
                            locale="es-ES">
                            <thead>
                                <tr>
                                    <th data-field="id" data-visible="false" ></th>
                                    <th data-field="name" >Producto</th>
                                    <th data-field="quantity" >Cantidad</th>
                                    <th data-field="cost" >P.V.P</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>


                        <div class="form-group row my-3">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('purchase.index') }}" class="btn btn-primary">Volver</a>
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

    <script src="{{ asset('js/locale/bootstrap-table-es-ES.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>


    <script>
        jQuery(function() { 
            debugger
            $table = $('#purchase-table');
            // $table.bootstrapTable('destroy').bootstrapTable({
            //     locale: "es-ES"
            // });
            const items = @json($items);
            $table.bootstrapTable('append', items);
        })
    </script>
@endsection
