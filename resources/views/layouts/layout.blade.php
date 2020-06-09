<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Modular Top</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}">
    <!-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->

    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css')}}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{ asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

     <!--Bloque incorporado para carrusel fabricacion-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/elastislide.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css')}}" />
    <script src="{{ asset('js/modernizr.custom.17475.js')}}"></script>
    <!-- fin del bloque fabricacion -->  

  </head>



  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

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
            <h1 class="mb-0 site-logo m-0 p-0">
              <a href="index.html" class="mb-0" style="color:transparent" >Modular Top</a>
            </h1>
           
          </div>
  

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="{{ url('/') }}" class="nav-link {{ (Request::is('/') ? 'active' : '') }}">Inicio</a></li>
                <li><a href="#properties-section" class="nav-link">Materia Prima</a></li>
                <li><a href="#about-section" class="nav-link {{ (Request::is('contact/tellus')) ? 'active' : ''}}">Fabricacion</a></li>
                <li><a href="#services-section" class="nav-link">Servicios</a></li>
                <li><a href="#modular-top" class="nav-link">Modular Top</a></li>
                <li><a href="#news-section" class="nav-link">Novedades</a></li>
                <li><a href="#contact-section" class="nav-link">Contactanos</a></li>
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>

<!-- fin del bloque fabricacion -->  


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
  
  <script src="{{ asset('js/main.js')}}"></script>

  <!--Bloque incorporado para carrusel fabricacion-->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/jquerypp.custom.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.elastislide.js')}}"></script>
  <script type="text/javascript">

    $( '#carousel' ).elastislide();

  </script>


  @yield('content')

  
    <!--Seccion Footer-->    
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-5">
                <h2 class="footer-heading mb-4">Modular Top</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque facere laudantium magnam voluptatum autem. Amet aliquid nesciunt veritatis aliquam.</p>
              </div>
              <div class="col-md-3 mx-auto">
                <h2 class="footer-heading mb-4">Sitio web</h2>
                <ul class="list-unstyled">
                  <li><a href="#">Nosotros</a></li>
                  <li><a href="#">Servicios</a></li>
                  <li><a href="#">Clientes</a></li>
                  <li><a href="#">Contacto</a></li>
                </ul>
              </div>
              
            </div>
          </div>
          <div class="col-md-4">
            <div class="mb-4">
              <h2 class="footer-heading mb-4">Subscribir Noticias y Novedades</h2>
              <form action="{{ route('contact.newsletter') }}" method="post" class="footer-subscribe" id="form_send_newsletter">
                {{csrf_field()}}

                <div class="input-group mb-3">
                  <input id="emailnews" name="emailnews" type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Ingrese su Email" aria-label="Enter Email" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary text-black" type="submit" id="button-addon2">Enviar</button>
                  </div>
                </div>

                <div class="alert alert-dark" role="alert" id="divMessageNews">
                  Registro saisfactorio
                </div>
                
              </form>
            </div>
            
            <div class="">
              <h2 class="footer-heading mb-4">Siguenos</h2>
                <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
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

            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
            
            </p>
            
            </div>
          </div>
          
        </div>
      </div>
    </footer>

  </div> <!-- .site-wrap -->

  <a href="#top" class="gototop"><span class="icon-angle-double-up"></span></a>

  </body>
</html>

<script src="{{ asset('js/welcome.js') }}"></script>
