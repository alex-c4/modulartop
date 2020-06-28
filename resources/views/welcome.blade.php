@extends('layouts.layout')

@section('meta') 
<title>¡Bienvenido a Modular Top! - Lider de la industria mobiliaria</title> 
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
              <div class="col-md-6 mt-lg-5 text-center">
                <h1 class="text-shadow">CORTE, MECANIZADO DE TABLEROS Y PEGADO DE TAPACANTO</h1>
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
              <h2 class="section-title2">TABLEROS MELAMINICOS Y SUS TAPACANTOS</h2>
              <p class="lead">Diversidad en colores y diseños que se ajustan a la necesidad de tu proyecto de construcción o decoración. </p>
              <!-- <p class="lead">Resistencia comprobada por arquitectos y carpinteros.</p> -->
            </div>
            
            <div class="itemchildtm">
              <!-- cuadro 1 -->
              <div class="hijostm">
                <div class="ftco-media-1">
                  <div class="ftco-media-1-inner">
                    <a href="" class=""><img src="images/tableros/tablero-altobrillo.jpg" alt="Tablero melaminico alto brillo MDF importado, acabado premium oneskin" class="img-tm"></a>
                    <div class="ftco-media-details">
                      <h3><BR>ACABADOS PREMIUM</h3>
                      <p>MDF EN ALTO BRILLO - IMPORTADO</p>
                      <!--<strong>$20,000,000</strong>-->
                    </div>
                  </div> 
                </div>
              </div>
              
              <!-- cuadro 2 -->
              <div class="hijostm">
                <div class="ftco-media-1">
                  <div class="ftco-media-1-inner">
                    <a href="" class=""><img src="images/tableros/tablero-supermate.jpg" alt="Tablero melaminico super mate MDF importado, acabado premium oneskin" class="img-tm"></a>
                    <div class="ftco-media-details">
                        <h3><BR>ACABADOS PREMIUM</h3>
                        <p>MDF EN SUPER MATE - IMPORTADO</p>
                      <!--<strong>$20,000,000</strong>-->
                    </div>
                  </div> 
                </div>
              </div>
              
              <!-- cuadro 3 -->
              <div class="hijostm">
                <div class="ftco-media-1">
                  <div class="ftco-media-1-inner">
                    <a href="" class=""><img src="images/tableros/tablero-cuerpo.jpg" alt="Tablero melaminico hidrófugo y natural MDP importado y nacional, acabado tradicional masisa/losan" class="img-tm"></a>
                    <div class="ftco-media-details">
                        <h3><BR>Acabados Tradicionales</h3>
                        <p>MDP HIDRÓFUGO Y NATURAL, IMPORTADOS Y NACIONALES</p>
                      <!--<strong>$20,000,000</strong>-->
                    </div>
                  </div> 
                </div>
              </div>
              
              <!-- cuadro 4 -->
              <div class="hijostm">
                <div class="ftco-media-1">
                  <div class="ftco-media-1-inner">
                    <a href="" class=""><img src="images/tableros/cocina-altobrillo.jpg" alt="Fabricacion de muebles alto brillo MDF importado, acabado premium oneskin" class="img-tm"></a>
                    <br>
                    <div class="ftco-media-details">
                    <h3><BR></h3>    
                      <!--<strong>$20,000,000</strong>-->
                    </div>
                  </div> 
                </div>
              </div>
              
              <!-- cuadro 5 -->
              <div class="hijostm">
                <div class="ftco-media-1">
                  <div class="ftco-media-1-inner">
                    <a href="" class=""><img src="images/tableros/cocina-supermate.jpg" alt="Fabricacion de muebles super mate MDF importado, acabado premium oneskin" class="img-tm"></a>
                    <div class="ftco-media-details">
                    <h3><BR></h3>        
                      <!--<strong>$20,000,000</strong>-->
                    </div>
                  </div> 
                </div>
              </div>
              
              <!-- cuadro 6 -->
              <div class="hijostm">
                <div class="ftco-media-1">
                  <div class="ftco-media-1-inner">
                    <a href="" class=""><img src="images/tableros/brillo_doblecara.jpg" alt="Fabricacion de muebles hidrófugo y natural MDP importado y nacional, acabado tradicional masisa/losan" class="img-tm"></a>
                    <div class="ftco-media-details">
                    <h3><BR></h3>       
                      <!--<strong>$20,000,000</strong>-->
                    </div>
                  </div> 
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>
  </section>
  

    <!-- Apartado Distribuidores Exclusiva-->
    <section class="py-5 bg-pri site-section how-it-works" id="howitworks-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-3 text-white">SOMOS REPRESENTES EXCLUSIVOS EN VENEZUELA DE LAS MARCAS</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 text-center">
            <div class="pr-5">
              <a href="http://www.losan.es" target="_blank"><img src="images/aliados/losan-logo.png" alt="Losan diseño y tendencias en melaminas - madera - tablero." class="img-fluid"></a>
              <h3><BR></h3>
            </div>
          </div>

          <div class="col-md-6 text-center">
            <div class="pr-5">
              
              <a href="http://www.oneskin.pt" target="_blank"><img src="images/aliados/oneskin-logo.png" alt="Oneskin nace con el propósito de suministrar al mercado internacional con tableros lacados de alta calidad e innovación que abran nuevas oportunidades en la industria del mueble, decoración de interiores, panelación y otros trabajos arquitectónicos." class="img-fluid"></a>
              <h3><BR></h3>
            </div>
          </div>
          <!--
          <div class="col-md-4 text-center">
            <div class="pr-5">
              <span class="text-black">03.</span>
              <span class="custom-icon flaticon-home text-black"></span>
              <h3 class="text-dark">Ejecución.</h3>
              <p class="text-black">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
          </div>
         --> 
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
            
              <!--
              <div class="owl-carousel slide-one-item with-dots">
                  <div><img src="images/fabricacion/fabricacion_1.png" alt="Image" class="img-fluid"></div>
                  <div><img src="images/fabricacion/fabricacion_2.png" alt="Image" class="img-fluid"></div>
                  <div><img src="images/fabricacion/fabricacion_3.png" alt="Image" class="img-fluid"></div>
                  <div><img src="images/fabricacion/fabricacion_4.png" alt="Image" class="img-fluid"></div>
                </div>
                -->
          </div>
          <!--
          <div class="col-lg-4 ml-auto">         
                
               
                <p>Est qui eos quasi ratione nostrum excepturi id recusandae fugit omnis ullam pariatur itaque nisi voluptas impedit  Quo suscipit omnis iste velit maxime.</p>
                
                <p class="lead">Cuentanos de tu proyecto y te lo hacemos realidad...</p>

                <ul class="list-unstyled ul-check success">
                  <li>Placeat maxime animi minus</li>
                  <li>Dolore qui placeat maxime</li>
                  <li>Consectetur adipisicing</li>
                  <li>Lorem ipsum dolor</li>
                  <li>Placeat molestias animi</li>
                </ul>
                
                <p><a href="#" class="btn btn-primary mr-2 mb-2">Cuentanos</a></p>
               
          </div>
           -->
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
                    <img src="images/person_1.jpg" alt="Image" class="img-fluid mr-3">
                    <div>
                      <h3>Pedro Perez</h3>
                      <span>Cliente</span>
                    </div>
                  </div>
                  <div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
                  </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="ftco-testimonial-1">
                  <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                    <img src="images/person_2.jpg" alt="Image" class="img-fluid mr-3">
                    <div>
                      <h3>Julio Cortez</h3>
                      <span>Cliente</span>
                    </div>
                  </div>
                  <div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
                  </div>
                </div>
            </div> 

            <div class="col-md-4 mb-4">
              <div class="ftco-testimonial-1">
                <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                  <img src="images/person_3.jpg" alt="Image" class="img-fluid mr-3">
                  <div>
                    <h3>Jose Cardenas</h3>
                    <span>Cliente</span>
                  </div>
                </div>
                <div>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
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
              <div class="mr-4"><img src="{{ asset('images/iconos/Ruteado.png') }}" alt="Mecanizados de los tableros para optimizar la calidad del producto final" class="img-fluid mr-3"></span></div>
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
                <h3>Enchapado</h3>
                <p>Enchapadoras rectas y curvas automáticas de encolado termoadherido.  
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

          <!--
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-location"></span></div>
              <div>
                <h3>Maquilado</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Leer mas</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="500">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-home"></span></div>
              <div>
                <h3>Enchapado</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Leer mas</a></p>
              </div>
            </div>
          </div>
          -->


        </div>
      </div>
    </section>
     <!--Fin  Seccion Servicio-->

      <!-- Seccion Metodologia-->
    <section class="py-5 bg-pri site-section how-it-works" id="howitworks-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-3 text-white">Nuestros aliados comerciales</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 text-center">
            <div class="pr-5">
              <a href="https://dbgroupvenezuela.com/" target="_blank"><img src="images/aliados/dbgroup-logo.png" alt="Herrajes para mobiliario de cocina y baño, bisagras, cajones, sistemas de alzamiento, interiorismo de cocina, aluminio, patas, soportes y colgadores" class="img-fluid"></a>
              
            </div>
            <br>
          </div>

          <div class="col-md-6 text-center">
            <div class="pr-5">
              
              <a href="https://tuherraje.com.ve" target="_blank"><img src="images/aliados/tuherraje-logo.png" alt="Asiáticos · Griferias y Fregaderos · Closets · Europeos · G*Grass · Iluminación · Patas y Rodapie · Perfilería · Poalgi · Tiradores" class="img-fluid"></a>
              
            </div>
          </div>
          <!--
          <div class="col-md-4 text-center">
            <div class="pr-5">
              <span class="text-black">03.</span>
              <span class="custom-icon flaticon-home text-black"></span>
              <h3 class="text-dark">Ejecución.</h3>
              <p class="text-black">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
          </div>
         --> 
        </div>
      </div>  
    </section>
     <!-- Fin Seccion Metodologia-->

    <!-- Seccion equipo
    <section class="site-section" id="agents-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-7 text-left">
            <h2 class="section-title mb-3">Empresarios dedicados</h2>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus minima neque tempora reiciendis.</p>
          </div>
        </div>
        <div class="row">
          

          <div class="col-md-6 col-lg-4 mb-4">
            <div class="team-member">
              <figure>
                <ul class="social">
                  <li><a href="#"><span class="icon-facebook"></span></a></li>
                  <li><a href="#"><span class="icon-twitter"></span></a></li>
                  <li><a href="#"><span class="icon-linkedin"></span></a></li>
                  <li><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="images/person_1.jpg" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3 bg-primary">
                <h3 class="mb-2">Pedro Perez</h3>
                <span class="position">Presidente</span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4">
            <div class="team-member">
              <figure>
                <ul class="social">
                  <li><a href="#"><span class="icon-facebook"></span></a></li>
                  <li><a href="#"><span class="icon-twitter"></span></a></li>
                  <li><a href="#"><span class="icon-linkedin"></span></a></li>
                  <li><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="images/person_2.jpg" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3 bg-primary">
                <h3 class="mb-2">Jose Perdomo</h3>
                <span class="position">Gerente Ventas</span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4">
            <div class="team-member">
              <figure>
                <ul class="social">
                  <li><a href="#"><span class="icon-facebook"></span></a></li>
                  <li><a href="#"><span class="icon-twitter"></span></a></li>
                  <li><a href="#"><span class="icon-linkedin"></span></a></li>
                  <li><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
                <img src="images/person_3.jpg" alt="Image" class="img-fluid">
              </figure>
              <div class="p-3 bg-primary">
                <h3 class="mb-2">Luis Cradenas</h3>
                <span class="position">Director</span>
              </div>
            </div>
          </div>

          
        </div>
      </div>
    </section>
    -->
    <!-- Fin Seccion Equipo-->

    <!-- Seccion Metodologia
    <section class="py-5 bg-primary site-section how-it-works" id="howitworks-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-3 text-black">Como trabajamos</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 text-center">
            <div class="pr-5 first-step">
              <span class="text-black">01.</span>
              <span class="custom-icon flaticon-house text-black"></span>
              <h3 class="text-black">Analisis y planificación.</h3>
              <p class="text-black">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
          </div>

          <div class="col-md-4 text-center">
            <div class="pr-5 second-step">
              <span class="text-black">02.</span>
              <span class="custom-icon flaticon-coin text-black"></span>
              <h3 class="text-dark">Diseño y desarrollo.</h3>
              <p class="text-black">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
          </div>

          <div class="col-md-4 text-center">
            <div class="pr-5">
              <span class="text-black">03.</span>
              <span class="custom-icon flaticon-home text-black"></span>
              <h3 class="text-dark">Ejecución.</h3>
              <p class="text-black">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
          </div>
        </div>
      </div>  
    </section>
    -->
     <!-- Fin Seccion Metodologia-->

     <!-- Seccion Nosotros
    <section class="site-section" id="modular-top">
      <div class="container">
        
        <div class="row large-gutters">
          <div class="col-lg-6 mb-5">

              <div class="owl-carousel slide-one-item with-dots">
                  <div><img src="images/modulartop.jpg" alt="Image" class="img-fluid"></div>
                  
                </div>

          </div>
          <div class="col-lg-6 ml-auto">
            
            <h2 class="section-title mb-3">Modular Top</h2>
                <p class="lead">Superando retos y evolución constante</p>
                <p>Est qui eos quasi ratione nostrum excepturi id recusandae fugit omnis ullam pariatur itaque nisi voluptas impedit  Quo suscipit omnis iste velit maxime Est qui eos quasi ratione nostrum excepturi id recusandae fugit omnis ullam pariatur itaque nisi voluptas impedit  Quo suscipit omnis iste velit maxime.</p>
                <p>Est qui eos quasi ratione nostrum excepturi id recusandae fugit omnis ullam pariatur itaque nisi voluptas impedit  Quo suscipit omnis iste velit maxime</p>
               
                <p><a href="#" class="btn btn-primary mr-2 mb-2">Leer Mas</a></p>
            
          </div>
        </div>
      </div>
    </section>
    -->
    <!--Fin  Seccion Nosotros-->
    
     <!--Seccion Noticias
    <section class="site-section" id="news-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Noticias &amp; Novedades</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="h-entry">
              <a href="single.html"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
              <h2 class="font-size-regular"><a href="single.html" class="text-dark">En marzo 2020 comienza feria del mueble CCCT</a></h2>
              <div class="meta mb-4">Bryan <span class="mx-2">&bullet;</span> Jan 18, 2020<span class="mx-2">&bullet;</span> <a href="">Leer</a></div>
             <span class="mx-2">&bullet;</span> <a href="single.html">Leer</a></div>-->
              <!--
            </div> 
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="h-entry">
              <a href="single.html"><img src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
              <h2 class="font-size-regular"><a href="single.html" class="text-dark">Llegaron los ultimos modelos de mobiliareio para el hogar</a></h2>
              <div class="meta mb-4">Bryan <span class="mx-2">&bullet;</span> Jan 18, 2020<span class="mx-2">&bullet;</span> <a href="">Leer</a></div>
              
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="h-entry">
              <a href="single.html"><img src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
              <h2 class="font-size-regular"><a href="single.html" class="text-dark">Vive la expericna de los modulares para oficnas</a></h2>
              <div class="meta mb-4">Bryan <span class="mx-2">&bullet;</span> Jan 18, 2020<span class="mx-2">&bullet;</span> <a href="">Leer</a></div>
            </div> 
          </div>
          
        </div>
      </div>
    </section>
    -->
    <!--Fin Seccion Noticias-->

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
              <p class="mb-4">La Yaguara - Calle 11, Caracas, Venezuela</p>

              <p class="mb-0 font-weight-bold">Email</p>
                <p class="mb-0"><a href="#">atencion@modulartop.com</a></p>
                <br>
              <div>
                <button type="button" class="btn btn-primary btn-sm" id="btnShowContact">Ver teléfono</button>
                
              </div>
              <div id="msgcontact">
             
                <p class="mb-0 font-weight-bold">Teléfono</p>
                <p class="mb-4"><a href="#">+58 (0212)-2322354 </a></p>
                
                <a href="https://api.whatsapp.com/send?phone=+58 04168089578">
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
