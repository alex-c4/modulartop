@extends('layouts.layoutSidebar')

@section('content')

@section('banner')


<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/novedades/newsletter-novedades.jpg') }});" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5 mx-auto mt-lg-5 text-center">
                <h1>Leds</h1>
                <p class="mb-5"><strong class="text-white">Descargar leds</strong></p>
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

    <div class="row justify-content-center">

        <form action="{{ route('leds.download') }}" method="post">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

            <fieldset class="form-group row">
                <legend class="col-form-label col-sm-4 float-sm-left pt-0">Opciones</legend>
                <div class="col-sm-8">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="rbNewsletter" value="1" checked>
                        <label class="form-check-label" for="rbNewsletter">
                        Newsletter
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="rbClients" value="2">
                        <label class="form-check-label" for="rbClients">
                        Clientes
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="gridRadios" id="rbEstandar" value="3" >
                        <label class="form-check-label" for="rbEstandar">
                        Usuarios Estándar
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="gridRadios" id="rbAll" value="4" >
                        <label class="form-check-label" for="rbAll">
                        Todos los usuarios
                        </label>
                    </div>
                </div>
            </fieldset>
    

            <div class="form-group row">
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Descargar leds</button>
                </div>
            </div>
        </form>

    </div>







</div>


@endsection
