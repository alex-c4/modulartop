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
                <p class="mb-5"><strong class="text-white">Procesar orden de venta</strong></p>
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
                    <form method="POST" action="{{ route('ordersale.processorder') }}" enctype="multipart/form-data">
                    
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input type="hidden" name="hIdOrderSale" id="hIdOrderSale" value="{{ $order->id }}">

                        <!-- ID -->
                        <div class="row form-group">
                            <label class="col-md-4 col-form-label text-md-right">ID</label>
                            <div class="col-md-6">
                                <input type="text" value="{{ $order->id }}" disabled>
                            </div>
                        </div>


                        <!-- Usuario -->
                        <div class="row form-group">
                            <label for="filepdf" class="col-md-4 col-form-label text-md-right">Cliente</label>
                            <div class="col-md-6">
                                <input type="text" value="{{ $order->userName}} {{ $order->userLastName}}" disabled>
                            </div>
                        </div>


                        <!-- Fecha de creacion -->
                        <div class="row form-group">
                            <label for="filepdf" class="col-md-4 col-form-label text-md-right">Fecha de creación</label>
                            <div class="col-md-6">
                                <input type="text" value="{{ $order->created_at }}" disabled>
                            </div>
                        </div>

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

                            <div class="form-group row mb-1 mt-3">
                                <div class="col-md-6 offset-md-4">
                                    <a href="{{ route('ordersale.index') }}" class="btn btn-primary">Volver</a>
                                </div>
                            </div>
                        @else
                            <!-- Ventas -->
                            <div class="form-group row">
                                <label for="sale" class="col-md-12 col-form-label text-md-left ">Ventas<span>*</span></label>
                                <div class="col-md-12">
                                    <select class="form-control" id="sale" name="sale" required>
                                    @foreach($sales as $sale)
                                        <option value="{{ $sale->id }}">{{ $sale->id }} - {{ $sale->userName }} {{ $sale->userLastName }} / {{ $sale->created_at }}</option>
                                    @endforeach
                                    </select>

                                    @error('sale')
                                        <span class="invalid-field" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-1 mt-3">
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Asociar orden" class="btn btn-primary">
                                </div>
                            </div>
                        @endif


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
