@extends('layouts.layoutSidebar')

@section('content')

@section('banner')


<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/novedades/newsletter-novedades.jpg') }});" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5 mx-auto mt-lg-5 text-center">
                <h1>Ventas</h1>
                <p class="mb-5"><strong class="text-white">Lista de ventas</strong></p>
            </div>
        </div>
    </div>

    <!-- <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a> -->
</div> 

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
            </tr>
            @endforeach
        </tbody>

    </table>

</div>


@endsection
