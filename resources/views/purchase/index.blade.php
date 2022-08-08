@extends('layouts.layoutSidebar')

@section('header')
    <style>
        .table{
            font-size: smaller;
        }
        
        @media (max-width: 768px) {
            .table{
                font-size: xx-small;
            }
        }
    </style>
@endsection

@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Compras
@endsection

@section('subtitle')
Lista de compras registradas
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

        <form class="form-inline" method="POST" action="{{ route('purchase.searchPurchase') }}">
            @csrf
            <div class="form-row">
                <div class="form-group mx-2 mb-2 col-sm-12 col-md-3">
                    <label for="purchase_date_start" >Fecha inicial</label>
                    <input readonly id="purchase_date_start" name="purchase_date_start" autocomplete="off" type="text" class="form-control" value="{{ old('purchase_date_start', $purchase_date_start) }}">
                </div>
                <div class="form-group mx-2 mb-2 col-sm-12 col-md-3">
                    <label for="purchase_date_end" >Fecha fin</label>
                    <input readonly id="purchase_date_end" name="purchase_date_end" autocomplete="off" type="text" class="form-control" value="{{ old('purchase_date_end', $purchase_date_end) }}">
                </div>
                <div class="form-group mx-2 mb-2 cosm-12-3 col-md-2">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
                <div class="form-group mx-2 mb-2 cosm-12-3 col-md-3">
                    <a href="javascript:void(0)" class="btn btn-primary m-3" onclick="onclick_downloadpdf()">
                    <span class="icon-file-pdf-o"></span> Descargar a PDF</a>
                </div>
            </div>
        </form>

        <form id="form_downloadpdf" action="{{ route('purchase.downloadpurchase') }}" method="post">
            @csrf
            <input type="hidden" name="startDate" id="startDate">
            <input type="hidden" name="endDate" id="endDate">

        </form>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="header" scope="col">#</th>
                        <th class="header" scope="col">Fecha de compra</th>
                        <th class="header" scope="col">Proveedor</th>
                        <th class="header" scope="col">Id de factura</th>
                        <th class="header" scope="col"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($purchases as $key => $purchase)
                        <tr>
                            <th>{{ $key += 1 }}</th>
                            <td>{{ $purchase->purchase_date }}</td>
                            <td>{{ $purchase->provider }}</td>
                            <td>{{ $purchase->id_invoice }}</td>
                            <td>
                                <a href="{{ route('purchase.show', $purchase->id) }}" title="Ver" ><span class="icon-pencil p-1 icon-eye"></span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



    </div>

</section>   

<style type="text/css">
    .table-responsive thead tr th{
        position: sticky;
        top: 0;
        z-index: 10;
        background-color: #e6e4e4;
        
    }
    .table-responsive{
        height: 80vh;
        overflow:scroll;
    }
</style>

@endsection

@section('script')

<script src="{{ asset('js/purchase.js') }}?v={{ env('APP_VERSION', '1') }}"></script>

<script>
    $(function(){
        $('#purchase_date_start').datepicker({
            format: "yyyy-mm-dd",
            language: "en",
            autoclose: true,
            startView: 0,
            endDate: "0d"
        });

        $('#purchase_date_end').datepicker({
            format: "yyyy-mm-dd",
            language: "en",
            autoclose: true,
            startView: 0,
            endDate: "0d"
        });

        // $table = $('#purchase_table');
        // $table.bootstrapTable('destroy').bootstrapTable({
        //     locale: "es-ES"
        // });

    });
</script>
@endsection
