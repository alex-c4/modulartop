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
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

  <section class="py-5 bg-vinotinto site-section how-it-works" id="howitworks-section">
      <div class="tabla-catag">
        <div class=title-catag>TABLEROS MELAMÍNICOS</div>
        <div class="logos">
          <img src="images/aliados/oneskin-logo.png" alt="oneskin" data-toggle="modal" data-target="#catalogLeadModal" style="cursor: pointer;" onclick="onclick_img('oneskin')">
          <img src="images/aliados/losan-logo.png" alt="losan" data-toggle="modal" data-target="#catalogLeadModal" style="cursor: pointer;" onclick="onclick_img('losan')">
          <img src="images/aliados/arkopa.png" alt="arkopa"data-toggle="modal" data-target="#catalogLeadModal" style="cursor: pointer;" onclick="onclick_img('arkopa')">
        </div>

        <div class=title-catag>REVESTIMIENTO</div>
        <div class="logos">
          <img src="images/aliados/panespol.png" alt="panespol" data-toggle="modal" data-target="#catalogLeadModal" style="cursor: pointer;" onclick="onclick_img('panespol')">
          <img src="images/aliados/kobert-in.png" alt="kobert-in" data-toggle="modal" data-target="#catalogLeadModal" style="cursor: pointer;" onclick="onclick_img('kobert-in')">
        </div>

        <div class=title-catag2>HERRAJES Y ACCESORIOS</div>
        <div class="logos">
          <img src="images/aliados/grass.png" alt="grass" data-toggle="modal" data-target="#catalogLeadModal" style="cursor: pointer;" onclick="onclick_img('grass')">
          <img src="images/aliados/dbgroup.png" alt="dbgroup" data-toggle="modal" data-target="#catalogLeadModal" style="cursor: pointer;" onclick="onclick_img('dbgroup')">
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

      
  

      

    <!--Seccion contactanos-->
  <section class="py-5 bg-contact site-section how-it-works" id="howitworks-section">
    <div class="container-contact-info">
      <!-- Contact info section -->
      <div class="contact-info">
        <div class="contact-header">
          Contáctenos
        </div>
        <div class="contact-phones">

          <div class="contact-row">
            <div class="contact-col-icon">
              <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><path fill="#8a181b" d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
            </div>
            <div class="contact-col-phones">
              <div>+58 (0424) - 1854168</div>
              <div>+58 (0212) - 4433391</div>
            </div>
          </div>
          
          <div class="contact-row">
            <div class="contact-col-icon">
              <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><path fill="#8a181b" d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
            </div>
            <div class="contact-col-phones">
              <div>info@modulartop.com</div>
            </div>
          </div>
        </div>
          
        <div class="contact-row">
          <div class="contact-col-icon">
            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 384 512"><path fill="#8a181b" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
          </div>
          <div class="contact-col-phones">
            <div>Calle 2 con calle 1, Galpón 3, La Yaguara, Caracas. Diagonal a la antigua inspectoría de Tránsito, Caracas, Venezuela</div>
          </div>
        </div>
      </div>
            
    </div>
    <!-- End contact info section -->

      <!-- WhatsApp section -->
       <div class="whatsapp-container">

        <a href="javascript:void(0);">
          <img src="{{ asset('images/WhatsApp3.png') }}" class="img-whatsapp" alt="" srcset="" onclick="showWhatsAppContent()">
        </a>
       </div>
      <!-- End WhatsApp section -->

      <!-- Email section -->
      <div class="email-container" id=contact-section>
        <div class="icon-email">
          <svg xmlns="http://www.w3.org/2000/svg" height="100" viewBox="0 0 512 512"><path fill="#787878" d="M64 112c-8.8 0-16 7.2-16 16l0 22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1l0-22.1c0-8.8-7.2-16-16-16L64 112zM48 212.2L48 384c0 8.8 7.2 16 16 16l384 0c8.8 0 16-7.2 16-16l0-171.8L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64l384 0c35.3 0 64 28.7 64 64l0 256c0 35.3-28.7 64-64 64L64 448c-35.3 0-64-28.7-64-64L0 128z"/></svg>
        </div>
        <div class="email-container-form">
          <div class="email-title">Suscríbete a nuestro&nbsp;<span>boletín de noticias</span></div>
          <form action="{{ route('contact.messageContact') }}" method="post" class="p-5 bg-white" id="form_send_contact_info" name="form_send_contact_info" onsubmit="gtag('event', 'enviar_form_contacto', { 'event_category': 'formularios', 'event_label': 'form_contacto', 'value': '0'})">
            <div class="email-form">
                {{csrf_field()}}
                <input type="hidden" name="hform" id="hform" value="1">

                <div class="email-row-field">
                  <div class="field-name">
                    <input maxlength="50" type="text" id="fname" name="fname" class="shadow-field" value="{{ old('fname') }}" placeholder="Tu nombre">
                    @if ($errors->has('fname'))
                      <div class="invalid-field">
                        {{ $errors->first('fname') }}
                      </div>
                    @endif
                  </div>
                  
                  <div class="field-email">
                    <input type="email" id="email" name="email" class="shadow-field" value="{{ old('email') }}" placeholder="Tu correo">
                    @if ($errors->has('email'))
                      <div class="invalid-field">
                        {{ $errors->first('email') }}
                      </div>
                    @endif
                  </div>
                </div>

                <div class="email-row-btn">
                  <div class="container-btn-send">
                    <div class="btn-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" height="24" width="21" viewBox="0 0 448 512"><path fill="#ffffff" d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416l384 0c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8l0-18.8c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/></svg>
                    </div>
    
                    <div class="btn-input">
                      <input type="submit" id="btnSendContactInfo" name="btnSendContactInfo" value="Suscribir">
                    </div>
    
                  </div>
                </div>

            </div>
          </form>
        </div>
      </div>
      <!-- End Email section -->

    </div>
  </section>
  <!--Fin Seccion seccion Contactanos-->


