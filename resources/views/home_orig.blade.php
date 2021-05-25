@extends('layouts.layout')

@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/banner/fabricacion.jpg') }});" data-aos="fade">
    <div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-5 mx-auto mt-lg-5 text-center">
        <h1>Bienvenido</h1>
        <p class="mb-5"><strong class="text-white">home</strong></p>
        
        </div>
    </div>
    </div>

    <!-- <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a> -->
</div> 

<br>

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
    @endif

<section class="site-section bg-light" id="services-section">

    <div class="container">
        <div class="row align-items-stretch">
            <div class="col-mb-6 col-lg-6 mb-6 mb-lg-6" data-aos="fade-up">
                <div class="unit-4 d-flex">
                <div class="mr-4">
                    <!-- <a href="{{ route('newsletter.create') }}"> -->
                        <span class="icon-newspaper-o "></span>
                    <!-- </a> -->
                    </div>
                        <div>
                            <h3>Newsletters</h3>
                            <p>Novedades y noticias</p>
                            <p>
                            
                            @if(auth()->user()->hasRoles('Administrator') || auth()->user()->hasRoles('Newsletter')) 
                                <a title="Agregar novedades" href="{{ route('newsletter.create') }}"><span class="icon-plus"></span></a>
                                &nbsp;
                                <a title="Listar novedades" href="{{ route('newsletter.index') }}"><span class="icon-list"></span></a>
                                &nbsp;
                            @endif
                                <a title="Visualizar novedades" href="{{ route('novedades') }}"><span class="icon-th-large"></span></a>
                            </p>
                        </div>
                    </div>
            </div>
        </div>

        

    </div>
</section>



<br>
@endsection