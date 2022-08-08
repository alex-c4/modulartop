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

    <div>
        <a href="{{ route('inventory.download') }}" class="btn btn-primary m-3" target="_blank">
            <span class="icon-file-pdf-o"></span>
            Descargar a PDF</a>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Producto</th>
                <th scope="col">Tipo</th>
                <th scope="col">Acabado</th>
                <th scope="col">Ancho/Espesor/Largo</th>
                <th scope="col">Material</th>
                <th scope="col">Sustrato</th>
                <th scope="col">P.V.P</th>
                <th scope="col">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventory as $key => $item)
            <tr @if($item->invQuantity <= 10) class="table-danger" @endif>
                <td>{{ $item->code }}</td>
                <td>{{ $item->productName }}</td>
                <td>{{ $item->productType }}</td>
                <td>{{ $item->productAcabado }}</td>
                <td>{{ $item->width }}/{{ $item->thickness }}/{{ $item->length }}</td>
                <td>{{ $item->productMaterial }}</td>
                <td>{{ $item->productSustrato }}</td>
                <td>{{ $item->price }}</td>
                <th>{{ $item->invQuantity }}</th>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>


@endsection