<!-- Catalog Lead Modal -->
<!-- modal Agregar proyectista -->
<div class="modal fade" id="catalogLeadModal" name="catalogLeadModal" tabindex="-1" aria-labelledby="catalogLeadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Envío de Catálogo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <input type="hidden" id="hRouteAddEmail" value="{{ route('catalog.addEmail') }}">

                <div class="form-group">
                    <label for="txtEmail">Correo electrónico</label>
                    <input type="text" class="form-control" id="txtEmail" name="txtEmail">
                    <input type="hidden" class="form-control" id="hAliado" name="hAliado">
                </div>

                <div id="msgEmailModal" name="msgEmailModal" class="alert" role="alert"></div>
            </div>

            <div class="modal-footer">
                <button type="button" id="btnCancelSendEmail" class="btn btn-secondary" data-dismiss="modal" onclick="Utils.clearModal(['txtEmail'], 'msgEmailModal')">Cerrar</button>
                <button type="button" id="btnSendEmail" class="btn btn-primary" onclick="onclick_sendEmail()">Enviar</button>
            </div>

        </div>
    </div>
</div>
@endsection

@section("script")
<script src="{{ asset('js/utils.js') }}?v={{ env('APP_VERSION', '1') }}"></script>

<script>
  var _token = $("#token").val();
  var _type = "POST";

  var onclick_sendEmail = function(){
    $("#btnSendEmail").prop("disabled", true);
    $("#btnCancelSendEmail").prop("disabled", true);

    var _email = $("#txtEmail").val();
    var _url = $("#hRouteAddEmail").val();
    var _data = {
      txtEmail : _email,
      hAliado: $('#hAliado').val()
    };
    Utils.getData(_url, _token, _type, _data).then(function(result){
      if(result.result == true){
        $("#txtEmail").val("");
        Utils.setAlert(result.message, 'success', 'msgEmailModal');
      }else{
        Utils.setAlert(result.message, 'warning', 'msgEmailModal');
      }
      
      $("#btnSendEmail").prop("disabled", false);
      $("#btnCancelSendEmail").prop("disabled", false);
    }).fail(e => {
      $("#btnSendEmail").prop("disabled", false);
      $("#btnCancelSendEmail").prop("disabled", false);
    });
  } 

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
  
  // $(function () {
    
  // });

  // $("#g-recaptcha-response").on("click", function(){
  //     $('#alertregister').slideUp()
  // });

  // var recaptchaCallback = function(){
  //     $('#alertregister').slideUp()
  // };
  
  onclick_img = function(proyectistaId){
    if(proyectistaId == null){
      Utils.setAlert("El aliado comercial seleccionado no posee aún un catálogo cargado en el sistema.", 'warning', 'msgEmailModal');
    }else{
      $('#hAliado').val(proyectistaId)
    }
  }
  
        
      
  $("#catalogLeadModal").on('show.bs.modal', function (event) {
    var image = $(event.relatedTarget) // image that triggered the modal
    var recipient = image.data('aliado') // Extract info from data-* attributes
    var modal = $(this);
    
    modal.find('#hAliado').val(recipient)
    // modal.find('.modal-title').text('New message to ' + recipient)
  });
  
</script>
@endsection