<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Modular Top</title>

     <!-- Isotipo Modular Top Favicons -->
    <link href="<?php echo e(asset('images/modulartop.ico')); ?>" rel="icon">
    <?php echo $__env->yieldContent('meta'); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('fonts/icomoon/style.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery-ui.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.theme.default.min.css')); ?>">
    <!-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->

    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.fancybox.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-datepicker.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('fonts/flaticon/font/flaticon.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/aos.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>?v=<?php echo e(env('APP_VERSION', '1')); ?>">



    <!--Bloque incorporado para carrusel fabricacion-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/elastislide.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/custom.css')); ?>" />
    <!-- Javascript para reproducir los videos youtube -->
    <!-- <script>
      let d = new Date();
      // document.body.innerHTML = "<h1>Time right now is:  " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds()

      alert(+ d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds());
    </script> -->
    
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



    <!-- Bootstrap CSS CDN -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> -->
    <!-- Our Custom CSS -->

    <!-- Font Awesome JS -->
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script> -->
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script> -->

    <link rel="stylesheet" href="<?php echo e(asset('css/styleLayoutSidebar.css')); ?>?v=<?php echo e(env('APP_VERSION', '1')); ?>">

<?php echo $__env->yieldContent('header'); ?>

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
      <img  src="<?php echo e(asset('images/navidad/iconClose25x25.png')); ?>" alt="" srcset="">
    </div>
    <div class="imgNavidad">
      <img src="<?php echo e(asset('images/navidad/Pop-Up-Aniversario-4.jpg')); ?>?v=<?php echo e(env('APP_VERSION', '1')); ?>" alt="" srcset="">
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
                <a href="<?php echo e(route('welcome')); ?>"><img id="logoClass" src="<?php echo e(asset('images/modulartop_blanco.png')); ?>" alt="" srcset=""></a>
              </div>
           
          </div>
  

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">
            
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="<?php echo e(route('welcome')); ?>" class="nav-link">Inicio</a></li>
                <li><a href="<?php echo e(route('welcome')); ?>#howitworks-section" class="nav-link" >Materia Prima</a></li>
                <li><a href="<?php echo e(route('welcome')); ?>#about-section" class="nav-link <?php echo e((Request::is('contact/tellus')) ? 'active' : ''); ?>" >Fabricacion</a></li>
                <!-- <li><a href="<?php echo e(route('welcome')); ?>#services-section" class="nav-link" >Servicios</a></li> -->
                <li><a href="<?php echo e(url('/servicios')); ?>" class="nav-link" >Servicios</a></li>
                <li><a href="<?php echo e(url('/modulartop')); ?>" class="nav-link">Modular Top</a></li>
                <li><a href="<?php echo e(url('/novedades')); ?>" class="nav-link">Novedades <?php if(Utils::getCountNews() > 0): ?><span class="cantNews"><?php echo e(Utils::getCountNews()); ?></span><?php endif; ?></a></li>
                <li><a href="<?php echo e(route('welcome')); ?>#contact-section" class="nav-link">Contactanos</a></li>
                <?php if(Auth::check()): ?>
                  <li><a href="<?php echo e(route('logout')); ?>" class="nav-link">Salir</a></li>
                  <!-- <li><a href="<?php echo e(route('home')); ?>" class="nav-link"><span class="icon-home"></span> Mi Sesión</a></li> -->
                <?php else: ?>
                  <li><a href="<?php echo e(route('login')); ?>" class="nav-link"><span class="icon-user"></span></a></li>
                <?php endif; ?>

              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>
  <!-- <script src="<?php echo e(asset('js/jquery-3.3.1.min.js')); ?>"></script> -->

  


  <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo e(asset('images/banner/')); ?>/<?php echo $__env->yieldContent('imgBanner'); ?>);" data-aos="fade">
    <div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-5 mx-auto mt-lg-5 text-center">
        <h1><?php echo $__env->yieldContent('title'); ?> </h1>
        <p class="mb-5"><strong class="text-white"><?php echo $__env->yieldContent('subtitle'); ?> </strong></p>
        
        </div>
    </div>
    </div>

    <!-- <a href="#blog" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a> -->
  </div> 


