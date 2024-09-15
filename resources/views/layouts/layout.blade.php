<!DOCTYPE html>
<html lang="es">
  <head>
     <!-- Isotipo Modular Top Favicons -->
    <link href="{{ asset('images/modulartop.ico') }}" rel="icon">
    @yield('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}">
    <!-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->

    
    <!--Bloque incorporado para galeria de proyectos-->
    <link href="{{ asset('css/proyectos/magnific-popup.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css')}}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{ asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{ asset('css/style.css')}}?v={{ env('APP_VERSION', '1') }}">



    <!--Bloque incorporado para carrusel fabricacion-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/elastislide.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css')}}" />
    <script src="{{ asset('js/modernizr.custom.17475.js')}}"></script>
     <!-- fin del bloque fabricacion -->

    <!-- Icon -->
    <!-- <link href="css/proyectos/materialdesignicons.min.css" rel="stylesheet" type="text/css" /> -->
    <link href="{{ asset('css/pe-icon-7-stroke.css')}}" rel="stylesheet" type="text/css" />
    <!-- fin del bloque fabricacion -->

     <!-- Javascript para captcha de formulario -->
    <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
    
    <!-- Javascript para reproducir los videos youtube -->
    <!-- <script>
      let d = new Date();
      // document.body.innerHTML = "<h1>Time right now is:  " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds()

      alert(+ d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds());
    </script> -->
    
    <script type="text/javascript" src="{{ asset('js/videos.js') }}"></script>
    <!-- <script src="js/videos.js"></script> -->
    

    <!--Bloque tracking code de Google Analytics VERSION UA-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-183802895-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-183802895-1');
        </script> -->
  <!-- fin del Bloque tracking code de Google Analytics --> 

  
    <!--Bloque tracking code de Google Analytics VERSION GA4-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
      <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-2NPLXFJ07C"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-2NPLXFJ07C');

      </script> -->
  
    <!-- fin del Bloque tracking code de Google Analytics --> 

<script>
  
  var closeMessage = function(){
        $(".navidad").css("display", "none");
      }
      var showMessage = function(){
        $(".navidad").css("display", "flex");
      }

      var showWhatsAppContent = function(){
        var div = $("#whatsAppContent");
		    div.animate({
          bottom: '20px',
          height: '182px',
          width: '300px',
          opacity: '1',
        }, "slow");
      }

      var showSubcripcionAppContent = function(){
        var div = $("#subcripcionContent");
		    div.animate({
          bottom: '20px',
          height: '120px',
          width: '300px',
          opacity: '1',
        }, "slow");
      }

      var closeWhatsApp = function(){
        var div = $("#whatsAppContent");
		    div.animate({ 
          height: '0px',
          width: '0px',
          opacity: '0.5',
        }, "slow");

        div.animate({bottom: '-200px'},  "slow");

      }

      var closeSubcripcion = function(){
        var div = $("#subcripcionContent");
        div.animate({ 
          height: '0px',
          width: '0px',
          opacity: '0.5',
        }, "slow");

        div.animate({bottom: '-200px'},  "slow");

        $("#messageSuscripcion").html("");
      }
</script>
  <style>
    .navidad{
      width: 100%;
      background-color: #000000f0;
      height: 100vh;
      position: fixed;
      z-index: 999;
      display: none;
      justify-content: center;
      align-items: center;
      /* flex-wrap: wrap; */
      flex-direction: column;
    }
    .imgNavidad img{
      width: 500px;
      cursor: pointer;
      border-radius: 10px;
    }
    .imgClose{
      display: flex;
      justify-content: flex-end;
      width: 545px;
      /* background-color: aqua; */
    }
    .imgClose img{
      cursor: pointer;
      /* width: 30px */
    }

  @media (max-width: 768px) {
    .imgNavidad img{
      width: 55vh;
    }

    .imgClose{
      width: 60vh;
    }
  }

  @media (max-width: 576px) {
    .imgNavidad img{
      width: 35vh;
    }

    .imgClose{
      width: 40vh;
    }
  }

  @media (max-width: 280px) {
    .imgNavidad img{
      width: 30vh;
    }

    .imgClose{
      width: 35vh;
    }
  }

  </style>


@yield('header')

  </head>


  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">
    <div class="navidad" onclick="closeMessage()">

      <!-- <div class="container">
        <div class="row">
          <div class="col">

          
          </div>
        </div>
      </div> -->


    <div class="imgClose">
      <img  src="{{ asset('images/navidad/iconClose25x25.png') }}" alt="" srcset="">
    </div>
    <div class="imgNavidad">
      <img src="{{ asset('images/navidad/Pop-Up-Aniversario-4.jpg') }}?v={{ env('APP_VERSION', '1') }}" alt="" srcset="">
    </div>
    </div>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   

    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <!-- <h1 class="mb-0 m-0 p-0">
              </h1> -->
              <div class="mb-0 m-0 p-0 site-logo" style="width: 190px;"> 
                <a href="{{ route('welcome') }}"><img id="logoClass" src="{{ asset('images/modulartop_blanco.png') }}" alt="" srcset=""></a>
              </div>
           
          </div>
  

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">
            
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="{{ route('welcome') }}" class="nav-link">Inicio</a></li>
                <li><a href="{{ route('welcome')}}#howitworks-section" class="nav-link" >Catálogo</a></li>
                <li><a href="{{ route('welcome')}}#about-section" class="nav-link {{ (Request::is('contact/tellus')) ? 'active' : ''}}" >Proyectos</a></li>
                <!-- <li><a href="{{ route('welcome')}}#services-section" class="nav-link" >Servicios</a></li> -->
                <li><a href="{{ url('/servicios') }}" class="nav-link" >Servicios</a></li>
                <li><a href="{{ url('/modulartop') }}" class="nav-link">Marca</a></li>
                <li><a href="{{ url('/novedades') }}" class="nav-link">Novedades @if(Utils::getCountNews() > 0)<span class="cantNews">{{ Utils::getCountNews() }}</span>@endif</a></li>
                <li><a href="{{ route('welcome')}}#contact-section" class="nav-link">Contacto</a></li>
                @if(Auth::check())
                  <li><a href="{{ route('logout')}}" class="nav-link">Salir</a></li>
                  <li><a href="{{ route('home')}}" class="nav-link"><span class="icon-home"></span> Mi Sesión</a></li>
                @else
                  <li>
                    <a href="{{ route('login')}}" class="nav-link"><span class="icon-user"></span> Ingresar / Registrarse</a>
                    <!-- <a href="{{ route('login')}}#contact-section" class="nav-link">Ingresar / Registrarse</a> -->
                  </li>
                @endif

              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>
  <script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{ asset('js/jquery-ui.js')}}"></script>
  <script src="{{ asset('js/popper.min.js')}}"></script>
  <script src="{{ asset('js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('js/jquery.countdown.min.js')}}"></script>
  <script src="{{ asset('js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{ asset('js/jquery.easing.1.3.js')}}"></script>
  <script src="{{ asset('js/aos.js')}}"></script>
  <script src="{{ asset('js/jquery.fancybox.min.js')}}"></script>
  <script src="{{ asset('js/jquery.sticky.js')}}"></script>
  
  <script src="{{ asset('js/main.js')}}?v={{ env('APP_VERSION', '1') }}"></script>
  

  @yield('content')

  <!--Seccion Footer-->    
  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-5">
              <h2 class="footer-heading mb-4">Modular Top</h2>
              <p>Somos especialistas en la fabricación de muebles y servicios con maquinarias de  
              última generación. Convierte tu proyecto en una realidad.</p>
            </div>
            <div class="col-md-3 mx-auto">
              <h2 class="footer-heading mb-4">Sitio web</h2>
              <ul class="list-unstyled">
                <li><a href="{{ route('welcome') }}">INICIO</a></li>
                <li><a href="{{ route('welcome')}}#howitworks-section">CATÁLOGO</a></li>
                <li><a href="{{ route('welcome')}}#about-section">PROYECTOS</a></li>
                <li><a href="{{ route('welcome')}}#services-section">SERVICIOS</a></li>
                <li><a href="{{ url('/modulartop') }}">MARCA</a></li>
                <li><a href="{{ url('/novedades') }}">NOVEDADES</a></li>
                <li><a href="{{ route('welcome')}}#contact-section">CONTACTO</a></li>
              </ul>
            </div>
            
          </div>
        </div>
      
        <div class="col-md-4">
          <!-- <div class="mb-4">
            <h2 class="footer-heading mb-4">Subscribirme a Novedades</h2>
            <form action="{{ route('contact.contact') }}" method="post" class="footer-subscribe" id="form_send_contact">
              {{csrf_field()}}

              <div class="input-group mb-3">
                <input id="emailnews" name="emailnews" type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Ingrese su Email" aria-label="Enter Email" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit" id="button-addon2" name="button-addon2">Enviar</button>
                </div>
              </div>

              <div class="alert alert-success" role="alert" id="alertContact2">
                  <label id="divMessage2" class="text-black"></label> 
                  
                </div>
              
            </form>
          </div> -->
          
          <div class="">
            <h2 class="footer-heading mb-4">Siguenos</h2>
            <a href="https://www.facebook.com/modular.top.ve/" target="_blank" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
            <a href="https://twitter.com/ModularTop?lang=es" target="_blank" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
            <a href="https://www.instagram.com/modular_top" target="_blank" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
            <a href="https://www.youtube.com/channel/UC7LbswJwcC3uWFhOOTS1N2A" target="_blank" class="pl-3 pr-3"><span class="icon-youtube"></span></a>
          </div>

        </div>

      </div>

      <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
          <div class="border-top pt-5">
          
            <p class="copyright">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <!--
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            -->
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Modular Top C.A. All rights reserved | Website Design by <a href="https://www.instagram.com/erikreativa/" target="_blank" >Erikreativa</a> 
            
            </p>
          
          </div>
          
        </div>
        
      </div>
    </div>
  </footer>

  </div> <!-- .site-wrap -->

  <hatsAppCont>
  	<a href="javascript:void(0);" class="whatsapp" >
  	  <img src="{{ asset('images/WhatsApp2.png') }}" alt="" srcset="" onclick="showWhatsAppContent()">
  	</a>
  	<a href="javascript:void(0);" class="whatsapp newsletterSubc" >
  	  <img src="{{ asset('images/email-box-web.png') }}" alt="" srcset="" onclick="showSubcripcionAppContent()">
  	</a>
  </hatsAppCont>

  <a href="#top" class="gototop"><span class="icon-angle-double-up"></span></a>

  <!-- whatsApp content -->
    <div id="whatsAppContent">
      <div id="whatsAppHeader">
        <!-- <img src="{{ asset('images/iconClose25x25.png') }}" alt="" srcset="" onclick="closeWhatsApp()"> -->
        <span class="icon-close2 closeWhatsApp" onclick="closeWhatsApp()"></span>

      </div>
      <div >
        <a href="javascript:void(0)">
        <img src="{{asset('images/messageWhatsApp.png')}}" alt="Contacto via whatsapp" class="img-fluid"></a>
      </div>
      <div class="containerSendWhartsApp">
        <div class="sendWhatsApp">
          <a href="https://api.whatsapp.com/send?phone=+58 04241854168" target="_blank">
            Abrir chat <span style="vertical-align: middle;" class="icon-telegram"></span>
          </a>
        </div>
      </div>
    </div>

    <!-- suscripcion newletter content bonton flotante -->
    <div id="subcripcionContent">
      <form action="{{ route('contact.contact') }}" method="post" class="" id="form_send_contact4">
        {{csrf_field()}}
        <input type="hidden" name="hform" id="hform" value="3">
        <div id="subcripcionHeader">
          <div style="margin-right: auto; margin-left: 7px;">Suscribirme a novedades</div>
          <span class="icon-close2 closeSubcripcion" onclick="closeSubcripcion()"></span>
        </div>

        <div style="padding: 0px 20px 0px 20px;">
          <div class="input-group mb-3">
            <input id="emailnews4" name="emailnews4" type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Ingrese su Email" aria-label="Enter Email" aria-describedby="button-addon2">
            <div class="input-group-append" style="height: 43px !important;">
              <button class="btn btn-primary" id="button-addon4" name="button-addon4">Enviar</button>
            </div>
          </div>
          <small id="messageSuscripcion" class="form-text text-muted">&nbsp;</small>
        </div>
      </form>
    </div>

  </body>
