@extends('layouts.layoutSidebar')

@section('header')
    <link rel="stylesheet" href="{{ asset('css/project.css')}}?v={{ env('APP_VERSION') }}">
@endsection

@section('content')

@section('imgBanner')
{{ Utils::getBanner(auth()->user()->roll_id) }}
@endsection

@section('title')
Proyecto
@endsection

@section('subtitle')
Imágenes del proyecto
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
    @if(isset($result) == null)

        <div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            Haga click <strong><a href="{{ route('project.create') }}">aqui</a></strong>  para crear un proyecto.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>

    @else

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                             
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Finalizado!</h4>
                        <p>Ha finalizado la creación del proyecto y carga de imagenes satisfactoriamente.</p>
                        <hr>
                        <div class="form-group row mb-1 mt-3">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('project.create') }}" class="btn btn-primary">Volver</a>
                            </div>
                        </div>
                    </div>

                        

                    </div>
                </div>
            </div>
        </div>

    @endif

</div>

</section>

@endsection

@section('script')

@endsection
