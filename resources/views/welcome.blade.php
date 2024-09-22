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
   
    {!! NoCaptcha::renderJs() !!}
    
    <div class="site-block-wrap">
      <div class="owl-carousel with-dots">

        <div class="site-blocks-cover overlay overlay-2" style="background-image: url(images/banner/banner_1.png);" data-aos="fade" id="home-section">  
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-12 mt-lg-5 text-center">
                <h1 class="text-shadow">TABLEROS MELAMÍNICOS DE CALIDAD</h1>
                <p class="mb-5 text-shadow">Nos comprometemos a trabajar con <span style="font-weight: 700;">nuestros aliados y clientes</span> para crear espacios únicos y funcionalidades 
                  que satisfagan las expectativas de diseño, construcción y necesidades funcionales de los consumidores.</p>
                <!-- <p><a href="{{ route('welcome') }}#contact-section" class="btn btn-primary px-5 py-3">Cuéntanos</a></p> -->
                
              </div>
            </div>
          </div>        
        </div>  
        
        <!-- <div class="site-blocks-cover overlay overlay-2" style="background-image: url(images/banner/banner_2.png);" data-aos="fade" id="home-section">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-12 mt-lg-5 text-center">
                <h1 class="text-shadow">RESPALDADOS POR MARCAS LÍDERES</h1>
                <p class="mb-5 text-shadow">Representamos marcas de prestigio mundial que ofrecen soluciones innovadoras, 
                  inspirando la transformación de espacios con estilo, creatividad y excelencia.</p>
              </div>
            </div>
          </div>        
        </div>  

        <div class="site-blocks-cover overlay overlay-2" style="background-image: url(images/banner/banner_3.png);" data-aos="fade" id="home-section">  
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-12 mt-lg-5 text-center">
                <h1 class="text-shadow">DISTRIBUYENDO LO MEJOR PARA TUS PROYECTOS</h1>
                  <p class="mb-5 text-shadow">Como distribuidores de herrajes, paneles y accesorios, brindamos las mejores alternativas en cada detalle, 
                    asegurando que tus proyectos se destaquen por su funcionalidad y estilo.</p>
              </div> 
            </div>
          </div>
        </div> -->

        
      </div>    
    </div>
  <!-- Fin seccion head-->  

  <!-- Seccion Materia Prima-->
  <section class="py-5 bg-vinotinto site-section how-it-works" id="howitworks-section">
      <div class="tabla-catag">
        <div class=title-catag>TABLEROS MELAMÍNICOS</div>
        <div class="logos">
          <img src="images/aliados/oneskin-logo.png" alt="oneskin">
          <img src="images/aliados/losan-logo.png" alt="losan">
          <img src="images/aliados/arkopa.png" alt="arkopa">
        </div>

        <div class=title-catag>REVESTIMIENTO</div>
        <div class="logos">
          <img src="images/aliados/panespol.png" alt="panespol">
          <img src="images/aliados/kobert-in.png" alt="kobert-in">
        </div>

        <div class=title-catag2>HERRAJES Y ACCESORIOS</div>
        <div class="logos">
          <img src="images/aliados/grass.png" alt="grass">
          <img src="images/aliados/dbgroup.png" alt="dbgroup">
        </div>

      </div>
  </section>
  <!-- Fin Seccion Materia Prima-->
  

  <!-- Apartado Map -->
  <section class="py-5 bg-map site-section how-it-works" id="howitworks-section">
    <div class="site-section container-btn-showroom">
          <div class="btn-showroom">
            <div class="circle-gps">
              <svg xmlns="http://www.w3.org/2000/svg" height="50" viewBox="0 0 384 512"><path fill="#ffffff" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
            </div>
            <div class="link-gps font-family-2"><a href="https://maps.google.com/maps?ll=10.480269,-66.96455&z=18&t=h&hl=es&gl=ES&mapclient=embed&cid=1515507514007777584" target="_blank">Visita nuestro showroom</a></div>
          </div>
    </div>  
  </section>
  <!-- Fin Seccion Map -->

    <!-- Seccion Fabricacion-->
    <section class="site-section-fabricacion" id="about-section">
      <!-- Elastislide Carousel -->
      <!-- <ul id="carousel" class="elastislide-list">
        <li><a href="{{ url('/fabricacion') }}"><img src="images/fabricacion/fabricacion-cocina-1.jpg" alt="Asesoría y desarrollo de proyectos de fabricación de mobiliarios para cocina, diseño, interiores, arquitectura, ingeniería civil, construcción, hoteles, restaurantes" /></a></li>
        <li><a href="{{ url('/fabricacion') }}"><img src="images/fabricacion/fabricacion-habitacion-1.jpg" alt="Asesoría y desarrollo de proyectos de fabricación de mobiliarios para habitaciones, diseño, interiores, arquitectura, ingeniería civil, construcción, hoteles, restaurantes" /></a></li>
        <li><a href="{{ url('/fabricacion') }}"><img src="images/fabricacion/fabricacion-cocina-2.jpg" alt="Asesoría y desarrollo de proyectos de fabricación de mobiliarios para cocina, diseño, interiores, arquitectura, ingeniería civil, construcción, hoteles, restaurantes" /></a></li>
        <li><a href="{{ url('/fabricacion') }}"><img src="images/fabricacion/fabricacion-habitacion-2.jpg" alt="Asesoría y desarrollo de proyectos de fabricación de mobiliarios para habitaciones, diseño, interiores, arquitectura, ingeniería civil, construcción, hoteles, restaurantes" /></a></li>
        <li><a href="{{ url('/fabricacion') }}"><img src="images/fabricacion/fabricacion-mobiliario.jpg" alt="Asesoría y desarrollo de proyectos de fabricación de mobiliarios para habitaciones, diseño, interiores, arquitectura, ingeniería civil, construcción, hoteles, restaurantes" /></a></li>
            
      </ul> -->
      <!-- End Elastislide Carousel -->

      
  

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
    <section class="site-section bg-light bg-image" id="contact-section" name="contact-section-bk">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3 text-black">Contáctanos</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7 mb-5">

            <form action="{{ route('contact.messageContact') }}" method="post" class="p-5 bg-white" id="form_send_contact_info" name="form_send_contact_info" onsubmit="gtag('event', 'enviar_form_contacto', { 'event_category': 'formularios', 'event_label': 'form_contacto', 'value': '0'})">
              
              {{csrf_field()}}
              <input type="hidden" name="hform" id="hform" value="1">
              
              <h2 class="h4 text-black mb-5">Contáctanos</h2> 

              <div class="row form-group">
                <div class="col-md-12 mb-6 mb-md-0">
                  <label class="text-black" for="fname">Nombre</label>
                  <input maxlength="50" type="text" id="fname" name="fname" class="form-control" value="{{ old('fname') }}">
                  @if ($errors->has('fname'))
                    <div class="invalid-field">
                      {{ $errors->first('fname') }}
                    </div>
                  @endif
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                  @if ($errors->has('email'))
                    <div class="invalid-field">
                      {{ $errors->first('email') }}
                    </div>
                  @endif
                </div>

                <!-- WhapsApp -->
                <div class="col">
                  <label for="whatsapp" class="text-black">Teléfono(WhatsApp)</label>
                  <input maxlength="11" type="text" name="whatsapp" id="whatsapp" class="form-control" value="{{ old('whatsapp') }}">
                </div>
                
              </div>

              <!-- LinkedIn -->
              <div class="row form-group">
                <div class="col">
                  <label for="linkedin" class="text-black">LinkedIn</label>
                  <input maxlength="60" type="text" name="linkedin" id="linkedin" class="form-control" value="{{ old('linkedin') }}">
                </div>

                <!-- Instagram -->
                <div class="col">
                  <label for="instagram" class="text-black">Instagram</label>
                  <input maxlength="60" type="text" name="instagram" id="instagram" class="form-control" value="{{ old('instagram') }}">
                </div>
              </div>

              <!-- Facebook -->
              <div class="row form-group">
                <div class="col">
                  <label for="facebook" class="text-black">Facebook</label>
                  <input maxlength="60" type="text" name="facebook" id="facebook" class="form-control" value="{{ old('facebook') }}">
                </div>

                <!-- Pinterest -->
                <div class="col">
                  <label for="pinterest" class="text-black">pinterest</label>
                  <input maxlength="60" type="text" name="pinterest" id="pinterest" class="form-control" value="{{ old('pinterest') }}">
                </div>
              </div>
              

              <!-- <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="subject">Asunto</label> 
                  <input type="subject" id="subject" name="subject" class="form-control">
                </div>
              </div> -->

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Mensaje</label> 
                  <textarea name="message" id="message" name="message" cols="30" rows="7" class="form-control" placeholder="Escriba su nota aqui...">{{ old('message') }}</textarea>
                </div>
              </div>

              <!-- <div class="alert alert-warning text-center" role="alert" id="alertregister">
                  Por favor marque la casilla de verificación.
              </div> -->

              @if ($errors->has('g-recaptcha-response'))
                <div class="row form-group">
                  <div class="col-md-12">
                      <div class="invalid-field">
                        {{ $errors->first('g-recaptcha-response') }}
                      </div>
                  </div>
                </div>
              @endif

              <div class="row form-group">
                <div class="col-md-12">
                  {!! NoCaptcha::display() !!}
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
                <button type="button" class="btn btn-primary btn-sm" id="btnShowContact" onclick="gtag('event', 'click_ver_telefonos', { 'event_category': 'botones', 'event_label': 'boton_verTelefonos', 'value': '0'})">Ver teléfono</button>
                
              </div>
              <div id="msgcontact">
             
                <p class="mb-0 font-weight-bold">Teléfonos</p>
                <p class="mb-4"><a href="tel:+58 212 4433391">+58 (0212)-4433391 </a>/
                <a href="tel:+58 212 4725527">4725527 </a>/
                <a href="tel:+58 212 4720462">4720462</a>
                </p>
               

                <a href="https://api.whatsapp.com/send?phone=+58 04241854168" onclick="gtag('event', 'click_wsapp', { 'event_category': 'botones', 'event_label': 'boton_wsapp_contact', 'value': '0'})">
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

@section("script")
<script>
  // $(function () {
    
  // });

  // $("#g-recaptcha-response").on("click", function(){
  //     $('#alertregister').slideUp()
  // });

  // var recaptchaCallback = function(){
  //     $('#alertregister').slideUp()
  // };

  $('#form_send_contact_info').submit(function() {
      // var _valrecaptcha = $("#g-recaptcha-response").val();
      $('#btnSendContactInfo').val("Enviando...");
      $('#btnSendContactInfo').attr("disabled", true);

      // if((_valrecaptcha == "") || (_valrecaptcha == undefined)){
      //     $('#alertregister').slideDown();
      //     $('#btnSendContactInfo').attr("disabled", false);
      //     $('#btnSendContactInfo').val("Enviar");
      //     return false;
      // }else{
      //     return true;
      // }

      return true;

  });
</script>
@endsection