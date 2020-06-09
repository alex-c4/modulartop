@extends('layouts.layout')

@section('content')

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

            

            <form action="{{ route('contact.store') }}" method="post" class="p-5 bg-white" id="form_send_project">
              
              {{csrf_field()}}
              
              <!-- <h2 class="h4 text-black mb-5">Contactanos</h2>  -->

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
          
        </div>
      </div>
    </section>
    <!--Fin Seccion seccion Contactanos-->


@endsection
