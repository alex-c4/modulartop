@extends('layouts.layout')

@section('meta') 
<title>Servicios - Modular Top</title> 
<meta name="description" 
content="Maquinaria de alta tecnología para fabricantes de madera en Caracas, Venezuela. Corte,
pegado de canto, mecanizado de tableros y prensado de láminas." />

@endsection

@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/banner/servicios.jpg);" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-8 mx-auto mt-lg-5 text-center">
            <h1>Nuestros servicios</h1>
            <p class="mb-8"><strong class="text-white">Somos los mejores aliados de fabricantes, carpinterías, mueblerías y arquitectos por contar con maquinaria tecnológica CNC que maximiza la productividad.</strong></p>
            
          </div>
        </div>
      </div>

      <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div>  


 <!--Seccion sericios-->
 <section class="section element-animate" id="cortes">
      <div class="container">
        <div class="row align-items-center mb-5">
          <div class="col-lg-7 order-md-2">
            <div class="scaling-image"><div class="frame"><br><img src="images/servicios/corte.jpg" alt="Corte o seccionado - máquinas que trabajan bajo un software que elabora cortes 
                 precisos en tableros" class="img-fluid"></div></div>
          </div>
          <div class="col-md-5 pr-md-5 mb-5">
            <div class="block-41">
              <h2 class="block-41-heading mb-5"><br>SECCIONADO PRECISO DE TABLEROS PARA AHORRO DE MATERIAL</h2>
              <div class="block-41-text">
                <p>Optimizamos los cortes mediante un software para el mayor rendimiento de los tableros o piezas de madera. </p>
                <p>¡Corte su pieza a la medida!</p>
                <p><a href="{{ url('/') }}#contact-section" class="btn btn-primary btn-sm">Contáctanos</a></p>
              </div>
            </div>
          </div>
          
        </div>
      </div>      
    </section>

    <section class="section element-animate bg-light" id="routeado">
      <div class="container">
        <div class="row align-items-center mb-5">
          <div class="col-lg-7 order-md-1">
            <div class="scaling-image"><div class="frame"><img src="images/servicios/ruteado.jpg" alt="Mecanizado de tablero - Maquinaria que cumplen con las exigencias del mercado actual. 
                Cortes, pantografiado, ruteado, fresado, ranurado y perforado." class="img-fluid"></div></div>
          </div>
          <div class="col-md-5 pl-md-5 mb-5 order-md-2">
            <div class="block-41">
              <h2 class="block-41-heading mb-5"><br>MECANIZADOS DE LOS TABLEROS PARA OPTIMIZAR LA CALIDAD DEL PRODUCTO FINAL</h2>
              <div class="block-41-text">
              <p>Acabados perfectos con un centro numérico computarizado (CNC) que 
                realiza Pantografiado, Fresado, Ranurado y Perforado.  
                </p>
                <p>Usamos herramientas y técnicas innovadoras que recomienda la industria de la madera. </p>
                <p><a href="{{ url('/') }}#contact-section" class="btn btn-primary btn-sm">Contáctanos</a></p>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>

    <section class="section element-animate" id="enchapado">
      <div class="container">
        <div class="row align-items-center mb-5">
          <div class="col-lg-7 order-md-2">
            <div class="scaling-image" ><div class="frame"><img src="images/servicios/enchapado.jpg" alt="Enchapadoras rectas y curvas automáticas de encolado termoadherido.  
                Aprovecha una infraestructura con tecnología CNC." class="img-fluid"></div></div>
          </div>
          <div class="col-md-5 pr-md-5 mb-5">
            <div class="block-41">
              <h2 class="block-41-heading mb-5"><br>PEGADORA DE TAPA CANTO TERMOADHERIDO PARA MEJOR RECISTENCIA EN EL ACABADO DE LOS BORDES. </h2>
              <div class="block-41-text">
                <p>Pegado de tapa cantos ABS en piezas rectas y curvas, mediante la adhesion con pega 
                granulada que se funde a alta temperatura, dejando una pieza completamente impermeable
                y resistente a la humedad por sus cantos.</p>
                <p><a href="{{ url('/') }}#contact-section" class="btn btn-primary btn-sm">Contáctanos</a></p>
              </div>
            </div>
          </div>
          
        </div>
      </div>      
    </section>

    <section class="section element-animate bg-light" id="prensado">
      <div class="container">
        <div class="row align-items-center mb-5">
          <div class="col-lg-7 order-md-1">
            <div class="scaling-image"><div class="frame"><img src="images/servicios/prensa.jpg" alt="Prensado de láminas de alta presión (HLP) - Aprovecha una mano de obra calificada y máquinas de última generación 
                  que optimizan el proceso del prensado." class="img-fluid"></div></div>
          </div>
          <div class="col-md-5 pl-md-5 mb-5 order-md-2">
            <div class="block-41">
              <h2 class="block-41-heading mb-5"><br>Prensado de láminas de alta presión (HLP) como opción a tu proyecto.</h2>
              <div class="block-41-text">
                <p> Experimenta un servicio con mano de obra calificada. Resultados que
                cumplen con la expectativa de cada cliente. 
                </p>
                <p>Tecnológicamente estamos un paso adelante de la competencia.</p>

                <p><a href="{{ url('/') }}#contact-section" class="btn btn-primary btn-sm">Contáctanos</a></p>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>
    <!--Fin Seccion seccion servicios-->


@endsection
