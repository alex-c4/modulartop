@extends('layouts.layout')

@section('meta') 
<title>Servicios - Modular Top</title> 
<meta name="description" 
content="Ofrecemos tableros melaminicos, fabricación de mobiliario, maquinaria CNC, mecanizado
de madera, prensado MDP, enchapado de tapa de cantos y más. Fabricamos tus sueños." />
@endsection

@section('header')
    <link rel="stylesheet" href="{{ asset('css/seccionado.css') }}?v={{ env('APP_VERSION', '1') }}">
@endsection

@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/banner/servicios_banner.png);" data-aos="fade">
  <div class="container">

    <div class="row align-items-center justify-content-center">
      <div class="col-md-8 mx-auto mt-lg-5 text-center" style="display: flex; flex-direction: column; justify-content: center; align-items: center">
        <div style="max-width: 800px; font-size: 3.9rem; font-family: &quot;Montserrat&quot;, sans-serif; font-weight: 390 !important; text-transform: uppercase; color: white; font-family: &quot;Montserrat&quot;, sans-serif; display: flex; justify-content: center;">
          Nuestros servicios
        </div>
        <div style="max-width: 800px; font-size: 1.4rem; text-align: justify; color: white;">
          Somos los <span class="textBold">mejores aliados </span>de fabricantes, carpinterías, mueblerías y arquitectos por contar con maquinaria tecnológica CNC que <span class="textBold">maximiza la productividad</span>.
        </div>
      </div>
    </div>


  </div>
  <!-- <a href="#modular-top" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a> -->
</div>  





<!-- <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/banner/servicios.jpg);" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-8 mx-auto mt-lg-5 text-center">
            <h1>Nuestros servicios</h1>
            <p class="mb-8"><strong class="text-white">Somos los mejores aliados de fabricantes, carpinterías, mueblerías y arquitectos por contar con maquinaria tecnológica CNC que maximiza la productividad.</strong></p>
            
          </div>
        </div>
      </div>

      <a href="#cortes" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
  </div>   -->

    
 <!--Seccion sericios-->

 
<!--  
 
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
    </section> -->

    

