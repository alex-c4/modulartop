@extends('layouts.layout')

@section('header')

<style>
    .modal-footer{
        justify-content: center !important;
    }
</style>

@endsection

@section('content')


    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/tableros/banner-premium.jpg') }}" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5 mx-auto mt-lg-5 text-center">
            <h1>Proyecto</h1>
            <p class="mb-5"><strong class="text-white">Galería de imágenes</strong></p>
            
          </div>
        </div>
      </div>

    </div>  


    <!-- Projects Start -->
    <section class="section" id="projects">
      
      <div class="container">
          <div class="row justify-content-center mt-4 pt-2">
              <div class="col-12 text-center">
                  <ul class="col container-filter portfolioFilter list-unstyled mb-0 text-center" id="filter">
                      <!-- <li class="list-inline-item"><a class="categories rounded pl-3 pr-3 mb-2 active" data-filter="*">Todos</a></li> -->
                      <li class="list-inline-item"><a class="categories rounded pl-3 pr-3 mb-2 active d-none" data-filter="*">{{ $proyectista_name }}</a></li>
                  </ul>
              </div><!--end col-->
          </div><!--end row-->
      </div><!--end container-->
        @if(!count($photos) > 0)

        <div class="alert alert-warning m-5" role="alert">
            Aún no hay imágenes cargadas al proyecto <strong><a href="{{ route('welcome') }}#about-section">volver</a></strong>
        </div>
        @else
        
        <!-- aqui va la descripcion -->
        <div class="m-4">
            <div class="text-center">
                <h1>{{$project_name}}</h1>
            </div>

            <h5>Descripción</h5>
            {{ $project_description }}
        </div>

        

        <div class="container">
            <div class="portfolioContainer row pt-2 mt-4" style="visibility: hidden">
                
                    @foreach($photos as $item)

                        <div class="col-lg-4 col-md-6 p-0 ">
                            <div class="portfolio-box position-relative ml-0 mr-0">
                                <div class="work-img position-relative overflow-hidden">
                                    <img src="{{ asset('images/proyectos/') }}/{{ $item->photo }}" class="img-fluid" alt="{{ $item->alt_text }}">
                                    <div class="overlay-work">
                                        <div class="icon text-center">
                                            <a class="mfp-image" href="{{ asset('images/proyectos/') }}/{{ $item->photo }}" title="{{ $item->project_name }}"><i class="pe-7s-expand1 text-white"></i></a>
                                        </div>
                                        <div class="work-content">
                                            <h6 class="title mb-0"><a onclick="onclick_image('{{ asset('images/proyectos/') }}/{{ $item->photo }}', '{{ $item->project_name }}', '{{ $item->alt_text }}')" data-toggle="modal" data-target="#imageModal" href="javascript:void(0)" class="text-light text-uppercase">{{ $item->project_name }}</a></h6>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div><!--end col-->

                    @endforeach
                    
            </div><!--end row-->

            <!-- <div class="row justify-content-center mt-4 pt-2">
                <div class="col-12 text-center">
                    <a href="javascript:void(0)">Ver más</a>
                </div>
            </div> -->
            <!--end row-->

        </div><!--end container-->
                
        <div style="display: flex; justify-content: center">
            <a href="{{ route('welcome') }}#contact-section" class="btn btn-primary px-5 py-3 m-3">Contactar</a>
        </div>
        
      @endif

  </section><!--end section-->
  <!-- Projects End -->

    <!-- Modal -->
    <div class="modal fade" id="imageModal" name="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header d-none">
                    <h5 class="modal-title" id="imageModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card" style="width: 100%;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Modal -->



@endsection

@section('script')
<script>
var onclick_image = function(_image, _title, _info){
    $(".card-img-top").prop("src", _image);
    $(".card-title").html(_title);
    $(".card-text").html(_info);
    
}

$(window).on('load', function () {
    var $container = $('.portfolioContainer');
    
    $container.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });

    $('#imageModal').on('show.bs.modal', function (event) {
        debugger
        console.log('mostrando el modal');
        var button = $(event.relatedTarget) // Button that triggered the modal
        var info = button.data('info') // Extract info from data-* attributes
        var image = button.data('image') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.card-text').html(info)
        modal.find('.modal-body input').val(info)
    });

})


</script>
@endsection