</html>

<script src="{{ asset('js/welcome.js') }}?v={{ env('APP_VERSION', '1') }}"></script>
 <!--Bloque incorporado para carrusel fabricacion -->
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="{{ asset('js/jquerypp.custom.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/jquery.elastislide.js') }}"></script>
    <script type="text/javascript">
    
			
			$( '#carousel' ).elastislide();
      
      /**
       * Script para cambiar el logo cuando el usuario realiza el scroll
       */
      $(function(){
        $(document).scroll(function(){
          if($(this).scrollTop() > 1){
            $('#logoClass').attr('src', '{{ asset('images/modulartop.png') }}')              
          }else{
            $('#logoClass').attr('src', '{{ asset('images/modulartop_blanco.png') }}')
          }
        });

        var Message = function(){
          
          @if( isset($show) )
            if(eval("{{$show}}")){
              showMessage();
            }
          @endif
        }

        Message();
      });
      


		</script>
  <!-- fin del bloque fabricacion -->  

<!-- javascript -->
        <!-- SLIDER -->
        <!-- Magnific Popup -->
        <script src="{{ asset('js/isotope.js') }}"></script>
        <script src="{{ asset('js/galeria/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('js/galeria/portfolio-filter.js') }}"></script> 
        <script src="{{ asset('js/scrollspy.min.js') }}"></script> 
        <script src="{{ asset('js/app-project.js') }}"></script> 
        <!-- Contact -->
        <!-- Counter -->
        <!-- Switcher -->
        <!-- Main Js -->

  @yield('script')