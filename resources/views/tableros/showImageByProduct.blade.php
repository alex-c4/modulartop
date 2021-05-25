@extends('layouts.layout')

@section('meta') 
<title>Tableros Melamínicos - Acabado Tradicional - Modular Top</title> 
<meta name="description" 
content="Tablero melaminico hidrófugo y natural MDP importado y nacional, acabado tradicional masisa/losan" />

@endsection

@section('content')


    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/tableros/banner-premium.jpg') }}" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5 mx-auto mt-lg-5 text-center">
            <h1>Tableros Melamínicos</h1>
            <p class="mb-5"><strong class="text-white">Belleza, calidad, alta resistencia y variedad de colores.</strong></p>
            
          </div>
        </div>
      </div>

      <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div>  


    <!-- Seccion Tableros Melaminicos-->
    <div class="site-section" id="about-section">

        <div class="container">

            <div class="row mb-5">
                <div class="col-md-12 text-left">
                    <h2 class="section-title mb-3">Galeria de imágenes</h2>
                    <p class="lead">{{ $product->name }}</p>
                    <p>
                        <a href="{{ route('tablero.description', $product->id) }}" class="btn btn-primary">
                            <span class="icon-arrow-left"></span>
                            Volver
</a>
                    </p>
                </div>
            </div>

        </div>
    
        <ul id="carousel" class="elastislide-list" >
        @foreach($images as $key => $image)
            <li><a href=""><img src="{{ asset('images/image_products') }}/{{ $image->name }}" alt="" /></a></li>
        @endforeach

            <!-- <li><a href="{{ url('/fabricacion') }}"><img src="{{ asset('images/fabricacion/fabricacion-habitacion-1.jpg') }}" alt="Asesoría y desarrollo de proyectos de fabricación de mobiliarios para habitaciones, diseño, interiores, arquitectura, ingeniería civil, construcción, hoteles, restaurantes" /></a></li>
            <li><a href="{{ url('/fabricacion') }}"><img src="{{ asset('images/fabricacion/fabricacion-cocina-2.jpg') }}" alt="Asesoría y desarrollo de proyectos de fabricación de mobiliarios para cocina, diseño, interiores, arquitectura, ingeniería civil, construcción, hoteles, restaurantes" /></a></li>
            <li><a href="{{ url('/fabricacion') }}"><img src="{{ asset('images/fabricacion/fabricacion-habitacion-2.jpg') }}" alt="Asesoría y desarrollo de proyectos de fabricación de mobiliarios para habitaciones, diseño, interiores, arquitectura, ingeniería civil, construcción, hoteles, restaurantes" /></a></li>
            <li><a href="{{ url('/fabricacion') }}"><img src="{{ asset('images/fabricacion/fabricacion-mobiliario.jpg"') }} alt="Asesoría y desarrollo de proyectos de fabricación de mobiliarios para habitaciones, diseño, interiores, arquitectura, ingeniería civil, construcción, hoteles, restaurantes" /></a></li> -->
                
        </ul>

    </div>
    <!-- Fin Seccion Materia Prima-->


@endsection