<section class="section element-animate bg-container-seccionado borderBottomSection" id="routeado">
  <div class="container" style="min-height: 400px; display: flex; padding: 30px">
    <div class="row align-items-center "><!-- mb-5 -->
      
      <div class="col-lg-5 order-md-1">
        <div class="scaling-image">
          <div class="frame">
            <img src="images/servicios/seccionado2.png" class="img-fluid">
          </div>
        </div>
      </div>

      <div class="col-lg-7 pl-md-5 mb-3 order-md-2 column-right">
        <div class='title-service'>SECCIONADO PRECISO DE TABLEROS PARA AHORRO DE MATERIAL</div>
        <div class="content-service">Optimizamos los cortes mediante un software para el mayor rendimiento de los tableros.</div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-hidden">&nbsp;</div>
      <div class="col-lg-7 btn-contactenos">
        <div class="col-hidden"></div>
        <div>
          <a class="btn btn-dark" href="{{ url('/') }}#contact-section" role="button">CONTÁCTENOS</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section element-animate bg-container-revestimiento borderBottomSection" id="routeado">
  <div class="container" style="min-height: 400px; display: flex; padding: 30px">
    <div class="row align-items-center "><!-- mb-5 -->

      <div class="col-lg-5 order-md-2">
        <div class="scaling-image">
          <div class="frame">
            <img src="images/servicios/revestimiento2.png" class="img-fluid">
          </div>
        </div>
      </div>

      <div class="col-lg-7 pl-md-5 mb-3 order-md-1 column-right">
        <div class='title-service'>REVESTIMIENTO DE LÁMINAS DE ALTA PRESIÓN (HLP) COMO OPCIÓN A TU PROYECTO</div>
        <div class="content-service">Encolado de Láminas Decorativas de Alta Presión (conocido popularmente como Fórmica) sobre sustratos MDP o MDF mediante prensado térmico.</div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-hidden">&nbsp;</div>
      <div class="col-lg-7 btn-contactenos">
        <div class="col-hidden"></div>
        <div>
          <a class="btn btn-dark" href="{{ url('/') }}#contact-section" role="button">CONTÁCTENOS</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section element-animate bg-container-mecanizado borderBottomSection" id="routeado">
  <div class="container" style="min-height: 400px; display: flex; padding: 30px">
    <div class="row align-items-center "><!-- mb-5 -->
      
      <div class="col-lg-5 order-md-1">
        <div class="scaling-image">
          <div class="frame">
            <img src="images/servicios/mecanizados2.png" class="img-fluid">
          </div>
        </div>
      </div>

      <div class="col-lg-7 pl-md-5 mb-3 order-md-2 column-right">
        <div class='title-service'>MECANIZADOS DE LOS TABLEROS PARA MEJORAR LA CALIDAD DEL PRODUCTO FINAL</div>
        <div class="content-service">Acabados perfectos con un centro numérico computarizado (CNC) que realiza Pantografiado, Fresado, Ranurado y Perforado.</div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-hidden">&nbsp;</div>
      <div class="col-lg-7 btn-contactenos">
        <div class="col-hidden"></div>
        <div>
          <a class="btn btn-dark" href="{{ url('/') }}#contact-section" role="button">CONTÁCTENOS</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section element-animate bg-container-pegadocanto borderBottomSection" id="routeado">
  <div class="container" style="min-height: 400px; display: flex; padding: 30px">
    <div class="row align-items-center "><!-- mb-5 -->

      <div class="col-lg-5 order-md-2">
        <div class="scaling-image">
          <div class="frame">
            <img src="images/servicios/pegadotapacanto2.png" class="img-fluid">
          </div>
        </div>
      </div>

      <div class="col-lg-7 pl-md-5 mb-3 order-md-1 column-right">
        <div class='title-service'>PEGADORA DE TAPA CANTO TERMOADHERIDO PARA MEJOR RESISTENCIA EN EL ACABADO DE LOS BORDES</div>
        <div class="content-service">Acabados perfectos con un centro numérico computarizado (CNC) que realiza Pantografiado, Fresado, Ranurado y Perforado.</div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-hidden">&nbsp;</div>
      <div class="col-lg-7 btn-contactenos">
        <div class="col-hidden"></div>
        <div>
          <a class="btn btn-dark" href="{{ url('/') }}#contact-section" role="button">CONTÁCTENOS</a>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="col-12 footer-gallery bg-footer-contact">
                        
      <div class="container-contact-info-project">
          <!-- Contact info section -->
          <div class="contact-info-project">
              <div class="contact-header-project">
              Contáctenos
              </div>
              <div class="contact-phones-project">

              <div class="contact-row">
                  <div class="contact-col-icon-project">
                  <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><path fill="#8a181b" d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                  </div>
                  <div class="contact-col-phones-project">
                  <div>{{env('CONTACT_001')}}</div>
                  <div>{{env('CONTACT_002')}}</div>
                  <div>{{env('CONTACT_003')}}</div>
                  </div>
              </div>
              
              <div class="contact-row-project">
                  <div class="contact-col-icon-project">
                  <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><path fill="#8a181b" d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                  </div>
                  <div class="contact-col-phones-project">
                  <div>{{env('CONTACT_EMAIL')}}</div>
                  <div>{{env('CONTACT_EMAIL_2')}}</div>
                  </div>
              </div>
              </div>
              
              <div class="contact-row-project">
              <div class="contact-col-icon-project">
                  <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 384 512"><path fill="#8a181b" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
              </div>
              <div class="contact-col-phones-project">
                  <div>{{env('ADDRESS')}}</div>
              </div>
              </div>
          </div>
                  
      </div>
  </div>

    <!--Fin Seccion seccion servicios-->


@endsection
