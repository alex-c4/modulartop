@extends('layouts.layoutSidebar')

@section('header')

@endsection


@section('content')

@section('banner')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/novedades/newsletter-novedades.jpg') }});" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5 mx-auto mt-lg-5 text-center">
                <h1>Orden de venta</h1>
                <p class="mb-5"><strong class="text-white">Detalles orden de venta</strong></p>
            </div>
        </div>
    </div>

    <!-- <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a> -->
</div> 

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

    <div class="row mb-5">
        <div class="col-12 text-center">
        <h2 class="section-title mb-3 text-black">Orden de venta</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('ordersale.store') }}" enctype="multipart/form-data">
                    
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">


                        <!-- Usuario -->
                        <div class="row form-group">
                            <label for="filepdf" class="col-md-4 col-form-label text-md-right">Cliente</label>
                            <div class="col-md-6">
                                <input type="text" value="{{ $order->userName}} {{ $order->userLastName}}" disabled>
                            </div>
                        </div>

                        <!-- Planilla de compra -->
                        <div class="row form-group">
                            <label for="filepdf" class="col-md-4 col-form-label text-md-right">Planilla de compra</label>
                            <div class="col-md-6">
                                <a href="{{ route('ordersale.downloadplanilla', $order->id) }}"><span class="icon-file-excel-o"></span> {{ $order->file_name }}</a>
                            </div>
                        </div>

                        <!-- Estatus -->
                        <div class="row form-group">
                            <label for="filepdf" class="col-md-4 col-form-label text-md-right">Estatus</label>
                            <div class="col-md-6">
                            <input type="text" value="{{ $order->statusName }}" disabled>
                            </div>
                        </div>


                        <div class="form-group row mb-1 mt-3">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('ordersale.index') }}" class="btn btn-primary">Volver</a>
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


@endsection
