@extends('layouts.layout')

@section('content')
   
    
    <div class="site-block-wrap">
<<<<<<< HEAD
    <div class="owl-carousel with-dots">


      <div class="site-blocks-cover overlay overlay-2" style="background-image: url(images/banner/fabricacion.jpg);" data-aos="fade" id="home-section">  
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-6 mt-lg-5 text-center">
              <h1 class="text-shadow">¡Fabricamos tus sueños!</h1>
              <p class="mb-5 text-shadow">Nos adaptamos a cualquier diseño de interior a madera que tengas en mente... 
Muebles ideales para hoteles, cocinas, oficina, dormitorios, baños y más
.</p>
              <p><a href="#" target="_blank" class="btn btn-primary px-5 py-3">Cuéntanos</a></p>
              
            </div>
          </div>
        </div>        
      </div>  

      
      <div class="site-blocks-cover overlay overlay-2" style="background-image: url(images/banner/tableros.jpg);" data-aos="fade" id="home-section">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-6 mt-lg-5 text-center">
              <h1 class="text-shadow">Tableros melaminicos de calidad</h1>
              <p class="mb-5 text-shadow">Garantizamos mejores acabados con texturas que ofrecen satisfacción sensorial y estilo sofisticado para la decoración. </p>
              <p><a href="#" target="_blank" class="btn btn-primary px-5 py-3">Visitanos</a></p>
              
            </div>
          </div>
        </div>        
      </div>  
  
      

       <div class="site-blocks-cover overlay overlay-2" style="background-image: url(images/banner/servicios.jpg);" data-aos="fade" id="home-section">  
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-6 mt-lg-5 text-center">
              <h1 class="text-shadow">Maquilado con Tecnologia de Punta</h1>
              <p class="mb-5 text-shadow">Si necesitas transformar la madera estás en la web correcta. 
Convertimos su materia prima (madera) en partes, piezas y productos.
</p>
              <p><a href="#" target="_blank" class="btn btn-primary px-5 py-3">Servicios</a></p>
              
=======
      <div class="owl-carousel with-dots">

        <div class="site-blocks-cover overlay overlay-2" style="background-image: url(images/mobiliario_2.png);" data-aos="fade" id="home-section">  
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-6 mt-lg-5 text-center">
                <h1 class="text-shadow">¡Fabricamos tus sueños!</h1>
                <p class="mb-5 text-shadow">Nos adaptamos a cualquier diseño de interior a madera que tengas en mente... Muebles ideales para hoteles, cocinas, oficina, dormitorios, baños y más.</p>
                <p><a href="{{ route('contact.tellus') }}#contact-section" class="btn btn-primary px-5 py-3">Cuéntanos</a></p>
                
              </div>
            </div>
          </div>        
        </div>  
        
        <div class="site-blocks-cover overlay overlay-2" style="background-image: url(images/tablero_melaminico.jpg);" data-aos="fade" id="home-section">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-6 mt-lg-5 text-center">
                <h1 class="text-shadow">Tableros melaminicos de calidad</h1>
                <p class="mb-5 text-shadow">Garantizamos mejores acabados con texturas que ofrecen satisfacción sensorial y estilo sofisticado para la decoración. </p>
                <p><a href="#" target="_blank" class="btn btn-primary px-5 py-3">Visitanos</a></p>
                
              </div>
            </div>
          </div>        
        </div>  

        <div class="site-blocks-cover overlay overlay-2" style="background-image: url(images/servicios.png);" data-aos="fade" id="home-section">  
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-6 mt-lg-5 text-center">
                <h1 class="text-shadow">Maquilado con Tecnologia de Punta</h1>
                <p class="mb-5 text-shadow">Si necesitas transformar la madera estás en la web correcta. Convertimos su materia prima (madera) en partes, piezas y productos.</p>
                <p><a href="#" target="_blank" class="btn btn-primary px-5 py-3">Servicios</a></p>
                
              </div>
