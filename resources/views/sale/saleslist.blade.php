@extends('layouts.layoutSidebar')

@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Ventas
@endsection

@section('subtitle')
Lista de ventas
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
        <a href="{{ route('sales.downloadsales') }}" class="btn btn-primary m-3" target="_blank">
            <span class="icon-file-pdf-o"></span>
            Descagar a PDF</a>
    </div>
    
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Vendedor</th>
                <th scope="col">Fecha de venta</th>
                <th scope="col">Cliente</th>
                <th scope="col">ID de factura</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $key => $sale)
            <tr>
                <th>{{ $key += 1 }}</th>
                <td>{{ ucfirst($sale->sellerName) }} {{ ucfirst($sale->sellerLastName) }}</td>
                <td>{{ $sale->saleDate }}</td>
                <td>{{ ucfirst($sale->buyerName) }} {{ ucfirst($sale->buyerLastName) }}</td>
                <td>{{ $sale->invoiceId }}</td>
                <td>
                    <a href="{{ route('sale.show', $sale->saleId) }}"><span class="icon-eye"></span></a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>


@endsection
