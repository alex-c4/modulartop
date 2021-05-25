@extends('layouts.layoutSidebar')

@section('content')

@section('banner')


<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/novedades/newsletter-novedades.jpg') }});" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5 mx-auto mt-lg-5 text-center">
                <h1>Inventario</h1>
                <p class="mb-5"><strong class="text-white">Lista de inventario</strong></p>
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
