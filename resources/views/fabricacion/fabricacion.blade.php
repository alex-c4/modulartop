@extends('layouts.layout')

@section('meta') 
<title>Venta de Muebles - Fabricación - Modular Top</title> 
<meta name="description" 
content="Los muebles que sueñas fabricados en Caracas, Venezuela. Mobiliarios de tendencia
mundial para casas, hoteles, oficinas, restaurantes y tiendas comerciales." />

@endsection

@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/banner/fabricacion.jpg);" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-8 mx-auto mt-lg-5 text-center">
            <h1>Fabricamos los muebles que has soñado</h1>
            <p class="mb-8"><strong class="text-white">Experimenta un nuevo diseño decorativo en tu hogar, oficina o tienda con muebles de primera mano.</strong></p>
            
          </div>
        </div>
      </div>

      <a href="#property-details" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div>  


 <!--Fabricacion-->
 
    
    <div class="site-section" id="property-details">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="owl-carousel slide-one-item with-dots">
              <div><img src="images/fabricacion/fabricacion-cocina-1.jpg" alt="Asesoría y desarrollo de proyectos de fabricación de mobiliarios para cocina, diseño, interiores, arquitectura, ingeniería civil, construcción, hoteles, restaurantes" class="img-fluid"></div>
              <div><img src="images/fabricacion/fabricacion-cocina-2.jpg" alt="Asesoría y desarrollo de proyectos de fabricación de mobiliarios para cocina, diseño, interiores, arquitectura, ingeniería civil, construcción, hoteles, restaurantes" class="img-fluid"></div>
              <div><img src="images/fabricacion/fabricacion-habitacion-1.jpg" alt="Asesoría y desarrollo de proyectos de fabricación de mobiliarios para habitaciones, diseño, interiores, arquitectura, ingeniería civil, construcción, hoteles, restaurantes" class="img-fluid"></div>
            </div>
          </div>
          <div class="col-lg-5 pl-lg-5 ml-auto">
            <div class="mb-5">
              <h3>No podrás resistirte a nuestros diseños en tendencia.</h3>
              <p>Muebles exclusivos, elegantes, minimalistas, cómodos y multifuncionales
              para cualquier ocasión o espacio. </p>
              
              <p class="lead">MUEBLES QUE INSPIRAN</p>
              
              <P>Convierte tu espacio en un ambiente agradable para compartir.</p>
              
              <p class="lead">40 AÑOS DE EXPERIENCIA ACUMULADA</p>
              <P> Si te encuentras en el sector de hoteles, oficinas y tiendas comerciales, te   
              informamos que fabricamos los muebles ideales a precios competitivos.</p>

              <p class="lead">¡Cuéntanos tu proyecto y lo fabricamos!</p>
              <a href="{{ route('welcome') }}#contact-section" class="btn btn-primary mr-2 mb-2">Cuéntanos</a>
            </p>
             
            </div>

           

          </div>
        </div>
      </div>
    </div>
    <!--Fin Seccion seccion Fabricacion-->


@endsection