<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Menu</h3>
                <strong>MT</strong>
            </div>

            <ul class="list-unstyled components">
                
                
                <li <?php echo e(Utils::getActiveRouteClass(Route::currentRouteName(), 'home')); ?> >
                    <a href="<?php echo e(route('home')); ?>" >
                        <!-- <i class="fas fa-home"></i> -->
                        <span class="icon-dashboard2"></span>
                        Dashboard
                    </a>
                </li>
                <!-- <li>
                    <a href="#">
                        <i class="fas fa-image"></i>
                        Portfolio
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-question"></i>
                        FAQ
                    </a>
                </li> -->
                <li <?php echo e(Utils::getActiveRouteClass(Route::currentRouteName(), 'newsletter')); ?> >
                    <a href="#newsletter"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <!-- <i class="fas fa-home"></i> -->
                        <span class="icon-newspaper-o"></span>
                        Novedades
                    </a>
                    <ul class="collapse list-unstyled" id="newsletter">
                      <?php if(Auth::user()->roll_id == 1 || Auth::user()->roll_id == 3): ?>  

                        <li>
                            <a href="<?php echo e(route('newsletter.create')); ?>">
                              <span class="icon-plus"></span>
                              Agregar
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('newsletter.index')); ?>">
                              <span class="icon-list"></span>
                              Listar
                            </a>
                        </li>
                      <?php endif; ?>
                        <li>
                            <a href="<?php echo e(route('novedades')); ?>">
                              <span class="icon-search"></span>
                              Visualizar
                            </a>
                        </li>
                    </ul>
                </li>

                <?php if(Auth::user()->roll_id == 1 || Auth::user()->roll_id == 5): ?>  
                 
                 <li <?php echo e(Utils::getActiveRouteClass(Route::currentRouteName(), 'user_validation')); ?> >
                       <a href="#user-operation"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                             <span class="icon-users"></span>
                             Usuarios
                       </a>
                       <ul class="collapse list-unstyled" id="user-operation">
                   <?php if(Auth::user()->roll_id == 1): ?> 
                         <li>
                           <a href="<?php echo e(route('userClient.create')); ?>">
                               <span class="icon-plus"></span>
                               Registrar usuario
                           </a>
                         </li>
                         <li>
                           <a href="<?php echo e(route('user.showUser')); ?>">
                               <span class="icon-search"></span>
                               Consultar usuarios
                           </a>
                         </li>
                   <?php endif; ?>
                       <li>
                         <a href="<?php echo e(route('userValidation.index')); ?>">
                             <span class="icon-users"></span>
                             Validar usuarios
                         </a>
                       </li>
   
                     </ul>
                     
                 </li>       
   
               <?php endif; ?>
               
               <?php if(Auth::user()->roll_id == 1 || Auth::user()->roll_id == 2 || Auth::user()->roll_id == 4 || Auth::user()->roll_id == 5): ?>  
               <li <?php echo e(Utils::getActiveRouteClass(Route::currentRouteName(), 'product')); ?>>
                    <a href="#product"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="icon-square"></span>
                        Productos
                    </a>
                    <ul class="collapse list-unstyled" id="product">
                      <?php if(Auth::user()->roll_id == 1 || Auth::user()->roll_id == 5): ?>  

                        <li>
                          <a href="<?php echo e(route('product.create')); ?>">
                              <span class="icon-plus"></span>
                              Registrar producto
                          </a>
                        </li>
                        
                        <li>
                          <a href="<?php echo e(route('product.index')); ?>">
                              <span class="icon-search"></span>
                              Consultar productos
                          </a>
                        </li>
                        
                        <li>
                          <a href="<?php echo e(route('fichaTecnica.uploadFichaTecnica')); ?>">
                              <span class="icon-file-text-o"></span>
                              Ficha técnica
                          </a>
                        </li>
                      <?php endif; ?>

                      <li>
                        <a href="<?php echo e(route('welcome')); ?>/#howitworks-section">
                          <span class="icon-square"></span>
                          Productos
                        </a>
                      </li>

                      <li>
                        <a href="<?php echo e(route('fichaTecnica.showFichaTecnica')); ?>">
                          <span class="icon-download"></span>
                          Descargar ficha técnica
                        </a>
                      </li>

                    </ul>
                    
                </li>
                <?php endif; ?>

                <?php if(Auth::user()->roll_id == 1 || Auth::user()->roll_id == 5): ?>  

                <li <?php echo e(Utils::getActiveRouteClass(Route::currentRouteName(), 'compra')); ?>>
                    <a href="#compra"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="icon-shopping-cart"></span>
                        Compra
                    </a>
                    <ul class="collapse list-unstyled" id="compra">
                      <li>
                        <a href="<?php echo e(route('purchase.create')); ?>">
                            <span class="icon-plus"></span>
                            Registrar compra
                        </a>
                      </li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if(Auth::user()->roll_id == 1 || Auth::user()->roll_id == 5): ?>  
                <li <?php echo e(Utils::getActiveRouteClass(Route::currentRouteName(), 'venta')); ?>>
                    <a href="#venta"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="icon-file-text"></span>
                        Venta
                    </a>
                    <ul class="collapse list-unstyled" id="venta">
                      <li>
                        <a href="<?php echo e(route('sale.create')); ?>">
                            <span class="icon-plus"></span>
                            Registrar venta
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo e(route('sale.saleslist')); ?>">
                            <span class="icon-list-ul"></span>
                            Consultar ventas
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo e(route('sale.statistics')); ?>">
                            <span class="icon-bar-chart"></span>
                            Estadísticas de ventas
                        </a>
                      </li>
                      
                    </ul>
                </li>
                <?php endif; ?>

                <?php if((Auth::user()->is_client == 1 && Auth::user()->validationByAdmin == 1) || Auth::user()->roll_id == 1 || Auth::user()->roll_id == 5): ?>
                <li <?php echo e(Utils::getActiveRouteClass(Route::currentRouteName(), 'order_sale')); ?>>
                    <a href="#order_sale"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="icon-file"></span>
                        Orden de compra
                    </a>
                    <ul class="collapse list-unstyled" id="order_sale">
                      <li>
                        <a href="<?php echo e(route('ordersale.downloadexcel')); ?>">
                            <span class="icon-file-excel-o"></span>
                            Descargar planilla
                        </a>
                      </li>

                      <?php if(Auth::user()->roll_id == 1 || Auth::user()->roll_id == 5): ?>
                        <li>
                          <a href="javascript:void(0)" data-toggle="modal" data-target="#planillaModal">
                              <span class="icon-upload"></span>
                              Actualizar planilla
                          </a>
                        </li>
                      <?php endif; ?>
                      <li>
                        <a href="<?php echo e(route('ordersale.create')); ?>">
                            <span class="icon-plus"></span>
                            Crear orden de compra
                        </a>
                      </li>
                      <?php if(Auth::user()->roll_id == 1 || Auth::user()->roll_id == 4 || Auth::user()->roll_id == 5): ?>
                      <li>
                        <a href="<?php echo e(route('ordersale.index')); ?>">
                            <span class="icon-search"></span>
                            Consultar orden de compra
                        </a>
                      </li>
                      <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if((Auth::user()->is_client == 1 && Auth::user()->validationByAdmin == 1) || Auth::user()->roll_id == 1 || Auth::user()->roll_id == 5): ?>
                <li <?php echo e(Utils::getActiveRouteClass(Route::currentRouteName(), 'inventory')); ?>>
                    <a href="#inventory"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="icon-archive"></span>
                        Inventario
                    </a>
                    <ul class="collapse list-unstyled" id="inventory">
                      <li>
                        <a href="<?php echo e(route('inventory.index')); ?>">
                            <span class="icon-search"></span>
                            Consultar inventario
                        </a>
                      </li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if(Auth::user()->roll_id == 1 || Auth::user()->roll_id == 3): ?>
                <li <?php echo e(Utils::getActiveRouteClass(Route::currentRouteName(), 'project')); ?>>
                    <a href="#project"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="icon-image"></span>
                        Proyectos
                    </a>
                    <ul class="collapse list-unstyled" id="project">
                      <li>
                        <a href="<?php echo e(route('project.create')); ?>">
                            <span class="icon-plus"></span>
                            Crear proyecto
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo e(route('project.index')); ?>">
                            <span class="icon-search"></span>
                            Consultar proyecto
                        </a>
                      </li>
                    </ul>
                </li>
                <?php endif; ?>

                
                <?php if(Auth::user()->roll_id == 1 || Auth::user()->roll_id == 3): ?>
                <li <?php echo e(Utils::getActiveRouteClass(Route::currentRouteName(), 'leds')); ?>>
                    <a href="#leds"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="icon-files-o"></span>
                        Leds
                    </a>
                    <ul class="collapse list-unstyled" id="leds">
                      <li>
                        <a href="<?php echo e(route('leds.ledsget')); ?>">
                            <span class="icon-download"></span>
                            Descargar Leds
                        </a>
                      </li>
                    </ul>
                </li>
                <?php endif; ?>

                <li <?php echo e(Utils::getActiveRouteClass(Route::currentRouteName(), 'user')); ?>>
                    <a href="#user"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <!-- <i class="fas fa-home"></i> -->
                        <span class="icon-user"></span>
                        Información
                    </a>
                    <ul class="collapse list-unstyled" id="user">
                      <li>
                        <a href="<?php echo e(route('user.edit')); ?>">
                            <span class="icon-pencil"></span>
                            Mis datos
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo e(route('password.showFormResetPassw')); ?>">
                            <span class="icon-lock"></span>
                            Cambio de clave
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo e(route('user.delete.confirm')); ?>">
                            <span class="icon-trash"></span>
                            Elminar mi cuenta
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo e(route('logout')); ?>">
                            <span class="icon-close"></span>
                            Salir
                        </a>
                      </li>
                    </ul>
                    
                </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content">

      
            <?php echo $__env->yieldContent('content'); ?>      

        
        </div>
    </div>


    <br>

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
                <li><a href="<?php echo e(route('welcome')); ?>">INICIO</a></li>
                <li><a href="<?php echo e(route('welcome')); ?>#howitworks-section">MATERIA PRIMA</a></li>
                <li><a href="<?php echo e(route('welcome')); ?>#about-section">FABRICACION</a></li>
                <li><a href="<?php echo e(route('welcome')); ?>#services-section">SERVICIOS</a></li>
                <li><a href="<?php echo e(url('/modulartop')); ?>">MODULAR TOP</a></li>
                <li><a href="<?php echo e(url('/novedades')); ?>">NOVEDADES</a></li>
                <li><a href="<?php echo e(route('welcome')); ?>#contact-section">CONTACTANOS</a></li>
              </ul>
            </div>
            
          </div>
        </div>
      
        <div class="col-md-4">
          <div class="mb-4">
            <h2 class="footer-heading mb-4">Subscribirme a Novedades</h2>
            <form action="<?php echo e(route('contact.contact')); ?>" method="post" class="footer-subscribe" id="form_send_contact">
              <?php echo e(csrf_field()); ?>


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
          </div>
          
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
  	  <img src="<?php echo e(asset('images/WhatsApp2.png')); ?>" alt="" srcset="" onclick="showWhatsAppContent()">
  	</a>
  	<a href="javascript:void(0);" class="whatsapp newsletterSubc" >
  	  <img src="<?php echo e(asset('images/email-box-web.png')); ?>" alt="" srcset="" onclick="showSubcripcionAppContent()">
  	</a>
  </hatsAppCont>

  <a href="#top" class="gototop"><span class="icon-angle-double-up"></span></a>

  <!-- whatsApp content -->
    <div id="whatsAppContent">
      <div id="whatsAppHeader">
        <!-- <img src="<?php echo e(asset('images/iconClose25x25.png')); ?>" alt="" srcset="" onclick="closeWhatsApp()"> -->
        <span class="icon-close2 closeWhatsApp" onclick="closeWhatsApp()"></span>

      </div>
      <div >
        <a href="javascript:void(0)">
        <img src="<?php echo e(asset('images/messageWhatsApp.png')); ?>" alt="Contacto via whatsapp" class="img-fluid"></a>
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
      <form action="<?php echo e(route('contact.contact')); ?>" method="post" class="" id="form_send_contact4">
        <?php echo e(csrf_field()); ?>

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

    <!-- Modal -->
    <div class="modal fade" id="planillaModal" tabindex="-1" aria-labelledby="planillaModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Actualizar planilla</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form id="form_updloadexcel" action="<?php echo e(route('ordersale.uploadexcel')); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">

            <div class="modal-body">
              
                <div id="message_alert">
                </div>

                <div class="form-group">
                    <label for="txtSubType">Nueva planilla de orden de compra</label>
                    <input type="file" class="form-control" id="planilla" name="planilla">
                </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" id="btnUpload">Subir planilla</button>
            </div>

          </form>

        </div>
      </div>
    </div>
    <!-- Fin Modal -->
  </body>
