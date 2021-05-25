@extends('layouts.layout')


  

@section('content')

{!! NoCaptcha::renderJs() !!}

<div class="site-block-wrap">
    <div class="owl-carousel with-dots">
    <div class="site-blocks-cover overlay overlay-2" style="background-image: url({{ asset('images/banner/fabricacion.jpg')}});" data-aos="fade" id="home-section">  
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6 mt-lg-5 text-center">
                    <h1 class="text-shadow">¡Fabricamos tus sueños!</h1>
                    <p class="mb-5 text-shadow">Nos adaptamos a cualquier diseño de interior a madera que tengas en mente... Muebles ideales para hoteles, cocinas, oficina, dormitorios, baños y más.</p>
                </div>
            </div>
        </div>        
    </div> 
    </div>    
</div>

 <!--Seccion contactanos-->
 <section class="site-section bg-light bg-image" id="contact-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3 text-black">Cuéntanos tu proyecto y lo fabricamos</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-5">

            

            <form action="{{ route('fabricacion.messageFabricacion') }}" method="post" class="p-5 bg-white" id="form_send_project" name="form_send_project" enctype="multipart/form-data">
              
              {{csrf_field()}}
              <input type="hidden" name="hform" id="hform" value="2">
              <!-- <h2 class="h4 text-black mb-5">Contactanos</h2>  -->


                  
              <div class="row form-group">
                <div class="col-md-12">
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
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                  @if ($errors->has('email'))
                    <div class="invalid-field">
                      {{ $errors->first('email') }}
                    </div>
                  @endif
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
              
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="name_file">Archivo</label> 
                  <input type="file" class="form-control" id="name_file" name="name_file" placeholder="Archivo">

                </div>
              </div>

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
                  <!-- <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_KEY') }}"></div> -->
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
          
        </div>
      </div>
    </section>
    <!--Fin Seccion seccion Contactanos-->


@endsection

@section("script")
<script>
   $(function () {
      $("#alertregister").hide();
  });

  // $("#g-recaptcha-response").on("click", function(){
  //     $('#alertregister').slideUp()
  // });

  // var recaptchaCallback = function(){
  //     $('#alertregister').slideUp()
  // };

  // $('#form_send_project').on("submit", function() {
  //     var _valrecaptcha = $("#g-recaptcha-response").val();
  //     $("#btnSendContactInfo").prop("disabled", true);
  //     $("#btnSendContactInfo").val("Enviando...");
  //     if((_valrecaptcha == "") || (_valrecaptcha == undefined)){
  //         $('#alertregister').slideDown();
  //         $("#btnSendContactInfo").prop("disabled", false);
  //         $("#btnSendContactInfo").val("Enviar");
  //         return false;
  //     }else{
  //         $('#alertregister').slideUp();
  //         return true;
  //     }
  // });
</script>
@endsection
