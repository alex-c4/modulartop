@extends('layouts.layoutSidebar')

@section('header')

@endsection


@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Orden de compra
@endsection

@section('subtitle')
Creación orden de compra
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
            <strong>{!! $msgPost !!}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('ordersale.store') }}" enctype="multipart/form-data" name="form_ordersale" id="form_ordersale">
                    
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                        <!-- title -->
                        <div class="row form-group">
                            <div class="col-12 text-center">
                                <label for="">
                                    Enviar planilla de solicitud de compra para crear una orden
                                </label>
                            </div>
                        </div>
                        

                        <!-- Factura -->
                        <div class="row form-group">
                            <label for="filepdf" class="col-md-4 col-form-label text-md-right">Planilla de compra</label>
                            <div class="col-md-6">
                                <input type="file" id="filepdf" name="filepdf" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" class="form-control @error('filepdf') is-invalid @enderror" value="{{ old('filepdf') }}" placeholder="Planilla de compra" >
                                @error('filepdf')
                                    <span class="invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-1 mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btnSave" name="btnSave">
                                    Crear orden
                                </button>
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

<script src="{{ asset('js/ordersale.js') }}?v={{ env('APP_VERSION', '1') }}"></script>


@endsection