</html>

    <script src="<?php echo e(asset('js/jquery-3.3.1.min.js')); ?>"></script>

    <script src="<?php echo e(asset('js/jquery-ui.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.countdown.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.easing.1.3.js')); ?>"></script>
    <script src="<?php echo e(asset('js/aos.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.fancybox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.sticky.js')); ?>"></script>
    
    <script src="<?php echo e(asset('js/main.js')); ?>?v=<?php echo e(env('APP_VERSION', '1')); ?>"></script>

    <script src="<?php echo e(asset('js/welcome.js')); ?>?v=<?php echo e(env('APP_VERSION', '1')); ?>"></script>
    <!--Bloque incorporado para carrusel fabricacion -->
    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> -->
    <script type="text/javascript" src="<?php echo e(asset('js/jquerypp.custom.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.elastislide.js')); ?>"></script>



    <script src="<?php echo e(asset('js/modernizr.custom.17475.js')); ?>"></script>
     <!-- fin del bloque fabricacion -->
     <!-- Javascript para captcha de formulario -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script type="text/javascript" src="<?php echo e(asset('js/videos.js')); ?>"></script>

    <script type="text/javascript">
    
			
			$( '#carousel' ).elastislide();
      
      /**
       * Script para cambiar el logo cuando el usuario realiza el scroll
       */
      $(function(){
        $(document).scroll(function(){
          if($(this).scrollTop() > 1){
            $('#logoClass').attr('src', '<?php echo e(asset('images/modulartop.png')); ?>')              
          }else{
            $('#logoClass').attr('src', '<?php echo e(asset('images/modulartop_blanco.png')); ?>')
          }
        });

        var Message = function(){
          
          <?php if( isset($show) ): ?>
            if(eval("<?php echo e($show); ?>")){
              showMessage();
            }
          <?php endif; ?>
        }

        Message();
      });
      


		</script>
  <!-- fin del bloque fabricacion -->  

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

  <?php echo $__env->yieldContent('script'); ?><?php /**PATH C:\xampp\htdocs\modulartop\modulartop\resources\views/layouts/layoutSidebar.blade.php ENDPATH**/ ?>