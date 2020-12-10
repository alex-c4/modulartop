@extends('layouts.layout')

@section('meta') 
<title>Venta de Muebles y Servicio - Tableros Melamínicos - Modular Top</title> 
<meta name="description" 
content="Comercializadora de Tableros Melaminicos, especialistas en la fabricación de muebles y 
servicios de madera con maquinarias de última generación en Caracas, Venezuela." />

<meta name="keywords" content="Modular Top, tableros melaminicos, fabricacion de mobiliario, maquinaria cnc, 
seccionado, mecanizado de madera, prensado mdp, enchapado de tapa cantos" />
@endsection

@section('content')
   
    
    <div class="site-block-wrap">
      <div class="owl-carousel with-dots">

        <div class="site-blocks-cover overlay overlay-2" style="background-image: url(images/banner/fabricacion.jpg);" data-aos="fade" id="home-section">  
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-6 mt-lg-5 text-center">
                <h1 class="text-shadow">¡Fabricamos tus sueños!</h1>
                <p class="mb-5 text-shadow">Hacemos realidad el mobiliario que tienes en mente. 
                Muebles ideales para hoteles, cocinas, oficina, dormitorios, baños y más.</p>
                <p><a href="{{ route('contact.tellus') }}#contact-section" class="btn btn-primary px-5 py-3">Cuéntanos</a></p>
                
              </div>
            </div>
          </div>        
        </div>  
        
        <div class="site-blocks-cover overlay overlay-2" style="background-image: url(images/banner/tableros.jpg);" data-aos="fade" id="home-section">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-6 mt-lg-5 text-center">
                <h1 class="text-shadow">Tableros melaminicos de calidad</h1>
                <p class="mb-5 text-shadow">Garantizamos excelentes acabados en cuanto a innovación, textura y  
                colores, dando soluciones en la fabricación de muebles y diseños arquitectónicos. </p>
                <p><a href="#howitworks-section" class="btn btn-primary px-5 py-3">Visitanos</a></p>
              </div>
            </div>
          </div>        
        </div>  

        <div class="site-blocks-cover overlay overlay-2" style="background-image: url(images/banner/servicios.jpg);" data-aos="fade" id="home-section">  
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-8 mt-lg-5 text-center">
                <h1 class="text-shadow">CORTE, MECANIZADO, Y PEGADO DE TAPACANTO EN TABLEROS </h1>
                  <p class="mb-5 text-shadow">Si necesitas transformar tu materia prima, estás en la Web correcta. 
                  Modificamos tus tableros de madera en partes y piezas, convirtiendo tus proyectos en 
                   productos  que sueñas. 
                  </p>
                <p><a href="{{ url('/servicios') }}" class="btn btn-primary px-5 py-3">Servicios</a></p>
              </div> 
            </div>
          </div>
        </div>

        
      </div>    
    </div>
  <!-- Fin seccion head-->  

  <!-- Seccion Materia Prima-->
  <section class="py-5 bg-black site-section how-it-works" id="howitworks-section">
      <div class="container">

        <div class="contenedor">

            <div class="titulotm">
              <h2 class="section-title2">TABLEROS MELAMÍNICOS Y SUS TAPACANTOS</h2>
              <p class="lead">Diversidad en colores y diseños que se ajustan a la necesidad de tu proyecto de construcción o decoración. </p>
              
            </div>
            
            <div class="itemchildtm">
              <!-- cuadro 1 -->
              <div class="hijostm">
                <div class="ftco-media-1">
                  <div class="ftco-media-1-inner">
                    <a href="{{ url('/acabado-altobrillo') }}" class=""><img src="images/tableros/tablero-altobrillo.jpg" alt="Tablero melaminico alto brillo MDF importado, acabado premium oneskin" class="img-tm"></a>
                    <div class="ftco-media-details">
                      <h3><BR>ACABADOS PREMIUM</h3>
                      <p>MDF-ALTO BRILLO-IMPORTADO</p>
                     
                    </div>
                  </div> 
                </div>
              </div>
              
              <!-- cuadro 2 -->
              <div class="hijostm">
                <div class="ftco-media-1">
                  <div class="ftco-media-1-inner">
                    <a href="{{ url('/acabado-supermate') }}" class=""><img src="images/tableros/tablero-supermate.jpg" alt="Tablero melaminico super mate MDF importado, acabado premium oneskin" class="img-tm"></a>
                    <div class="ftco-media-details">
                        <h3><BR>ACABADOS PREMIUM</h3>
                        <p>MDF-SUPER MATE-IMPORTADO</p>
                     
                    </div>
                  </div> 
                </div>
              </div>
              
              <!-- cuadro 3 -->
              <div class="hijostm">
                <div class="ftco-media-1">
                  <div class="ftco-media-1-inner">
                    <a href="{{ url('/acabado-tradicional') }}" class=""><img src="images/tableros/tablero-cuerpo.jpg" alt="Tablero melaminico hidrófugo y natural MDP importado y nacional, acabado tradicional masisa/losan" class="img-tm"></a>
                    <div class="ftco-media-details">
                        <h3><BR>Acabados Tradicionales</h3>
                        <p>MDP HR (HIDRÓFUGOS) Y ESTÁNDAR, IMPORTADOS Y NACIONALES</p>
                     
                    </div>
                  </div> 
                </div>
              </div>
              
              <!-- cuadro 4 -->
              <div class="hijostm">
                <div class="ftco-media-1">
                  <div class="ftco-media-1-inner">
                    <a href="{{ url('/acabado-altobrillo') }}" class=""><img src="images/tableros/cocina-altobrillo.jpg" alt="Fabricacion de muebles alto brillo MDF importado, acabado premium oneskin" class="img-tm"></a>
                    <br>
                    <div class="ftco-media-details">
                    <h3><BR></h3>    
                      
                    </div>
                  </div> 
                </div>
              </div>
              
              <!-- cuadro 5 -->
              <div class="hijostm">
                <div class="ftco-media-1">
                  <div class="ftco-media-1-inner">
                    <a href="{{ url('/acabado-supermate') }}" class=""><img src="images/tableros/cocina-supermate.jpg" alt="Fabricacion de muebles super mate MDF importado, acabado premium oneskin" class="img-tm"></a>
                    <div class="ftco-media-details">
                    <h3><BR></h3>        
                     
                    </div>
                  </div> 
                </div>
              </div>
              
              <!-- cuadro 6 -->
              <div class="hijostm">
                <div class="ftco-media-1">
                  <div class="ftco-media-1-inner">
                    <a href="{{ url('/acabado-tradicional') }}" class=""><img src="images/tableros/brillo_doblecara.jpg" alt="Fabricacion de muebles hidrófugo y natural MDP importado y nacional, acabado tradicional masisa/losan" class="img-tm"></a>
                    <div class="ftco-media-details">
                    <h3><BR></h3>       
                      
                    </div>
                  </div> 
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>
  </section>
  

    <!-- Apartado Distribuidores Exclusivos-->
    <section class="py-5 bg-pri site-section how-it-works" id="howitworks-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-3 text-white">SOMOS REPRESENTANTES EXCLUSIVOS PARA VENEZUELA DE LAS MARCAS</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 text-center">
            <div class="pr-5">
              <a href="http://www.losan.es" target="_blank"><img src="images/aliados/losan-logo.png" alt="Losan diseño y tendencias en melaminas - madera - tablero." class="img-fluid"></a>
              <h3><BR><BR><BR></h3>
                <p class="site-aliados"><a href="http://www.losan.es" target="_blank">Ver más</a></p>
                        
            </div>
          </div>

          <div class="col-md-6 text-center">
            <div class="pr-5">
              
              <a href="http://www.oneskin.pt" target="_blank"><img src="images/aliados/oneskin-logo.png" alt="Oneskin nace con el propósito de suministrar al mercado internacional con tableros lacados de alta calidad e innovación que abran nuevas oportunidades en la industria del mueble, decoración de interiores, panelación y otros trabajos arquitectónicos." class="img-fluid"></a>
              <h3><BR></h3>
              <p class="site-aliados"><a href="http://www.oneskin.pt" target="_blank">Ver más</a></p>
            </div>
          </div>
          
        </div>
      </div>  
    </section>
     <!-- Fin Seccion Metodologia-->

    <!-- Seccion Fabricacion-->
    <section class="site-section-fabricacion" id="about-section">
      <!-- Elastislide Carousel -->
      <ul id="carousel" class="elastislide-list">
        <li><a href="{{ url('/fabricacion') }}"><img src="images/fabricacion/fabricacion-cocina-1.jpg" alt="Asesoría y desarrollo de proyectos de fabricación de mobiliarios para cocina, diseño, interiores, arquitectura, ingeniería civil, construcción, hoteles, restaurantes" /></a></li>
        <li><a href="{{ url('/fabricacion') }}"><img src="images/fabricacion/fabricacion-habitacion-1.jpg" alt="Asesoría y desarrollo de proyectos de fabricación de mobiliarios para habitaciones, diseño, interiores, arquitectura, ingeniería civil, construcción, hoteles, restaurantes" /></a></li>
        <li><a href="{{ url('/fabricacion') }}"><img src="images/fabricacion/fabricacion-cocina-2.jpg" alt="Asesoría y desarrollo de proyectos de fabricación de mobiliarios para cocina, diseño, interiores, arquitectura, ingeniería civil, construcción, hoteles, restaurantes" /></a></li>
        <li><a href="{{ url('/fabricacion') }}"><img src="images/fabricacion/fabricacion-habitacion-2.jpg" alt="Asesoría y desarrollo de proyectos de fabricación de mobiliarios para habitaciones, diseño, interiores, arquitectura, ingeniería civil, construcción, hoteles, restaurantes" /></a></li>
        <li><a href="{{ url('/fabricacion') }}"><img src="images/fabricacion/fabricacion-mobiliario.jpg" alt="Asesoría y desarrollo de proyectos de fabricación de mobiliarios para habitaciones, diseño, interiores, arquitectura, ingeniería civil, construcción, hoteles, restaurantes" /></a></li>
            
      </ul>
      <!-- End Elastislide Carousel -->
      <div class="container">
        <h2 class="section-title mb-3 text-black"><br> Fabricamos Mobiliarios <br> a la medida de tus sueños</h2>
        
        <div class="row large-gutters">
          <div class="col-lg-4 mb-5">
            <p>
              La fabricación de mobiliarios más la creatividad de nuestro equipo, nos ha
              caracterizado durante años en el mercado por ofrecer soluciones oportunas. 
            </p>
            <p>
              Nos adaptamos a las exigencias de carpinteros, arquitectos, ingenieros, 
              diseñadores de interiores y comerciantes que desean mobiliarios funcionales.
            </p>
          </div>
            
          <div class="col-lg-4 mb-5">
            <p>
            Ofrecemos mobiliarios de tendencia mundial para diferentes sectores comerciales, 
            en especial, hoteles, posadas, oficinas, restaurantes y tiendas...
            <a href="{{ url('/fabricacion') }}">Leer más</a>
            </p>
            <p>
              ¡Cuéntanos tu proyecto y lo fabricamos!
             <br> <br><a href="{{ route('contact.tellus') }}#contact-section" class="btn btn-primary mr-2 mb-2">Cuéntanos</a>
            </p>
            
             
          </div>
         
         
        </div>
      </div>
    </section>
    <!--Fin  Seccion Fabricacion-->
  
    <!--Seccion Cliente-->
    <section class="site-section bg-black testimonial-wrap" id="testimonials-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3 text-white">Clientes Satisfechos<h2>
          </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="ftco-testimonial-1">
                  <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                    <img src="images/yanira.jpg" alt="Image" class="img-fluid mr-3">
                    <div>
                      <h3>YANIRA SALAZA</h3>
                      <span>Fabricación de cocina</span>
                    </div>
                  </div>
                  <div>
                    <p>Realmente me sentí muy contenta con el resultado final, desde el primer momento la arquitecta comprendió perfectamente lo que se deseaba hacer en la cocina, nos dio sus recomendaciones para mejorar el aprovechamiento del espacio. Además, Modular Top me apoyó de principio a fin, los recomiendo por su compromiso, seriedad y la calidad de su producto.</p>
                  </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="ftco-testimonial-1">
                  <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                    <img src="images/match21.jpg" alt="Image" class="img-fluid mr-3">
                    <div>
                      <h3>PROYECTO MATCH 21</h3>
                      <span>Servicio de Maquilado</span>
                    </div>
                  </div>
                  <div>
                    <p>Como fabricantes de cocinas de alto target, hemos encontrado en Modular Top un equipo de personas solidarias y colaboradoras en su gestión de prestar soporte a empresas como la nuestra con su servicio de maquilado. Nos complace referirlos por su empatía, su capacidad de respuesta, su disposición a ofrecer soluciones y la calidad y precisión en los servicios de maquilado. </p>
                  </div>
                </div>
            </div> 

            <div class="col-md-4 mb-4">
              <div class="ftco-testimonial-1">
                <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                  <img src="images/estilos_mendez.png" alt="Image" class="img-fluid mr-3">
                  <div>
                    <h3>ESTILO MENDEZ</h3>
                    <span>Adquisición de Materia Prima</span>
                  </div>
                </div>
                <div>
                  <p>Como fabricantes de muebles del hogar, recomendamos los melamínicos que ofrece Modular Top, quienes se han esforzado por tener alternativas de materia prima. Igualmente cuentan con marcas de reconocida trayectoria internacional: ONESKIN y LOSAN, quienes logran tableros de colores y texturas vanguardistas. </p>
                </div>
              </div>
            </div>
                
        </div>
      </div>
    </section>
     <!--Fin Seccion Cliente-->

    <!-- Seccion Servicios-->
    <section class="site-section bg-light" id="services-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3 text-black">Servicios de alta tecnología para el fabricante</h2>
          </div>
        </div>
        <div class="row align-items-stretch">
          <div class="col-mb-6 col-lg-6 mb-6 mb-lg-6" data-aos="fade-up">
            <div class="unit-4 d-flex">
              <div class="mr-4"><img src="images/iconos/corte.png" alt="Seccionado preciso de tableros para ahorro de material" class="img-fluid mr-3"></div>
              <div>
                <h3>Corte o seccionado</h3>
                <p>Contamos con máquinas que trabajan bajo un software que elabora cortes 
                 precisos en tableros.</p>
                <p><a href="{{ url('/servicios') }}#corte">Leer más</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 mb-6 mb-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="unit-4 d-flex">
              <div class="mr-4"><img src="{{ asset('images/iconos/ruteado.png') }}" alt="Mecanizados de los tableros para optimizar la calidad del producto final" class="img-fluid mr-3"></span></div>
              <div>
                <h3>MECANIZADO DE TABLEROS</h3>
                <p>Maquinaria que cumplen con las exigencias del mercado actual. 
                Cortes, pantografiado, ruteado, fresado, ranurado y perforado.</p>
                <p><a href="{{ url('/servicios') }}#routeado">Leer más</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 mb-6 mb-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="unit-4 d-flex">
              <div class="mr-4"><img src="images/iconos/enchapado.png" alt="Pegadora de tapa canto termoadherido para mejor recistencia en el acabado de los bordes." class="img-fluid mr-3"></div>
              <div>
                <h3>PEGADO DE TAPA CANTO</h3>
                <p>Enchapadoras rectas y curvas automáticas de pegado termoadherido.  
                Aprovecha una infraestructura con tecnología CNC.</p>
                <p><a href="{{ url('/servicios') }}#enchapado">Leer más</a></p>
              </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-6 mb-6 mb-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="unit-4 d-flex">
              <div class="mr-4"><img src="images/iconos/prensado.png" alt="Prensado de láminas de alta presión (hlp) como opción a tu proyecto." class="img-fluid mr-3"></div>
              <div>
                <h3>Prensado de láminas de alta presión (HLP)</h3>
                <p>
                  Aprovecha una mano de obra calificada y máquinas de última generación 
                  que optimizan el proceso del prensado.
                </p>
                <p><a href="{{ url('/servicios') }}#prensado">Leer más</a></p>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>
     <!--Fin  Seccion Servicio-->

      <!-- Seccion Aliados-->
    <section class="py-5 bg-pri site-section how-it-works" id="howitworks-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-3 text-white">Nuestros aliados comerciales</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 text-center">
            <div class="pr-5">
              <a href="https://www.instagram.com/adcgroupvzla" target="_blank"><img src="images/aliados/adcgroup_venezuela.png" alt="Arquitectura, Diseño, Construcción, Todas las soluciones para el hogar o negocio" class="img-fluid"></a>
              <p class="site-aliados"><a href="https://www.instagram.com/adcgroupvzla" target="_blank">@adcgroupvzla</a></p>
            </div>
            
            <br>
          </div>

          <div class="col-md-4 text-center">
            <div class="pr-5">
              
              <a href="https://www.instagram.com/dbgroup.bqto" target="_blank"><img src="images/aliados/dbgroup-bqto.png" alt="Soluciones y herrajes técnicos para mobiliario modernos" class="img-fluid"></a>
              <p class="site-aliados"><a href="https://www.instagram.com/dbgroup.bqto" target="_blank">@dbgroup.bqto</a></p>
              
            </div>
            <br>
          </div> 
          
          <div class="col-md-4 text-center">
            <div class="pr-5">
              
              <a href="https://tuherraje.com.ve" target="_blank"><img src="images/aliados/tuherraje-logo.png" alt="Mejores marcas del mercado Con gran Variedad de Herrajes y Accesorios para Cocinas y Closet, Condimentero, Bisagras, Correderas, iluminacion, Sistemas de alzamientos. Brindando a nuestros Clientes la Asesoria requerida y Atencion calificada" class="img-fluid"></a>
              <p class="site-aliados"><a href="https://www.instagram.com/tuherraje_accesorios" target="_blank">@tuherraje_accesorios</a></p>
              
            </div>
          </div>         
        
        </div>
        <div class="row mb-5 align-items-center">
        </div>  
       

         <!-- Carrusel Aliados-->
        <div class="owl-carousel nonloop-block-13 mb-5">

            
              <div class="ftco-media-1 text-center">
                <div>
                  <a href="https://dbgroupvenezuela.com/" target="_blank" class="d-inline-block mb-4"><img src="images/aliados/dbgroup-venezuela.png" alt="Herrajes técnicos para mobiliario moderno" class="img-fluid"></a>
                  
                  <div class="site-aliados">
                    <a href="https://www.instagram.com/dbgroupvenezuela" target="_blank">@dbgroupvenezuela</a>  
                  </div>
                      
                </div> 
              </div>
              

              <div class="ftco-media-1 text-center">
                <div>
                  <a href="https://habitatvenezuela.com/" target="_blank" class="d-inline-block mb-4"><img src="images/aliados/habitat-logo.png" alt="Porcelanato Español de primera calidad" class="img-fluid"></a>
                  <div class="site-aliados">
                    <a href="https://www.instagram.com/habitatvenezuela" target="_blank">@habitatvenezuela</a>  
                  </div>
    
                </div> 
              </div>
              
              <div class="ftco-media-1 text-center">
                <div>
                  <a href="https://grupoaxdesign.com/" target="_blank" class="d-inline-block mb-4"><img src="images/aliados/arredo-logo.png" alt="Piezas sanitarias, griferias, grifos, espejos, muebles de baños modernos, alta calidad y diseño" class="img-fluid"></a>
                  <div class="site-aliados">
                    <a href="https://www.instagram.com/arredoxpress" target="_blank">@arredoxpress</a>  
                  </div>
    
                </div> 
              </div>

              <div class="ftco-media-1 text-center">
                <div>
                  <a href="https://www.cisa.com/" target="_blank" class="d-inline-block mb-4"><img src="images/aliados/cisa-logo.png" alt="Herrajes, cerraduras electrónicas, evolucionados sistemas de control de accesos" class="img-fluid"></a>
                  <div class="site-aliados">
                    <a href="https://www.instagram.com/cisalatam" target="_blank">@cisalatam</a>  
                  </div>
    
                </div> 
              </div>

              <div class="ftco-media-1 text-center">
                <div>
                  <a href="http://rpccontroltest.com/" target="_blank" class="d-inline-block mb-4"><img src="images/aliados/rpc-logo.png" alt="diseño, asesoría y comercialización de sistemas de control de iluminación, automatización de espacios y seguridad para el mercado residencial, comercial y corporativo" class="img-fluid"></a>
                  <div class="site-aliados">
                    <a href="https://www.instagram.com/rpccontrol" target="_blank">@rpccontrol</a>  
                  </div>
    
                </div> 

        </div>

       
      </div>  
    </section>
     <!-- Fin Seccion Aliados-->

    <!--Seccion contactanos-->
    <section class="site-section bg-light bg-image" id="contact-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3 text-black">Contáctanos</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7 mb-5">

            <form action="{{ route('contact.store') }}" method="post" class="p-5 bg-white" id="form_send_contact_info">
              
              {{csrf_field()}}
              
              <h2 class="h4 text-black mb-5">Contáctanos</h2> 

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Nombre</label>
                  <input type="text" id="fname" name="fname" class="form-control">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Apellido</label>
                  <input type="text" id="lname" name="lname" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" name="email" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="subject">Asunto</label> 
                  <input type="subject" id="subject" name="subject" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Mensaje</label> 
                  <textarea name="message" id="message" name="message" cols="30" rows="7" class="form-control" placeholder="Escriba su nota aqui..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">

                  <div class="alert alert-success" role="alert" id="alertContact">
                    <label id="divMessage" class="text-black"></label> 
                    
                  </div>

                </div>
              </div>
              
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" id="btnSendContactInfo" name="btnSendContactInfo" value="Enviar" class="btn btn-primary btn-md text-white">
                </div>
              </div>

  
            </form>

          </div>

          <div class="col-md-5">
            <div class="p-4 mb-3 bg-white">
              <div class="google-maps">
              
                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1062.5492037967952!2d-66.96455!3d10.480269!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x15082a0df2de7130!2sMODULAR%20TOP%2C%20C.A.!5e1!3m2!1ses!2ses!4v1592443811908!5m2!1ses!2ses" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                
                
              </div>
              <p class="mb-0 font-weight-bold">Dirección</p>
              <p class="mb-4">Calle 2 con calle 1, Galpon 3, La Yaguara, Caracas. Diagonal a la antigua inspectoría de Tránsito, Caracas, Venezuela</p>

              <p class="mb-0 font-weight-bold">Email</p>
                <p class="mb-0"><a href="mailto:info@modulartop.com">info@modulartop.com</a></p>
                <br>
              <div>
                <button type="button" class="btn btn-primary btn-sm" id="btnShowContact">Ver teléfono</button>
                
              </div>
              <div id="msgcontact">
             
                <p class="mb-0 font-weight-bold">Teléfonos</p>
                <p class="mb-4"><a href="tel:+58 212 4433391">+58 (0212)-4433391 </a>/
                <a href="tel:+58 212 4725527">4725527 </a>/
                <a href="tel:+58 212 4720462">4720462</a>
                </p>
               

                <a href="https://api.whatsapp.com/send?phone=+58 04241854168">
                <img src="images/boton-watsapp.webp" alt="Contacto via whatsapp" class="img-fluid"></a>
                
              </div>
              <br>
              

              
            </div>
          </div>

        </div>
      </div>
    </section>
    <!--Fin Seccion seccion Contactanos-->


@endsection
