@extends('layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{ asset('css/modulartop.css') }}?v={{ env('APP_VERSION', '1') }}">
@endsection

@section('meta') 
<title>Modular Top - Fabricación de Muebles - Tableros Melamínicos</title> 
<meta name="description" 
content="40 años en Caracas, Venezuela ofreciendo muebles funcionales con diseño y garantía.
Tendencias, servicio personalizado y tableros melaminicos importados." />

@endsection

@section('content')
<!-- <script src="{{ asset('js/videos.js')}}"></script> -->
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/modulartop/marca.png);" data-aos="fade">
  <!-- <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-5 mx-auto mt-lg-5 text-center">
        <h1>Modular Top</h1>
        <p class="mb-5"><strong class="text-white">Superando retos y evolución constante.
        </strong></p>
      </div>
    </div>
  </div> -->

  <!-- <a href="#modular-top" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a> -->
</div>  


<!-- Nosotros-->
<!-- class="site-section" -->
<section  id="modular-top">
    <div class="contenedor-message">
      <div class="mensaje">
        <p>
          En Modular Top creemos en la importancia de espacios funcionales, hermosos y sostenibles, siendo el diseño, la ingeniería y la arquitectura algunas de las disciplinas que tienen el poder de transformar los ambientes que habitamos. Por ello, asumimos el compromiso de ser un socio estratégico para nuestros clientes, colaborándoles en la creación de espacios que generen un impacto positivo en las personas y el planeta, de la mano de nuestros aliados comerciales.
        </p>
        <p>
          Nuestra marca inspira a soñar en grande y a definir espacios que reflejen la personalidad y satisfagan las necesidades de los usuarios. Por eso, establecemos alianzas estratégicas con personas, organizaciones y marcas apasionadas por lo que hacen y que comparten con nosotros un compromiso de excelencia.
        </p>
        <p>
          Todo esto lo hacemos apegados a una esencia de marca definida por nuestro conjunto de valores fundamentales: excelencia, innovación, compromiso con la atención al cliente y trabajo en equipo, que se mezcla con la honestidad y la responsabilidad intrínsecas en nuestro ADN.
        </p>
      </div>
    </div>

    <div class="contenedor-mision">
      <div class="marco">
        <div class="mision-title">
          Nuestra misión
        </div>
        <div class="mision-text">
          Ser el proveedor líder en Venezuela de tableros melamínicos, materiales afines y revestimientos de interiores y exteriores de alta calidad, así como el prestador de servicios de seccionado, mecanizado, prensado y pegado de canto con garantía comprobable; ofreciendo innovación, sostenibilidad y atención personalizada a clientes en las áreas de arquitectura, diseño y desarrollo de interiorismo y exteriorismo.
        </div>
      </div>
    </div>

    <div class="contenedor-vision">
      <div class="marco">
        <div class="vision-title">
          Nuestra visión
        </div>
        <div class="vision-text">
        Consolidarnos como la marca de referencia para los profesionales de las áreas de arquitectura, diseño y desarrollo de interiorismo y exteriorismo. Llegando a ser una marca reconocida por la excelencia en el servicio prestado, en la calidad de los materiales que ofrecemos, a la vez que fomentamos el compromiso ético empresarial, generamos empleo, crecimiento y desarrollo sostenible a nivel nacional.
        </div>
      </div>
    </div>

    <div class="contenedor-valores">
      <div class="marco">
        <div class="valores-title">
          Nuestros valores
        </div>
        <div class="valores-text">
          <ul>
            <li>Excelencia: Contamos con productos y servicios de altos estándares en acabados y calidad, cumpliendo con los requerimientos más exigentes.</li>
            <li>Innovación: Diversificamos constantemente nuestra oferta de productos y optimizamos nuestra prestación de servicios para mantenernos a la vanguardia y tendencias del mercado.</li>
            <li>Compromiso con la atención: Nos caracterizamos por prestar una atención de excelencia, satisfaciendo las necesidades, exigencias y expectativas del cliente, ofreciendo la mejor asesoría y orientaciones en tema de materiales, insumos y servicios a nuestros aliados.</li>
            <li>Trabajo en equipo: Fomentamos la colaboración y el trabajo en equipo, entre nuestro talento humano, clientes y aliados comerciales, con la finalidad de lograr exitosamente los objetivos comunes.</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="contenedor-nota">
      <div class="marco">
        <div class="nota-title">
          <div>
            <img src="{{ asset('images/modulartop/quote.png') }}" alt="">
          </div>
        </div>
        <div class="nota-text">
          Nos comprometemos a trabajar con nuestros aliados y clientes para crear espacios únicos y funcionales que satisfagan sus expectativas de diseño, construcción y necesidades funcionales.
        </div>
      </div>
    </div>

  </section>



  <!--Fin Nosotros-->

@endsection    
