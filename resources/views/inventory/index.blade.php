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

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Producto</th>
                <th scope="col">Color</th>
                <th scope="col">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventory as $key => $item)
            <tr @if($item->invQuantity <= 10) class="table-danger" @endif>
                <td>{{ $item->productName }}</td>
                <td>{{ $item->productColor }}</td>
                <th>{{ $item->invQuantity }}</th>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>


@endsection
