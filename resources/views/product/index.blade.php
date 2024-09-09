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
Productos
@endsection

@section('subtitle')
Lista de productos registrados
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

    <form class="form-inline" method="POST" action="{{ route('product.searchProduct') }}">
        @csrf
        <div class="form-group mx-sm-3 mb-2">
            <label for="productName" class="sr-only">Producto</label>
            <input type="text" class="form-control" id="productName" name="productName" placeholder="Nombre" value="@if (isset($productName)){{ $productName }}@endif">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Buscar</button>
    </form>

    <div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="header" scope="col">#</th>
                <th class="header" scope="col">Código</th>
                <th class="header" scope="col">Nombre</th>
                <th class="header" scope="col">Tipo</th>
                <th class="header" scope="col">Acabados</th>
                <th class="header" scope="col">Ancho/Largo/Espesor</th>
                <th class="header" scope="col">Material</th>
                <th class="header" scope="col">Sustrato</th>
                <th class="header" scope="col">P.V.P</th>
                <th class="header" scope="col"></th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($products as $key => $product)
            <tr @if($product->product_isdeleted == 1) class="table-danger" @endif>
                <th>{{ $key += 1 }}</th>
                <td>{{ $product->code }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_type_name }}</td>
                <td>{{ $product->acabado }}</td>
                <td>{{ Utils::eliminarCerosDecimales($product->width) }}/{{ Utils::eliminarCerosDecimales($product->length) }}/{{ Utils::eliminarCerosDecimales($product->thickness) }}</td>
                <td>{{ $product->material }}</td>
                <td>{{ $product->sustrato }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('product.edit', $product->id) }}" title="Editar" ><span class="icon-pencil p-1 icon-gray"></span></a>
                    @if($product->product_isdeleted == 1)
                        <a href="{{ route('product.restore', $product->id) }}" title="Restaurar" ><span class="icon-check p-1 icon-green"></span></a>
                    @else
                        <a href="{{ route('product.delete', $product->id) }}" title="Inactivar" ><span class="icon-close p-1 icon-red"></span></a>
                    @endif
                    <a href="{{ route('product.show', $product->id) }}" title="Ver" ><span class="icon-pencil p-1 icon-eye"></span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

</div>

</section>

<style type="text/css">
    thead tr th{
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

