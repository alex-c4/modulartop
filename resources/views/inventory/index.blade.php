@extends('layouts.layoutSidebar')

@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Inventario
@endsection

@section('subtitle')
Lista de inventario
@endsection


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

    <!-- <div>
        <a href="{{ route('inventory.download') }}" class="btn btn-primary m-3" target="_blank">
            <span class="icon-file-pdf-o"></span>
            Descargar a PDF</a>
    </div> -->
    <div style="display: flex">
        <form class="form-inline" method="POST" action="{{ route('inventory.searchProduct') }}">
            @csrf
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" class="form-control" id="productName" name="productName" placeholder="Nombre" value="@if (isset($productName)){{ $productName }}@endif">
            </div>
            
            <button type="submit" class="btn btn-primary mb-2">Buscar</button>
        </form>
        
        <form class="form-inline" method="POST" action="{{ route('inventory.download') }}">
            @csrf
            <input type="hidden" id="hProductName" name="hProductName" value="@if (isset($productName)){{ $productName }}@endif">
            <button type="submit" class="btn btn-primary mb-2 ml-3">Descargar a PDF</button>
            <!-- <a href="{{ route('inventory.download') }}" class="btn btn-primary mb-2 ml-3" target="_blank">
                <span class="icon-file-pdf-o"></span>
                Descargar a PDF</a> -->
        </form>

    </div>


    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="header" scope="col">Código</th>
                    <th class="header" scope="col">Nombre</th>
                    <th class="header" scope="col">Tipo</th>
                    <th class="header" scope="col">Acabado</th>
                    <th class="header" scope="col">Ancho/Largo/Espesor</th>
                    <th class="header" scope="col">Material</th>
                    <th class="header" scope="col">Sustrato</th>
                    <th class="header" scope="col">P.V.P</th>
                    <th class="header" scope="col">Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventory as $key => $item)
                <tr @if($item->invQuantity <= 10) class="table-danger" @endif>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->productName }}</td>
                    <td>{{ $item->productType }}</td>
                    <td>{{ $item->productAcabado }}</td>
                    <td>{{ $item->width }}/{{ $item->length }}/{{ $item->thickness }}</td>
                    <td>{{ $item->productMaterial }}</td>
                    <td>{{ $item->productSustrato }}</td>
                    <td>{{ $item->price }}</td>
                    <th>{{ $item->invQuantity }}</th>
                </tr>
                @endforeach
            </tbody>
    
        </table>
    </div>

</div>

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