>>>>>>> da4bfac6962f67f8581edbe60389a2bdc2a84fea
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
            <h2 class="section-title2">Tableros Melaminicos</h2>
            <p class="lead">Diversidad en colores y diseños que se ajustan a la necesidad de tu proyecto de construcción o decoración. </p>
            <p class="lead">Resistencia comprobada por arquitectos y carpinteros.</p>
          </div>
          
          <div class="itemchildtm">
            <!-- cuadro 1 -->
            <div class="hijostm">
              <div class="ftco-media-1">
                <div class="ftco-media-1-inner">
                  <a href="" class=""><img src="images/tableros/tablero-altobrillo.jpg" alt="FImageo" class="img-tm"></a>
                  <div class="ftco-media-details">
                    <h3><BR>PARA ACABADOS</h3>
                    <p>ALTO BRILLO - IMPORTADOS</p>
                    <!--<strong>$20,000,000</strong>-->
                  </div>
                </div> 
              </div>
            </div>
            
            <!-- cuadro 2 -->
            <div class="hijostm">
              <div class="ftco-media-1">
                <div class="ftco-media-1-inner">
                  <a href="" class=""><img src="images/tableros/tablero-supermate.jpg" alt="FImageo" class="img-tm"></a>
                  <div class="ftco-media-details">
                      <h3><BR>PARA ACABADOS</h3>
                      <p>SUPER MATE - IMPORTADO</p>
                    <!--<strong>$20,000,000</strong>-->
                  </div>
                </div> 
              </div>
            </div>
            
            <!-- cuadro 3 -->
            <div class="hijostm">
              <div class="ftco-media-1">
                <div class="ftco-media-1-inner">
                  <a href="" class=""><img src="images/tableros/tablero-cuerpo.jpg" alt="FImageo" class="img-tm"></a>
                  <div class="ftco-media-details">
                      <h3><BR>PARA CUERPOS</h3>
                      <p>IMPORTADOS Y NACIONALES</p>
                    <!--<strong>$20,000,000</strong>-->
                  </div>
                </div> 
              </div>
            </div>
            
            <!-- cuadro 4 -->
            <div class="hijostm">
              <div class="ftco-media-1">
                <div class="ftco-media-1-inner">
                  <a href="" class=""><img src="images/tableros/cocina-altobrillo.jpg" alt="FImageo" class="img-tm"></a>
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
                  <a href="" class=""><img src="images/tableros/cocina-supermate.jpg" alt="FImageo" class="img-tm"></a>
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
                  <a href="" class=""><img src="images/tableros/brillo_doblecara.jpg" alt="FImageo" class="img-tm"></a>
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

  

    <!-- Apartado Distribuidores Exclusiva-->
    <section class="py-5 bg-pri site-section how-it-works" id="howitworks-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-3 text-white">Somos distribuidores Exclusivos en Venezuela</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 text-center">
            <div class="pr-5">
              <a href="" ><img src="images/aliados/losan-logo.png" alt="FImageo" class="img-fluid"></a>
              <h3><BR></h3>
            </div>
          </div>

          <div class="col-md-6 text-center">
            <div class="pr-5">
              
              <a href="" ><img src="images/aliados/oneskin-logo.png" alt="FImageo" class="img-fluid"></a>
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
      <li><a href="#"><img src="images/fabricacion/fabricacion-cocina-1.jpg" alt="image01" /></a></li>
      <li><a href="#"><img src="images/fabricacion/fabricacion-habitacion-1.jpg" alt="image02" /></a></li>
      <li><a href="#"><img src="images/fabricacion/fabricacion-cocina-2.jpg" alt="image03" /></a></li>
      <li><a href="#"><img src="images/fabricacion/fabricacion-habitacion-2.jpg" alt="image03" /></a></li>
      <li><a href="#"><img src="images/fabricacion/fabricacion-mobiliario.jpg" alt="image03" /></a></li>
           
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
            en especial, hoteles, posadas, oficinas, restaurantes y tiendas.
            </p>
            <p>
              ¡Cuéntanos tu proyecto y lo fabricamos!
             <br> <br><a href="{{ route('contact.tellus') }}#contact-section" class="btn btn-primary mr-2 mb-2">Cuentanos</a>
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
            <h2 class="section-title mb-3 text-black">Servicios de alta tecnologia para el fabricante</h2>
          </div>
        </div>
        <div class="row align-items-stretch">
          <div class="col-mb-6 col-lg-6 mb-6 mb-lg-6" data-aos="fade-up">
            <div class="unit-4 d-flex">
              <div class="mr-4"><img src="images/iconos/corte.png" alt="Image" class="img-fluid mr-3"></div>
              <div>
                <h3>Corte o seccionado</h3>
                <p>Contamos con máquinas que trabajan bajo un software que elabora cortes mecanizados precisos para tableros.</p>
                <p><a href="#">Leer mas</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 mb-6 mb-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="unit-4 d-flex">
              <div class="mr-4"><img src="images/iconos/routeado.png" alt="Image" class="img-fluid mr-3"></span></div>
              <div>
                <h3>Routeado</h3>
                <p>Garantizamos maquinaria que cumplen con las exigencias del mercado actual. Cortes pantografiado, ranurado y perforado.</p>
                <p><a href="#">Leer mas</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 mb-6 mb-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="unit-4 d-flex">
              <div class="mr-4"><img src="images/iconos/enchapado.png" alt="Image" class="img-fluid mr-3"></div>
              <div>
                <h3>Enchapado</h3>
                <p>Enchapados mediante tecnología de termo-adherencia para maderas planas o curvas con acabados de primera calidad.</p>
                <p><a href="#">Leer mas</a></p>
              </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-6 mb-6 mb-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="unit-4 d-flex">
              <div class="mr-4"><img src="images/iconos/prensado.png" alt="Image" class="img-fluid mr-3"></div>
              <div>
                <h3>Prensado de láminas de alta presión (HLP)</h3>
                <p>
                  Aprovecha una mano de obra calificada y máquinas de última generación que optimizan el proceso del prensado.
                </p>
                <p><a href="#">Leer mas</a></p>
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
              <a href="" ><img src="images/logo-dbgroup_2.png" alt="FImageo" class="img-fluid"></a>
              
            </div>
          </div>

          <div class="col-md-6 text-center">
            <div class="pr-5">
              
              <a href="" class="d-inline-block mb-4"><img src="images/logo-tuherraje.png" alt="FImageo" class="img-fluid"></a>
              
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
            <h2 class="section-title mb-3 text-black">Contactanos</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7 mb-5">

            

            <form action="{{ route('contact.store') }}" method="post" class="p-5 bg-white" id="form_send_contact_info">
              
              {{csrf_field()}}
              
              <h2 class="h4 text-black mb-5">Contactanos</h2> 

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
              
            <p class="mb-0 font-weight-bold">Direccion</p>
              <p class="mb-4">La Yaguara - Calle 11, Caracas, Venezuela</p>
              
              <div>
                <button type="button" class="btn btn-light btn-sm" id="btnShowContact">Ver información</button>
              </div>
              <div id="msgcontact">

                
                
                <p class="mb-0 font-weight-bold">Telefono</p>
                <p class="mb-4"><a href="#">+58 2322354</a></p>
                
                <p class="mb-0 font-weight-bold">Email</p>
                <p class="mb-0"><a href="#">atencion@modulartop.com</a></p>
              </div>

            </div>
            
          </div>
        </div>
      </div>
    </section>
    <!--Fin Seccion seccion Contactanos-->

<<<<<<< HEAD
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
            <form action="#" method="post" class="footer-subscribe">
              <div class="input-group mb-3">
                <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="INgrese su Email" aria-label="Enter Email" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary text-black" type="button" id="button-addon2">Enviar</button>
                </div>
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
=======
>>>>>>> da4bfac6962f67f8581edbe60389a2bdc2a84fea


@endsection
